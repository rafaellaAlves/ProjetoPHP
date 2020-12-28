<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i:s');

    $senha = md5($_POST["senha"]);
    foreach ($_POST["perfil"] AS $perfil) {
        $return = $perfil;
    }
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $status = 1;
    session_start();
    $usu = $_SESSION['id'];
    $usuario = $_SESSION['nome'];
    $datastatus = $date;

    $sql = $con->query("SELECT * FROM USUARIO WHERE USU_NOME='$nome'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Usuário já cadastrado');window.location.href='../../public/layout/IncluirUsuario';</script>";
        die();
    } else {
        $sql1 = "INSERT INTO USUARIO (USU_DTSTATUS,USU_EMAIL,USU_ID_ALT,USU_LOGIN,USU_NOME,USU_PERFIL,USU_SENHA,USU_STATUS) VALUES ('$datastatus','$email',$usu,'$login','$nome',$perfil,'$senha',$status);";

        if ($query = mysqli_query($con, $sql1)) {

            $mensagem = "$usuario realizou cadastro do usuário '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);

            header("location:../../public/layout/TelaUsuarios.php");
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível cadastrar registro!');window.location.href='../../public/layout/TelaUsuarios.php';</script>";
            die();
        }
    }
} else if (isset($_POST['alterar'])) {
    require_once './Conexao.php';

    $id = $_POST["id"];
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i:s');

    $senha = $_POST["senha"];
    foreach ($_POST["perfil"] AS $perfil) {
        $return = $perfil;
    }
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $status = 1;
    session_start();
    $usu = $_SESSION['id'];
    $usuario = $_SESSION['nome'];
    $datastatus = $date;


    $sql1 = "UPDATE USUARIO SET USU_SENHA='$senha', USU_PERFIL='$perfil', USU_NOME='$nome', USU_LOGIN='$login', USU_EMAIL='$email', USU_STATUS=$status, USU_ID_ALT=$usu, USU_DTSTATUS='$datastatus' WHERE USU_ID=$id";

    if (mysqli_query($con, $sql1)) {
        $mensagem = "$usuario alterou informações do usuário '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);
        
        header("location:../../public/layout/TelaUsuarios.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível alterar registro!');window.location.href='../../public/layout/TelaUsuarios.php';</script>";
        die();
    }
}
?>