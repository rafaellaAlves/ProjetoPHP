<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';

    $nome = $_POST['modelo'];
    $marca = $_POST['marca'];

    $sql = $con->query("SELECT * FROM MODELO WHERE MOD_NOME='$nome'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Modelo já cadastrado');window.location.href='../../public/layout/IncluirModelo.php';</script>";
        die();
    } else {
        $sql1 = "INSERT INTO MODELO (MOD_NOME, MCA_ID) values ('$nome',$marca)";

        if ($query = mysqli_query($con, $sql1)) {
            $usu = $_SESSION['id'];
            $usuario = $_SESSION['nome'];
            $mensagem = "$usuario realizou cadastro do modelo $nome no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);

            header("location:../../public/layout/TelaModelos.php");
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar registro!');window.location.href='../../public/layout/TelaModelos.php';</script>";
            die();
        }
    }
} else if (isset($_POST['alterar'])) {
    require_once './Conexao.php';

    $id = $_POST["id"];
    $nome = $_POST['modelo'];
    $marca = $_POST['marca'];

    $sql2 = "UPDATE MODELO SET MOD_NOME ='$nome', MCA_ID = $marca WHERE MOD_ID = $id";

    if ($query = mysqli_query($con, $sql2)) {

        header("location:../../public/layout/TelaModelos.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao alterar registro!');window.location.href='../../public/layout/TelaModelos.php';</script>";
        die();
    }
}
?>
