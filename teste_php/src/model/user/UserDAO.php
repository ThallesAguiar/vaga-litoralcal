<?php

class UserDAO
{

    public function store(UserVO $userVO, $db)
    {

        $name = $userVO->getName();
        $age = $userVO->getAge();
        $phone = $userVO->getPhone();
        $emergency = $userVO->getEmergency_contact();
        $id_address = $userVO->getId_address();
        $id_nivel = $userVO->getId_nivel();

        $sql = "INSERT INTO users (NAME, AGE, PHONE, EMERGENCY_CONTACT, ID_ADDRESS, ID_NIVEL) VALUES ('$name', '$age','$phone','$emergency','$id_address','$id_nivel')";

        // Executa uma consulta no banco de dados
        mysqli_query($db, $sql);
        // mysqli_insert_id vai me retornar o ultimo id criado, e vai salver no objeto address
        $userVO->setId_user(mysqli_insert_id($db));

        return $userVO;
    }

    public function index($db)
    {
        mysqli_query($db, "SET NAMES 'UTF8'");
        $userVO = new UserVO();
        $addressVO = new AddressVO();
        $userClone = array();
        $addressClone = array();
        $sql = "SELECT u.id_user, u.name, u.age, u.emergency_contact, a.city, a.state, a.country FROM users u join addresses a on u.id_address = a.id_address";

        $result = mysqli_query($db, $sql);

        while ($rs = mysqli_fetch_array($result)) {
            $userVO->setId_user(stripslashes($rs['id_user']));
            $userVO->setName(stripslashes($rs['name']));
            $userVO->setAge(stripslashes($rs['age']));
            $userVO->setEmergency_contact(stripslashes($rs['emergency_contact']));

            $addressVO->setCity(stripslashes($rs['city']));
            $addressVO->setState(stripslashes($rs['state']));
            $addressVO->setCountry(stripslashes($rs['country']));

            $userClone[] = clone $userVO;
            $addressClone[] = clone $addressVO;
        }

        return [$userClone, $addressClone];
    }

    function showToUpdate($db, $id)
    {

        $userVO = new UserVO();
        $addressVO = new AddressVO();
        $sql = "SELECT * FROM users u join addresses a on u.id_address = a.id_address WHERE u.id_user =$id";

        $result = mysqli_query($db, $sql);

        while ($rs = mysqli_fetch_array($result)) {
            $userVO->setId_user(stripslashes($rs['id_user']));
            $userVO->setName(stripslashes($rs['name']));
            $userVO->setAge(stripslashes($rs['age']));
            $userVO->setPhone(stripslashes($rs['phone']));
            $userVO->setId_nivel(stripslashes($rs['id_nivel']));
            $userVO->setId_address(stripslashes($rs['id_address']));
            $userVO->setEmergency_contact(stripslashes($rs['emergency_contact']));

            $addressVO->setStreet(stripslashes($rs['street']));
            $addressVO->setNumber(stripslashes($rs['number']));
            $addressVO->setDistrict(stripslashes($rs['district']));
            $addressVO->setCity(stripslashes($rs['city']));
            $addressVO->setState(stripslashes($rs['state']));
            $addressVO->setCountry(stripslashes($rs['country']));

            $userClone[] = clone $userVO;
            $addressClone[] = clone $addressVO;
        }

        return [$userClone, $addressClone];
    }



    function update(UserVO $userVO, $db)
    {

        $id = $userVO->getId_user();
        $name = $userVO->getName();
        $age = $userVO->getAge();
        $phone = $userVO->getPhone();
        $emergency = $userVO->getEmergency_contact();
        $id_address = $userVO->getId_address();
        $id_nivel = $userVO->getId_nivel();

        // Atualiza valores na tabela categoria, passando as variaveis para os valores da tabela
        $query = "UPDATE `users` SET `name`='$name',`age`='$age',`phone`='$phone',`emergency_contact`='$emergency',`id_nivel`='$id_nivel' WHERE `id_user` =$id";
        var_dump($query);
        return mysqli_query($db, $query);
    }

    function delete($id, $db)
    {
        echo $query = "DELETE FROM users WHERE id_user = $id";

        return mysqli_query($db, $query);
    }


    function read($db, $id)
    {

        $userVO = new UserVO();
        $addressVO = new AddressVO();
        $sql = "SELECT u.id_user, u.name, u.age, u.emergency_contact, a.city, a.state, a.country FROM users u join addresses a on u.id_address = a.id_address WHERE u.id_user =$id";

        $result = mysqli_query($db, $sql);

        while ($rs = mysqli_fetch_array($result)) {
            $userVO->setId_user(stripslashes($rs['id_user']));
            $userVO->setName(stripslashes($rs['name']));
            $userVO->setAge(stripslashes($rs['age']));
            $userVO->setEmergency_contact(stripslashes($rs['emergency_contact']));

            $addressVO->setCity(stripslashes($rs['city']));
            $addressVO->setState(stripslashes($rs['state']));
            $addressVO->setCountry(stripslashes($rs['country']));

            $userClone[] = clone $userVO;
            $addressClone[] = clone $addressVO;
        }

        return [$userClone, $addressClone];
    }
}
