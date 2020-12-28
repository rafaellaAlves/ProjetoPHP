<?php

function salvaLog($msg, $log) {
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $hostname = "localhost";
    $user = "root";
    $pass = "";
    $bancodedados = "controlar";
    $port = "3307";

    $con = mysqli_connect($hostname, $user, $pass, $bancodedados, $port);
    mysqli_query($con, "SET CHARACTER SET utf8");
    if (!$con) {
        exit("Erro ao conectar ao Banco de Dados");
    }

    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $msglog = $msg;
    $usulog = $log;

    $sql = "INSERT INTO `logs`(`LOG_HORA`, `USU_ID_ALT`, `LOG_MSG`, `LOG_IP`) VALUES ('$hora',$usulog,'$msglog','$ip')";
    if ($res = mysqli_query($con, $sql)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

?>