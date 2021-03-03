<?php
require_once '../config/db.php';
require_once '../model/user/UserVO.php';
require_once '../model/user/UserDAO.php';
require_once '../model/address/AddressVO.php';
require_once '../model/address/AddressDAO.php';


$userVO = new UserVO();
$userDAO = new UserDAO();

$id_user = $_GET['id'];
// echo $id_user;
$getUser = $userDAO->showToUpdate($db, $id_user);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php
        foreach ($getUser[0] as $user) :
            foreach ($getUser[1] as $address) :
        ?>
        <form method="post" action="../controller/UserController.php">
          <h3>Dados</h3>
            <input type="string" hidden class="form-control" id="nameUser" name="user[editUser]" placeholder="ID" value="<?php echo $id_user; ?>">
          <div class="form-group">
            <input type="string" class="form-control" id="nameUser" name="user[name]" placeholder="Nome" value="<?php echo $user->getName(); ?>">
            <input type="number" class="form-control col-3 mt-3" name="user[age]" placeholder="Idade" value="<?php echo $user->getAge(); ?>">
            <input type="string" class="form-control col-6 mt-3" name="user[phone]" placeholder="Telefone" value="<?php echo $user->getPhone(); ?>">
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user[type]" id="inlineRadio1" value="1" required>
            <label class="form-check-label" for="inlineRadio1">Aluno</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user[type]" id="inlineRadio2" value="2" required>
            <label class="form-check-label" for="inlineRadio2">Professor</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user[type]" id="inlineRadio3" value="3" required>
            <label class="form-check-label" for="inlineRadio3">Colaborador</label>
          </div>

          <h3 class="mt-3">Endereço</h3>
              <input type="text" hidden class="form-control" name="user[address-id]"  value="<?php echo $user->getId_address(); ?>">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="user[address-name]" placeholder="Rua/Trav/Long..." value="<?php echo $address->getStreet(); ?>">
            </div>
            <div class="col-2">
              <input type="text" class="form-control" name="user[address-number]" placeholder="Numero" value="<?php echo $address->getNumber(); ?>">
            </div>
            <div class="col">
              <input type="text" class="form-control" name="user[address-district]" placeholder="Bairro" value="<?php echo $address->getDistrict(); ?>">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-4">
              <input type="text" class="form-control" name="user[address-city]" placeholder="Cidade" value="<?php echo $address->getCity(); ?>">
            </div>
            <div class="col-3">
              <select class="form-control" name="user[address-state]" placeholder="Estado">
                <option value="<?php echo $address->getState(); ?>"><?php echo $address->getState(); ?></option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
            <div class="col-2">
              <input type="text" class="form-control" name="user[address-country]" placeholder="País" value="<?php echo $address->getCountry(); ?>">
            </div>
          </div>

          <div class="form-group mt-3">
            <h3>Contato de Emergência <small>(casos emergênciais)</small></h3>
            <input type="string" class="form-control" name="user[emergency]" placeholder="Nome de contato para emergência" value="<?php echo $user->getEmergency_contact(); ?>">
          </div>

          <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
          <a  class="btn btn-danger mt-3" href="../../index.php">Cancelar</a>
        </form>
        <?php
            endforeach;
            endforeach;
        ?>
      </div>
    </div>

  </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</html>