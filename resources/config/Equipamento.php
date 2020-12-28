<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';
    
    $descricao = $_POST['equipamento'];
    $modelo = $_POST['modelo'];
    $ambiente = $_POST['ambiente'];
    session_start();
    $usu = $_SESSION['id'];
    $usuario = $_SESSION['nome'];
    
    $sql = $con->query("SELECT * FROM EQUIPAMENTOS WHERE EQP_NOME='$descricao'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Equipamento já cadastrado');window.location.href='../../public/layout/TelaEquipamentos.php';</script>";  die();
    } else {
        $sql2 = "INSERT INTO EQUIPAMENTOS (EQP_NOME, MOD_ID, AMB_ID, USU_ID_ALT) VALUES ('$descricao',$modelo,$ambiente,$usu)";

        if (mysqli_query($con, $sql2)) {
            $mensagem = "$usuario realizou cadastro do equipamento '$descricao' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);

            header("location: ../../public/layout/TelaEquipamentos.php");
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível cadastrar registro!');window.location.href='../../public/layout/TelaEquipamentos.php';</script>";
            die();
        }
    }
} else if (isset($_POST['alterar'])) {
    require_once './Conexao.php';

    $id = $_POST["id"];
    $descricao = $_POST["equipamento"];
    $modelo = $_POST["modelo"];
    $ambiente = $_POST["ambiente"];
    session_start();
    $usu = $_SESSION['id'];
$usuario = $_SESSION['nome'];
    
    $sq2 = "UPDATE EQUIPAMENTOS SET EQP_NOME = '$descricao', MOD_ID= $modelo, AMB_ID = $ambiente, USU_ID_ALT= $usu WHERE EQP_ID = $id";

    if (mysqli_query($con, $sq2)) {
        $mensagem = "$usuario alterou informações do equipamento '$descricao' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);
        header("location:../../public/layout/TelaEquipamentos.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível alterar registro!');window.location.href='../../public/layout/TelaEquipamentos.php';</script>";
        die();
    }
} 
?>

