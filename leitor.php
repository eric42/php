<?php

include("config.php");

	
	$tabela = isset($_POST['Nome']) ? $_POST['Nome'] : '';
	$QtdCampos = isset($_POST['QTDCAMPOS']) ? $_POST['QTDCAMPOS'] : '';
	$string = "";



	if($QtdCampos != 0)
	{
		
		if($tabela == ""){
			$ac = "Preencha o nome da tabela";
		}

		for($x = 0; $x <= $QtdCampos; $x++){
			if($_POST["m".$x] == ""){
				$r += 1;
			}

			if(($r - 1) == $QtdCampos){ 

				$ac = "Preencha o nome de um dos campos da tabela";
			}
		}


		if(!isset($ac)){

			$string = "CREATE TABLE  IF NOT EXISTS `$tabela` (`id` int(10) NOT NULL AUTO_INCREMENT, ";

			for($i = 0; $i <= $QtdCampos; $i++){
		
				if(!empty($_POST[$i]))
				{
					if (!empty($field)){
						$string .= ", ";
					}
				
					$field = $_POST[$i];
				 	if ($field != 0 || $field != " " || !empty($field)){
					

						$valor = $_POST["m".$i]; 
						if($valor != " " || !empty($valor) || $valor != 0)
						{
							$string .= "`".$field."` ".$valor;
						}
					}
					
				}
			}

			$string .= ", KEY (id));";

			//$executa = mysql_query($string) or die (mysql_error());

			if($_POST["dados"] == 1)
			{
				for($c = 0; $c <= count($_POST["tabela"]); $c++)
				{

					$sql = "INSERT INTO `$tabela` (";

					for($v = 0; $v <= $QtdCampos; $v++)
					{
						if (!empty($_POST[$v]))
						{
							$sql .= "`". $_POST[$v]."`";

							if($v != $QtdCampos)
							{
								$sql .= ", ";
							}
						}

						$sql .= ") VALUES(" ;

						if($field[$v] != "" || empty($field[$v]))
						{
							$sql .= $_POST[$v];


							if($v != $QtdCampos)
							{
								$sql .= ", ";
							}
						}
						$sql .= ");";
					}

					echo $sql;
				}
			}

			$ac =  "Operacao realizada com sucesso";

		}
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
    <title></title>
    
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <script type='text/javascript'>
		var leitorDeCSV = new FileReader();

		window.onload = function init() {
		  leitorDeCSV.onload = leCSV;
		}

		function pegaCSV(inputFile) {
		  var file = inputFile.files[0];
		  leitorDeCSV.readAsText(file);
		}

		function leCSV(evt) {

		  var fileArr = evt.target.result.split('\n');
		  var strDiv = '<table border = "1" name="tabela">';
		  <?php $QtdCampos = 0; ?>

		  for (var i = 0; i < fileArr.length; i++) {

		    strDiv += '<tr>';

	    	var fileLine = fileArr[i].split(';');

		  for (var i = 0; i < fileArr.length; i++) {

		    strDiv += '<tr>';

	    	var fileLine = fileArr[i].split(';');

		    for (var j = 0; j < fileLine.length; j++) 
		    {
		     	if(fileLine[j].length > 0)
		     	{
		      		if (i == 0)
		      		{
		      			var m = j;
		      			strDiv += '<br> Digite o nome para o campo '+ j +': <input type="text" name="'+j+'"> <br>';
		      			strDiv += '<select name="m'+m+'">';
		      			strDiv += '<option></option>';
		      			strDiv += '<option value="INT"> INT </option>';
		      			strDiv += '<option value="VARCHAR(100)"> VARCHAR </option>';
		      			strDiv += '<option value="DATE"> DATE </option>';
		      			strDiv += '</select>';
		      			strDiv += '<input type="text" name="QTDCAMPOS" value='+ j +' hidden/>';
		      			strDiv += '<br>';

		      		}
		      	}
		      	
		      	strDiv += '<td>' + fileLine[j].trim() + '</td>';
		      
		    }
		    strDiv += '</tr>';
		  }


		  strDiv += '</table>';

		  var CSVsaida = document.getElementById('CSVsaida');
		  CSVsaida.innerHTML = strDiv;
		}
	}

    </script>
    <script>
    	$(function(){
        $(".btn-toggle").click(function(e){
            e.preventDefault();
            el = $(this).data('element');
            $(el).toggle();
        });
    });
    </script>
  
</head>

<body>
	<?php
		if (isset($ac)) {
				echo "<li>".$ac;
		}
	?>

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<button type="button" class="btn-toggle" data-element="#minhaDiv">Nova Tabela</button>

<input type="button" name="btnNovo" value="Atualizar Tabela">

<div id="minhaDiv" hidden="true">

<input type="file" id="inputCSV" onchange="pegaCSV(this)">
<br>
<br>
Digite o nome da tabela: <input type="text" name="Nome" id="Nome">
<br>
<input type="checkbox" name="dados" checked="true" value="1">deseja importar os dados juntos?
<br>

<input type="submit" name="Submit" value="Cadastrar">

</div>

<div id="CSVsaida"></div>

</form>
</body>
</html>