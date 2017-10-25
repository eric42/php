<?php
include("config.php");

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE login = '$login' and senha = '$senha'";
//echo $sql."</br>";

$executar = mysql_query($sql) or die (mysql_error());
$fetLogar = mysql_fetch_assoc($executar);
$num = mysql_num_rows($executar);

if ($num == 0){
	echo "Login ou senha invalido.";
	echo "<br><a href='javascript:window.history.go(-1)'>Clique aqui para voltar.</a>";
}
elseif ($fetLogar['ativo'] == "N") {
	echo "Usuario nao ativo, verifique seu email para ativa a conta.";
	echo "<br><a href='javascript:window.history.go(-1)'>Clique aqui para voltar.</a>";
}
else{
	session_start();
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	header("Location:principal.php");
}
?>