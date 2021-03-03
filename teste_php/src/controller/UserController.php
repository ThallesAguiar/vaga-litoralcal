<?php
require_once "../config/db.php";

require_once "../model/user/UserVO.php";
require_once "../model/user/UserDAO.php";

require_once "../model/address/AddressVO.php";
require_once "../model/address/AddressDAO.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $userVO = new UserVO();
    // $userVO->setId_user($id);
    // echo $id;
    $userDAO = new UserDAO();
    $resultado = $userDAO->delete($id, $db);

    if ($resultado > 0) {
        echo 'registro excluído com sucesso';
        header('Location:../../index.php');
    } else {
        echo 'erro ao excluir registro.';
        header('Location:../../index.php');
    }
}

if (isset($_POST['user']['createUser'])) {
    $name = $_POST['user'];

    // echo "<pre>".print_r($name)."</pre>";

    // crio a classe VO para guardar valores na memória
    $addressVO = new AddressVO();
    $addressVO->setStreet($name['address-name']);
    $addressVO->setNumber($name['address-number']);
    $addressVO->setDistrict($name['address-district']);
    $addressVO->setCity($name['address-city']);
    $addressVO->setState($name['address-state']);
    $addressVO->setCountry($name['address-country']);

    // crio a classe DAO
    $addressDAO = new AddressDAO();
    // chamo a função que irá salvar os dados do address no BD
    $addressDAO->store($addressVO, $db);

    // Agr crio a classe USER para salvar os dados do usuario junto com as chaves estrangeiras.
    $userVO = new UserVO();
    $userVO->setName($name['name']);
    $userVO->setAge($name['age']);
    $userVO->setPhone($name['phone']);
    $userVO->setEmergency_contact($name['emergency']);
    $userVO->setId_nivel($name['type']);
    $userVO->setId_address($addressVO->getId_address());

    $userDAO = new UserDAO();

    if ($userDAO->store($userVO, $db) === TRUE) {
        echo '<script>window.location.href = "../../index.php";</script>';
    } else {
        $_SESSION['ERROR_IN_CADASTRO'] = "ALgo de errado não está certo no seu cadastro. TENTE NOVAMENTE.</br> Se persistir procure um médico.";
        echo '<script>window.location.href = "../../index.php";</script>';
    }
}else if (isset($_POST['user']['editUser'])) {
    $name = $_POST['user'];

    // echo "<pre>".print_r($name)."</pre>";
    // die();

    $userVO = new UserVO();
    $addressVO = new AddressVO();
    $addressVO->setId_address($name['address-id']);
    $addressVO->setStreet($name['address-name']);
    $addressVO->setNumber($name['address-number']);
    $addressVO->setDistrict($name['address-district']);
    $addressVO->setCity($name['address-city']);
    $addressVO->setState($name['address-state']);
    $addressVO->setCountry($name['address-country']);

    $addressDAO = new AddressDAO();
    $resultAddress = $addressDAO->update($addressVO, $db);
    var_dump($resultAddress);
    // Agr crio a classe USER para salvar os dados do usuario junto com as chaves estrangeiras.

    $userVO->setId_user($name['editUser']);
    $userVO->setName($name['name']);
    $userVO->setAge($name['age']);
    $userVO->setPhone($name['phone']);
    $userVO->setEmergency_contact($name['emergency']);
    $userVO->setId_nivel($name['type']);
    // $userVO->setId_address($addressVO->getId_address());

    $userDAO = new UserDAO();
    $result = $userDAO->update($userVO, $db);
    var_dump($result);
    if ( $result === TRUE) {
        echo '<script>window.location.href = "../../index.php";</script>';
    } else {
        $_SESSION['ERROR_IN_CADASTRO'] = "ALgo de errado não está certo no seu cadastro. TENTE NOVAMENTE.</br> Se persistir procure um médico.";
        echo '<script>window.location.href = "../../index.php";</script>';
    }
}


