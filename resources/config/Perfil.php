<?php
if($_SESSION != 1){
    echo"<script language='javascript' type='text/javascript'>alert('Não possui permissão para acessar esta sessão.');window.location.href='../../public/layout/TelaPrincipal.php';</script>";
    die();
}
