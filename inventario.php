<?php
include("config.php");

if(isset($_POST['pa'])){

	$pa = $_POST['pa'];
	$mouse = $_POST['mouse'];
	$teclado = $_POST['teclado'];
	$headset = $_POST['headset'];
	$setor = $_POST['setor'];
	$utilizado = $_POST['utilizado'];
	$problema = $_POST['problema'];
	$obs = $_POST['obs'];

	$sql = "SELECT * FROM Inventario WHERE pa = '$pa'";
	$executa = mysql_query($sql) or die (mysql_error());
	$num = mysql_num_rows($executa);

	if($num > 0){
		$ac[] = "Essa pa ja esta cadastrada.";
	}

	

?>
<html>
<head>
	<title>Inventario AMCC</title>
</head>
<body>
	<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	<table>
		<tr>
			<td>Numero da PA:</td>
			<td><input type="text" name="pa"></td>
		</tr>
		<tr>
			<td>Equipamento:</td>
			<td><input type="checkbox" name="mouse">Mouse</td>
			<td><input type="checkbox" name="teclado">Teclado</td>
			<td><input type="checkbox" name="Headset">Headset</td>
		</tr>
		<tr>
			<td>Setor:</td>
			<td><input type="text" name="setor"></td>
		</tr>
		<tr>
			<td>Sendo utilizado:</td>
			<td><<input type="checkbox" name="utilizado">/td>
		</tr>
		<tr>
			<td>Problemas:</td>
			<td><textarea name="problema">Digite sobre o problema encontrado</textarea></td>
		</tr>
		<tr>
			<td>Observações:</td>
			<td><textarea name="obs">Digite aqui as observções sobre a maquina</textarea></td>
		</tr>
		<tr>
			<input type="submit" name="cadastrar" value="cadastrar">
			<input type="reset" name="limpar" value="limpar">
		</tr>
	</table>
	</form>
</body>
</html>