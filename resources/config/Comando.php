<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';

    $idDispositivo = $_POST['dispositivo'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $sql = $con->query("SELECT * FROM COMANDO WHERE CMD_TITULO='$titulo'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Comando já cadastrado');window.location.href='../../public/layout/TelaComandos.php';</script>";
        die();
    } else {
        $sql2 = "INSERT INTO COMANDO (CMD_TITULO, CMD_DESCRICAO) VALUES ('$titulo','$descricao')";

        if ($query = mysqli_query($con, $sql2)) {

            header("location: ../../public/layout/RecebeCodigo.php?id='$idDispositivo'");

            
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar registro!');window.location.href='../../public/layout/TelaComandos.php';</script>";
            die();
        }
    }
} else if (isset($_POST['alterar'])) {
    require './Conexao.php';

    $id = $_POST["id"];
    $ambiente = $_POST['ambiente'];
    $pai = $_POST['ambientepai'];
    $sql1 = $con->query("select * from ambiente where amb_raiz = 1");
    if (mysqli_num_rows($sql1) == 1) {
        $raiz = 0;
    } else {
        $raiz = 1;
    }
    $status = 1; //ativo
    $listaCheckbox = $_POST['aceita'];
    foreach ($listaCheckbox as $aceita) {
        $return = $aceita;
    }
    $usu = 1;

    $sql = "UPDATE ambiente set amb_nome ='$ambiente', amb_pai_id = $pai, amb_raiz = $raiz, amb_status = $status, amb_aceitaeqps = $aceita WHERE amb_id = $id";

    if ($query = mysqli_query($con, $sql2)) {
        header("location: Tela_Ambientes.php");
    } else {
        echo "<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>";
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<h1 class='alert alert-warning'>Erro ao alterar registro!</h1>";
        echo "</div>";
        echo "<div class='row' >";
        echo "<a href='Tela_Ambientes.php' class='alert alert-info'>Visualizar Ambientes</a>";
        echo "</div></div>";
    }
}
?>

