<?php

session_start();
$usuario = $_SESSION['nome'];
$usu = $_SESSION['id'];
require_once './Conexao.php';
$result = "SELECT USU_NOME FROM USUARIO WHERE USU_ID = $id";
    $resultr1 = mysqli_query($con, $result);
    
    while ($row = mysqli_fetch_assoc($result1)) {
        $nome = $row['USU_NOME'];
    }

$id = $_GET["id"];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    
    $result_usuario = "DELETE FROM USUARIO WHERE USU_ID='$id'";
    $resultado_usuario = mysqli_query($con, $result_usuario);
    
    if (mysqli_affected_rows($con)) {
        $mensagem = "$usuario excluiu o usuário $nome do Sistema";

        include './Logs.php';
        salvaLog($mensagem, $usu);

        echo"<script language='javascript' type='text/javascript'>alert('Registro apagado com sucesso!');window.location.href='../../public/layout/TelaUsuarios.php';</script>";
        die();
        
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível apagar este registro. Verifique se este possui dependências!');window.location.href='../../public/layout/TelaUsuarios.php';</script>";
        die();
    }
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Necessário selecionar registro!');window.location.href='../../public/layout/TelaUsuarios.php';</script>";
    die();
}
?>
