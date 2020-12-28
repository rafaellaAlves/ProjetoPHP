<?php

if (isset($_POST['proximo'])) {
    require './Conexao.php';
    
    
    $idusu = $_POST['usuario'];
    
          
        header("location:../../public/layout/Registros.php?id='$idusu'");
    
}
?>

