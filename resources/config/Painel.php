<?php

if (isset($_POST['proximo'])) {

    foreach ($_POST["painel"] AS $painel) {
        $return = $painel;
    }
    if ($painel == 0) {
        header("location:../../public/layout/TelaPainelEquipamento.php");
    } else if ($painel == 1) {
        header("location:../../public/layout/TelaPainelAmbiente.php");
    }
} elseif (isset($_POST['executarAmb'])) {
    include './Conexao.php';

    $ambiente = $_POST["ambiente"];

    $comando = $_POST['comando'];

    $sql = "SELECT MOD_ID FROM EQUIPAMENTOS WHERE AMB_ID = $ambiente;";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_assoc($result);
    $modEquip = $dados['MOD_ID'];

    $sql2 = "SELECT CDV_IPV4 FROM CONTROL_DEVICE WHERE AMB_ID = $ambiente";
    $result2 = mysqli_query($con, $sql2);
    $dados2 = mysqli_fetch_assoc($result2);
    $ipv4 = $dados2['CDV_IPV4'];

    $sql3 = "SELECT CMD_MOD_APRENDIDO WHERE CMD_ID = $comando";
    $result3 = mysqli_query($con, $sql3);
    $dados3 = mysqli_fetch_assoc($result3);
    $comandoapren = $dados3['CMD_MOD_APRENDIDO'];

//var_dump($idmodelo);
    $server_ip = $ipv4;
    $server_port = 8888;
    $beat_period = 5;
    $message = explode(",", $comandoapren);
//var_dump($message);

    $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    $foi = FALSE;
    for ($i = 0; $i <= 2; $i++) {

        socket_sendto($socket, $message[$i], 4, 0, $server_ip, $server_port);
        sleep(0.1);

        $foi = TRUE;
    }
    if ($foi == TRUE) {
        echo"<script language='javascript' type='text/javascript'>alert('Comando enviando com sucesso!');window.location.href='../../public/layout/TelaPainel.php';</script>";
        die();
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível enviar o comando. Verifique a conexão, e tente novamente!');window.location.href='../../public/layout/TelaAgenda.php';</script>";
        die();
    }
} elseif (isset($_POST['executarEqp'])) {
    include './Conexao.php';

    $equipamento = $_POST["ambiente"];

    $comando = $_POST['comando'];

    $sql = "SELECT MOD_ID, AMB_ID FROM EQUIPAMENTOS WHERE EQP_ID = $equipamento;";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_assoc($result);
    $modEquip = $dados['MOD_ID'];
    $ambiente = $dados['AMB_ID'];

    $sql2 = "SELECT CDV_IPV4 FROM CONTROL_DEVICE WHERE AMB_ID = $ambiente";
    $result2 = mysqli_query($con, $sql2);
    $dados2 = mysqli_fetch_assoc($result2);
    $ipv4 = $dados2['CDV_IPV4'];

    $sql3 = "SELECT CMD_MOD_APRENDIDO WHERE CMD_ID = $comando";
    $result3 = mysqli_query($con, $sql3);
    $dados3 = mysqli_fetch_assoc($result3);
    $comandoapren = $dados3['CMD_MOD_APRENDIDO'];

//var_dump($idmodelo);
    $server_ip = $ipv4;
    $server_port = 8888;
    $beat_period = 5;
    $message = explode(",", $comandoapren);
//var_dump($message);

    $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    $foi = FALSE;
    for ($i = 0; $i <= 2; $i++) {

        socket_sendto($socket, $message[$i], 4, 0, $server_ip, $server_port);
        sleep(0.1);

        $foi = TRUE;
    }
    if ($foi == TRUE) {
        echo"<script language='javascript' type='text/javascript'>alert('Comando enviando com sucesso!');window.location.href='../../public/layout/TelaPainel.php';</script>";
        die();
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível enviar o comando. Verifique a conexão, e tente novamente!');window.location.href='../../public/layout/TelaAgenda.php';</script>";
        die();
    }
}
?>