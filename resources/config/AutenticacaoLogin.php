<?php

function Is_email($user) {
    if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

session_start();

if ($_POST['username'] && $_POST['senha']) {
    include_once './Conexao.php';
    $loginusuario = $_POST['username'];
    $senhausuario = md5($_POST['senha']);
    $check = Is_email($loginusuario);

    if ($check == true) {
        $sql1 = "SELECT * FROM USUARIO WHERE USU_EMAIL = '$loginusuario'";
        $query = mysqli_query($con, $sql1);
        if (mysqli_num_rows($query) != 1) {
            echo"<script language='javascript' type='text/javascript'>alert('E-mail inválido. Preencha novamente!');window.location.href='../../public/layout/TelaLogin.php';</script>";
            die();
        } else {
            $sql1 = "SELECT * FROM USUARIO WHERE USU_SENHA = '$senhausuario'";
            $query = mysqli_query($con, $sql1);
            if (mysqli_num_rows($query) != 1) {
                echo"<script language='javascript' type='text/javascript'>alert('Senha inválida. Preencha novamente!');window.location.href='../../public/layout/TelaLogin.php';</script>";
                die();
            } else {

                $row = mysqli_fetch_array($query);
                $_SESSION['id'] = $row['USU_ID'];
                $_SESSION['nome'] = $row['USU_NOME'];
                $_SESSION['email'] = $row['USU_EMAIL'];
                $_SESSION['perfil'] = $row['USU_PERFIL'];

                $usuariolog = $_SESSION['nome'];
                $logid = $_SESSION['id'];


                header("location: ../../public/layout/TelaPrincipal.php");
            }
        }
    } else {
        $sql2 = "SELECT * FROM USUARIO WHERE USU_LOGIN = '$loginusuario' AND USU_SENHA = '$senhausuario'";
        $query = mysqli_query($con, $sql2);
        if (mysqli_num_rows($query) != 1) {
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha inválidos. Preencha-os novamente!');window.location.href='../../public/layout/TelaLogin.php';</script>";
            die();
        } else {
            $sql2 = "SELECT * FROM USUARIO WHERE USU_LOGIN = '$loginusuario'";
            $query = mysqli_query($con, $sql2);
            if (mysqli_num_rows($query) != 1) {
                echo"<script language='javascript' type='text/javascript'>alert('Login inválido. Preencha-o novamente!');window.location.href='../../public/layout/TelaLogin.php';</script>";
                die();
            } else {
                $sql2 = "SELECT * FROM USUARIO WHERE USU_SENHA = '$senhausuario'";
                $query = mysqli_query($con, $sql2);
                if (mysqli_num_rows($query) != 1) {
                    echo"<script language='javascript' type='text/javascript'>alert('Senha inválida. Preencha-o novamente!');window.location.href='../../public/layout/TelaLogin.php';</script>";
                    die();
                } else {
                    $row = mysqli_fetch_array($query);
                    $_SESSION['id'] = $row['USU_ID'];
                    $_SESSION['nome'] = $row['USU_NOME'];
                    $_SESSION['email'] = $row['USU_EMAIL'];
                    $_SESSION['perfil'] = $row['USU_PERFIL'];

                    $usuariolog = $_SESSION['nome'];
                    $logid = $_SESSION['id'];


                    header("location: ../../public/layout/TelaPrincipal.php");
                }
            }
        }

        mysqli_close($con);
    }
} else {
    $msg = "Por Favor preencha os campos necessários.";
}
?>