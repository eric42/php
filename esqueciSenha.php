<?php
include("config.php");

if(isset($_POST['login'])){
	$login = $_POST['login'];

	$sql = "SELECT * FROM usuario WHERE login = '$login'";
	$executa = mysql_query($sql) or die (mysql_error());
	$fetch = mysql_fetch_assoc($executa);
	$numRows = mysql_num_rows($executa);

	if($numRows > 0){
		$login = $fetch['login'];
		$email = $fetch['email'];
		$senha = $fetch['senha'];
		$topico = "Esquece senha";
		$mensagem = "<html>";
		$mensagem .= "<body>";
		$mensagem .= "<br>Você efetuou um pedido de recuperação de senha no $nome_site.</br>";
		$mensagem .= "<br>Login: $login";
		$mensagem .= "<br>Senha: $senha</br>";
		$mensagem .= "<br>Site oficial do $nome_site";
		$mensagem .= "<br><a href='$site'>$site</a.</br>";
		$mensagem .= "</body>";
		$mensagem .= "</html>";
		$heards = "MIME-Version: 1.0\r\n";
		$heards .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$heards .= "From: $nome_site <$email>\r\n";

		mail($email, $topico, $mensagem, $heards);
			$ac[] = "Sua senha foi enviado para seu e-mail.";
		}
		else{
			$ac[] = "Esse login não existe.";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1">
	<title>AMCC Esquici minha senha</title>
	<style type="text/css">
		<!--
		.Style2 {font-size: 13px}
		-->
	</style>
</head>
<body>
<?php
if (isset($ac)) {
	for($i=0;$i<count($ac);$i++){
		echo "<li>".$ac[$i];
	}
}
?>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">
	<table width="33%" border="0">
		<tr>
			<td colspan="2"><div align="center"><strong>Esqueci senha</strong></div></td>
		</tr>
		<tr>
			<td width="22%"><span class="Style2">Login:</span></td>
			<td width="78%"><span class="Style2">
				<label>
					<input type="text" name="login" id="login">
				</label>
			</span></td>		
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><span class="Style2">
				<label>
					<input type="submit" name="Submit" value="Enviar">
				</label>
			</span></td>
		</tr>
	</table>
	
</form>
</body>
</html>