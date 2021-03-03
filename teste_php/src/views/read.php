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
$getUser = $userDAO->index($db, $id_user);




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
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true"><?php echo $user->getId_user(); ?></li>
                            <li class="list-group-item">Nome: <?php echo $user->getName(); ?></li>
                            <li class="list-group-item">Idade: <?php echo $user->getAge(); ?> anos</li>
                            <li class="list-group-item">Contato de emergência: <?php echo $user->getEmergency_contact(); ?></li>
                            <li class="list-group-item">Localização: <?php echo $address->getCity() . '-' . $address->getState() . '-' . $address->getCountry(); ?></li>
                        </ul>
                <?php
                    endforeach;
                endforeach;
                ?>
                <a class="btn btn-primary" href="../../index.php">Voltar</a>
            </div>
        </div>

    </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</html>