<?php

include("seguranca.php");
protegePagina();

echo "Olá, " . $_SESSION['usuarioNome'];

echo "<br/><br/><br/>";

echo "Pagina de Index!";

?>