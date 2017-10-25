<?php

$_SG['conectarServidor'] = true;
$_SG['abreSessao'] = true;

$_SG['caseSensitive'] = false;

$_SG['validaSempre'] = true;

$_SG['servidor'] = "ERIC-PC\SQLEXPRESS";
$_SG['usuario'] = "eric";
$_SG['senha'] = "sa";
$_SG['banco'] = "usuarios";

$_SG['paginaLogin'] = 'login.html';

$_SG['tabela'] = 'usuario';


if($_SG['abreSessao'] == true){
	
$conn = new COM ("ADODB.Connection") or die("Não foi possível carregar o ADO");

$connStr = "PROVIDER=SQLOLEDB;SERVER=".$_SG['servidor'].";UID=".$_SG['usuario'].";PWD=".$_SG['senha'].";DATABASE=".$_SG['banco'].";";
echo $connStr;
$conn->open($connStr);

	/*$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");

	mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
*/

if($_SG['abreSessao'] == true){
	session_start();
}

function validaUsuario($usuario, $senha){
	global $_SG;

	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

	$nusuario = addcslashes($usuario, '');
	$nsenha = addcslashes($senha, '');

	$sql = "SELECT id, nome FROM ".$_SG['tabela']." WHERE ".$cS." usuario = '".$nusuario."' AND ".$cS." senha = '".$nsenha."' ";

	$res = mysql_query($sql);
  	if (!$res) {
    	trigger_error("dbget: ".mysql_error()." in ".$query);
    	return false;
  	}
  	if (!mysql_num_rows($res)){

		$_SESSION['usuarioID'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome'];

		if($_SG['validaSempre'] == true){
			$_SESSION['usuarioLogin'] = $usuario;
			$_SESSION['usuarioSenha'] = $senha;
		}

		return true;
	}
}

function protegePagina(){
	global $_SG;

	if(!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])){
		expulsaVisitante();
	} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])){
		if($_SG['validaSempre'] == true){
			if(!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])){
				expulsaVisitante();
			}
		}
	}
}

function expulsaVisitante(){
	global $_SG;

	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

	//header("Location: ".$_SG['paginaLogin']);
}
}