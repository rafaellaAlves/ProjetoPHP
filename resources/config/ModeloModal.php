<?php

require './Conexao.php';
$r = true;
$nome = $_POST['nome'];
$marca = $_POST["marca"];

$sql = $con->query("SELECT * FROM modelo WHERE mod_nome='$nome'");
if (mysqli_num_rows($sql) > 0) {
    echo"<script language='javascript' type='text/javascript'>alert('Modelo já cadastrado');window.location.href='Incluir_Equipamento.php';</script>"; die();
} else {
    $sql2 = "INSERT INTO modelo (mod_nome, mca_id) values ('$nome',$marca)";

    if ($query = mysqli_query($con, $sql2)) {
        return $r;
    } else {
        echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>";
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<h1 class='alert alert-warning'>Erro ao cadastrar registro!</h1>";
        echo "</div>";
        echo "<div class='row' >";
        echo "<a href='Incluir_Equipamento.php' class='alert alert-info'>Voltar ao cadastro</a>";
        echo"</br>";
        echo "<a href='Tela_Modelos.php' class='alert alert-info'>Visualizar Modelos</a>";
        echo "</div></div>";
    }
}
?>
