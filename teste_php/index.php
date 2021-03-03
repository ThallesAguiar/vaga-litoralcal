<?php
require_once "./src/config/db.php";
require_once "./src/model/user/UserDAO.php";
require_once "./src/model/user/UserVO.php";
require_once "./src/model/address/AddressVO.php";
require_once "./src/model/address/AddressDAO.php";


$userVO = new UserVO();
$userDAO = new UserDAO();
$getAllUsers = $userDAO->index($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">TESTE LITORALCAR</h1>
      <p class="lead">teste de conhecimento com PHP</p>
      <hr class="my-4">
      <p>Para iniciar, cadastre usuário.</p>
      <a class="btn btn-primary btn-lg" href="./src/views/cadastro.php" role="button">Cadastrar</a>
    </div>

    <table class="table" id="table_id">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Idade</th>
          <th scope="col">Endereço</th>
          <th scope="col">Contato de emergencia</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($getAllUsers[0] as $users) :
        ?>
          <tr>
            <th scope="row"><?php echo $users->getId_user(); ?></th>
            <td><?php echo $users->getName(); ?></td>
            <td><?php echo $users->getAge(); ?> anos</td>
            <td>
              <?php
              foreach ($getAllUsers[1] as $addresses) :
              ?>
                <?php echo $addresses->getCity() . '-' . $addresses->getState() . '-' . $addresses->getCountry(); ?>
              <?php
              endforeach;
              ?>
            </td>
            <td><?php echo $users->getEmergency_contact(); ?></td>
            <td>
              <a class="btn btn-danger" href="javascript:func()" onclick="confirmacao(<?php echo $users->getId_user() ?> )" role="button">
                <img src="https://img.icons8.com/officexs/16/000000/delete-sign.png" />
                Excluir
              </a>
              <a class="btn btn-warning" href='./src/views/edit.php?id=<?php echo $users->getId_user() ?>' role="button">
                <img src="https://img.icons8.com/officexs/16/000000/edit.png" />
                Editar
              </a>
              <a class="btn btn-primary" href='./src/views/read.php?id=<?php echo $users->getId_user() ?>' role="button">
                <img src="https://img.icons8.com/officexs/16/000000/print.png" />
                Ver
              </a>
            </td>
          </tr>
        <?php
        endforeach;
        ?>
      </tbody>
    </table>


  </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function() {
    $('#table_id').DataTable();
  });
</script>
<script language="Javascript">
  function confirmacao(id) {
    var resposta = confirm("Deseja excluir o usuario " + id + "?");

    if (resposta == true) {
      window.location.href = "./src/controller/UserController.php?id=" + id;
    }
  }
</script>

</html>