<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$hostname = "localhost";
$user = "root";
$pass = "";
$bancodedados = "controlar";
$port = "3307";

$con = mysqli_connect($hostname, $user, $pass, $bancodedados, $port);
mysqli_query($con,"SET CHARACTER SET utf8");
if (!$con) {
    exit("Erro ao conectar ao Banco de Dados");
} 

?>
