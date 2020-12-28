<?php

if (isset($_POST['adicionar'])) {
    require './Conexao.php';

    $nome = $_POST['agenda'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');
    $ambiente = $_POST['ambiente'];
    $dataini = $_POST['dataInicio'];
    $datafim = $_POST['dataFim'];
    $minuto = $_POST['minuto'];
    $hora = $_POST['hora'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $semana = $_POST['semana'];
    
    $comando = $_POST['comando'];
    
    
    
    $frequencia = $minuto.".".$hora.".".$dia.".".$mes.".".$semana.".".$comando;
    
    session_start();
    $usu = $_SESSION['id'];


    $sql = $con->query("SELECT * FROM AGENDA WHERE AGD_TITULO='$nome'");
    if (mysqli_num_rows($sql) > 0) {
        echo"<script language='javascript' type='text/javascript'>alert('Agenda já cadastrada');window.location.href='../../public/layout/TelaAmbientes.php';</script>";
        die();
    } else {
        $sql1 = "INSERT INTO AGENDA (AGD_TITULO, AGD_DATAHORA, AGD_FREQUENCIA, AMB_ID, USU_ID_ALT, AGD_DTINICIO, AGD_DTFIM) VALUES ('$nome','$data','$frequencia',$ambiente,$usu, '$dataini','$datafim')";

        if ($query = mysqli_query($con, $sql1)) {
            $usu = $_SESSION['id'];
            $usuario = $_SESSION['nome'];
            $mensagem = "$usuario realizou cadastro da agenda '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);

            header("location: ../../public/layout/TelaAgenda.php");
        } else {       

            echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível cadastrar registro!');window.location.href='../../public/layout/TelaAmbientes.php';</script>";
            die();
        }
    }
} else if (isset($_POST['alterar'])) {
    require './Conexao.php';

    $id = $_POST["id"];
    $nome = $_POST['ambiente'];
    if ($_POST['ambientepai'] == 0) {
        $pai = 0;
    } else {
        $pai = $_POST['ambientepai'];
    }
    $sql1 = $con->query("SELECT * FROM AMBIENTE WHERE AMB_RAIZ = 1");
    if (mysqli_num_rows($sql1) == 1) {
        $raiz = 0;
    } else {
        $raiz = 1;
    }
    $status = 1; //ativo
    foreach ($_POST["aceita"] AS $aceita) {
        $return = $aceita;
    }
    session_start();
    $usu = $_SESSION['id'];
    $usuario = $_SESSION['nome'];

    $sql2 = "UPDATE AMBIENTE SET AMB_NOME ='$ambiente', AMB_PAI_ID = $pai, AMB_RAIZ = $raiz, AMB_STATUS = $status, AMB_ACEITAEQPS = $aceita WHERE AMB_ID = $id";

    if ($query = mysqli_query($con, $sql2)) {
       
            $mensagem = "$usuario alterou informações do ambiente '$nome' no Sistema";

            include './Logs.php';
            salvaLog($mensagem, $usu);
        header("location: ../../public/layout/TelaAmbientes.php");
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro ao alterar registro!');window.location.href='../../public/layout/TelaAmbientes.php';</script>";
        die();
    }
}
?>

