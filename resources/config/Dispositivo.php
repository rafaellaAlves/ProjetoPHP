<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';

    $nome = $_POST['dispositivo'];
    $ambiente = $_POST['ambiente'];
    $ipv4 = $_POST['ipv4'];
    if($_POST['ipv6'] == 0){
        $ipv6 = 1;
    }else{
        $ipv6 = $_POST['ipv6'];
    }
    
    $status = 1;
    session_start();
    $usu = $_SESSION['id'];
    $usuario = $_SESSION['nome'];


    $sql = $con->query("SELECT * FROM CONTROL_DEVICE WHERE CDV_NOME ='$nome'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Dispositivo já cadastrado');window.location.href='../../public/layout/TelaDispositivos.php';</script>";
        die();
    } else {
        $sql1 = "INSERT INTO CONTROL_DEVICE (CDV_NOME, CDV_IPV4, CDV_STATUS, AMB_ID, USU_ID_ALT, CDV_IPV6) VALUES ('$nome','$ipv4',$status,$ambiente,$usu,'$ipv6')";

        if ($query = mysqli_query($con, $sql1)) {
            $mensagem = "$usuario realizou cadastro do dispositivo de controle '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);

            header("location:../../public/layout/TelaDispositivos.php");
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível cadastrar registro!');window.location.href='../../public/layout/TelaDispositivos.php';</script>";
            die();

        }
    }
} else if (isset($_POST['alterar'])) {
    require './Conexao.php';

    $id = $_POST["id"];
    $nome = $_POST['dispositivo'];
    $ambiente = $_POST['ambiente'];
    $ipv4 = $_POST['ipv4'];
    $ipv6 = $_POST['ipv6'];
    $status = 1;
    session_start();
    $usu = $_SESSION['id'];
    $usuario = $_SESSION['nome'];

    $sql2 = "UPDATE CONTROL_DEVICE SET CDV_NOME = '$nome', CDV_IPV4 = '$ipv4', CDV_IPV6 ='$ipv6', CDV_STATUS = $status, AMB_ID = $ambiente, USU_ID_ALT= $usu WHERE CDV_ID = $id";

    if ($query = mysqli_query($con, $sql2)) {
        $mensagem = "$usuario alterou informações do dispositivo '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);
        header("location:../../public/layout/TelaDispositivos.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível alterar registro!');window.location.href='../../public/layout/TelaDispositivos.php';</script>";
        die();
    }
}
?>


