<?php

$db_host = 'localhost'; // HOST DEFAULT localhost
$db_user = 'USER'; // usuario ps: não se esqueça de ativar todas as permissões!
$db_pass = 'PASSWORD_USER'; // Password do user
$db_name = 'BASE DE DADOS!'; // Base de dados

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error handler
if($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
    
?>    
