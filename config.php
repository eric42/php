<?php

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$hostname = "localhost";
$user = "root";
$senha = "";
$db = "amcc";
$nome_site = "AMCC system";
$email = "eric.xavier@amcc.com.br";
$site = "http://localhost";


mysql_connect($hostname, $user, $senha) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());
?>