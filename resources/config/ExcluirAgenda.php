<?php

require_once './Conexao.php';

$id = $_GET["id"];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM AGENDA WHERE USU_ID='$id'";
	$resultado_usuario = mysqli_query($con, $result_usuario);
	if(mysqli_affected_rows($con)){
		echo"<script language='javascript' type='text/javascript'>alert('Registro apagado com sucesso!');window.location.href='../../public/layout/TelaAgenda.php';</script>";
                die();
	}else{
		echo"<script language='javascript' type='text/javascript'>alert('ERROR! Não foi possível apagar este registro!');window.location.href='../../public/layout/TelaAgenda.php';</script>";
                die();
	}
}else{	
	echo"<script language='javascript' type='text/javascript'>alert('Necessário selecionar registro!');window.location.href='../../public/layout/TelaAgenda.php';</script>";
        die();
}

