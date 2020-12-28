<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';
    
    $nome = $_POST['marca'];

    $sql = $con->query("SELECT * FROM MARCA WHERE MCA_NOME='$nome'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Marca já cadastrada');window.location.href='../../public/layout/IncluirMarca.php';</script>";  die();
    } else {
        $sql1 = "INSERT INTO MARCA (MCA_NOME) VALUES ('$nome');";

        if ($query = mysqli_query($con, $sql1)) {
            session_start();
            
            $usu = $_SESSION['id'];
            $usuario = $_SESSION['nome'];
            $mensagem = "$usuario realizou cadastro da marca '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);

            header("location:../../public/layout/TelaMarcas.php");
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar registro!');window.location.href='../../public/layout/TelaMarcas.php';</script>";
            die();
        }
    }
} else if (isset($_POST['alterar'])) {
    require_once './Conexao.php';

    $id = $_POST["id"];
    $nome = $_POST['marca'];

    $sql2 = "UPDATE MARCA SET MCA_NOME = '$nome' WHERE MCA_ID = $id";

     if ($query = mysqli_query($con, $sql2)) {
         session_start();
            
            $usu = $_SESSION['id'];
            $usuario = $_SESSION['nome'];
            $mensagem = "$usuario alterou informações da marca '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);
            header("location:../../public/layout/TelaMarcas.php");
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro ao alterar registro!');window.location.href='../../public/layout/TelaMarcas.php';</script>";
            die();
        }
}
 ?>   