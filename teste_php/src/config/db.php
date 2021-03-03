<?php

$db = new mysqli("localhost", "root", "", "litoralcar");

if ($db->connect_errno) {
    echo '<p> Erro ' . $db->errno . '-->' . $db->connect_error . '</p>';
    die();
}
