<?php
include("config.php");

if(isset($_POST['login'])){

	session_start();
	$session = session_id();
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$emal = $_POST['email'];

	$sql = "SELECT * FROM usuario WHERE login = '$login'";
	$executa = mysql_query($sql) or die (mysql_error());
	$num = mysql_num_rows($executa);

	$sql2 = "SELECT * FROM usuario WHERE email = '$email'";
	$executa2 = mysql_query($sql2) or die(mysql_error());
	$num2 = mysql_num_rows($executa2);

	if($_POST['login'] == "" || $_POST['senha'] == "" || $_POST['senha2'] == "" || $_POST['email'] == ""){
		$ac[] = "Por favor preencha todos os campos corretamente.";
	}

	if($num > 0){
		$ac[] = "Esse login ja esta sendo usado por outro usuario.";
	}

	if($num2 > 0){
		$ac[] = "Esse email,ja esta sendo usado por outro usuario";
	}

	if (!ereg("@.", $_POST['email'])){
      $ac[] = "E-mail invalido.";
   }

   if ($_POST['senha'] != $_POST['senha2']){
      $ac[] = "Verifique se as duas senha estao correta.";
	}

	if(!isset($ac)){

		$sqlI = "INSERT INTO usuario(login, senha, email, sessao) VALUES ('$login', '$senha', '$email', '$session')";
		$executaI = mysql_query($sqlI) or die (mysql_error());

		$topico = "Cadastro $nome_site";
	  	$mensagem = "<html>";
	  	$mensagem .= "<body>";
	  	$mensagem .= "Olá $login\r\n";
	  	$mensagem .= "<br>Você efetuou um cadastro no $nome_site.</br>";
	  	$mensagem .=	"<br>Login: $login";
	  	$mensagem .=	"<br>Senha: $senha";
	  	$mensagem .=	"<br>Ativar conta <a href='$site/Am/active.php?ac=$session'>$site/Am/active.php?ac=$session</a></br>";
	  $mensagem .=	"</body>";
	  $mensagem .=	"</html>";
	  $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	  $headers .= "From: $nome_site <$email>\r\n";
	  $ac[] = "Cadastro efetuado com sucesso, verifique seu e-mail para ativa a conta.";
	  //enviar para o email o login, senha e o codigo de ativação
	  mail($email, $topico, $mensagem, $headers);
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>AMCC Cadastro</title>
	<style type="text/css">
		<!--
		.Style2 {font-size: 13px}
		-->
	</style>
</head>
<body>
	<?php
	if (isset($ac)) {
		for ($i=0; $i < count($ac); $i++) { 
			echo "<li>".$ac[$i];
		}
	}
	?>

<form id="form1" name="form1" method="post" action="<?php  ?>">
	<table width="100%" border="0">
		<tr>
			<td colspan="2"><div align="center"><strong>Cadastro</strong></div></td>
		</tr>
		<tr>
			<td width="13%"><span class="Style2">Login:</span></td>
			<td width="87%"><span>
				<label>
					<input type="text" name="login" id="login">
				</label>
			</span></td>
		</tr>
   		<tr>
     		<td><span class="Style2">Senha:</span></td>
      		<td><span class="Style2">
        		<label>
        			<input name="senha" type="password" id="senha" />
        		</label>
      		</span></td>
    	</tr>
    	<tr>
      		<td><span class="Style2">Repetir senha: </span></td>
      		<td><span class="Style2">
        		<label>
        			<input name="senha2" type="password" id="senha2" />
        		</label>
      		</span></td>
    	</tr>
    	<tr>
      		<td><span class="Style2">E-mail:</span></td>
      		<td><span class="Style2">
        		<label>
        			<input name="email" type="text" id="email" />
        		</label>
     		 </span></td>
    	</tr>
    	<tr>
      		<td>&nbsp;</td>
      		<td><span class="Style2">
        		<label>
        			<input type="submit" name="Submit" value="Enviar" />
        		</label>
      		</span></td>
   		</tr>
  	</table>
  <p>&nbsp;</p>
</form>
</body>
</html>