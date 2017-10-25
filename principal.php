<?php
include("config.php");
include("restrito.php");

$sql = "SELECT * FROM usuario WHERE login = '$login_usuario'";
$executar = mysql_query($sql) or die (mysql_error());
$fet_buscar = mysql_fetch_assoc($executar);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
Olá <?php echo $fet_buscar['login'];?>
</body>
</html>
