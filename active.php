<?php
include("config.php");

if (isset($_GET['ac'])){
	$sessao = $_GET['ac'];

	$sql = "SELECT * FROM usuario WHERE sessao = '$sessao'";
	$executar = mysql_query($sql) or die (mysql_error());
	$num = mysql_num_rows($executar);

	if ($num > 0){
		$sqlUp = "UPDATE usuario SET ativo = 'S' WHERE sessao = '$sessao'";
		$executarUp = mysql_query($sqlUp) or die(mysql_error());
		echo "Usuario foi ativado com sucesso!";
	}
	else{
		$sqlUp = "UPDATE usuario SET ativo = 'N' WHERE sessao = '$sessao'";
		$executarUp = mysql_query($sqlUp) or die(mysql_error());
		echo "Esse usuario nao pode ser ativo.";
	}
}
?>