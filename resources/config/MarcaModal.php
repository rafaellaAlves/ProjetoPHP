<?php

require './Conexao.php';
$r = true;
$nome = $_POST["nomemarca"];

$sql = $con->query("SELECT * FROM MARCA WHERE MCA_NOME='$nome'");
if (mysqli_num_rows($sql) > 0) {
    echo"<script language='javascript' type='text/javascript'>alert('Marca já cadastrada');window.location.href='Incluir_Modelo.php';</script>"; die();
} else {
    $sql2 = "INSERT INTO marca (MCA_NOME) VALUE ('$nome');";
    if ($query = mysqli_query($con, $sql2)) {
        return $r;
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar registro!');window.location.href='../../public/layout/TelaMarcas.php';</script>";
            die();
    }
}
?>

