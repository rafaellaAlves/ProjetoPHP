
<?php

if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
    session_start();

    if ($_SESSION['email'] == null || $_SESSION['nome'] == null) {
        echo"<script language='javascript' type='text/javascript'>alert('Desculpe, este usuário não está logado no sistema!');window.location.href='../../public/layout/TelaLogin.php';</script>";
        die();
        
    }

    if (isset($_REQUEST['sair'])) {
        $_SESSION['email'] = null;
        $_SESSION['nome'] = null;
        session_destroy();
        header('location:../../public/layout/TelaLogin');
    }
}
?>

