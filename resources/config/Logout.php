<?php

session_start();


unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['perfil']);
session_destroy();

header("Location: ../../public/layout/TelaLogin.php");
exit;
?>