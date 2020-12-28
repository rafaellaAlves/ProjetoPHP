
<?php
session_start();
$usuario = $_SESSION['nome'];
$usu = $_SESSION['id'];
require_once './Conexao.php';

$id = $_GET["id"];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM MODELO WHERE MOD_ID='$id'";
	$resultado_usuario = mysqli_query($con, $result_usuario);
	if(mysqli_affected_rows($con)){
            $mensagem = "$usuario excluiu uma modelo de equipamento do Sistema";

        include './Logs.php';
        salvaLog($mensagem, $usu);
		echo"<script language='javascript' type='text/javascript'>alert('Registro apagado com sucesso!');window.location.href='../../public/layout/TelaModelos.php';</script>";
                die();
	}else{
		echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível apagar este registro!');window.location.href='../../public/layout/TelaModelos.php';</script>";
                die();
	}
}else{	
	echo"<script language='javascript' type='text/javascript'>alert('Necessário selecionar registro!');window.location.href='../../public/layout/TelaModelos.php';</script>";
        die();
}


?>