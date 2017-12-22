<?php

include("config.php");

	
	$tabela = isset($_POST['Nome']) ? $_POST['Nome'] : '';
	$QtdCampos = isset($_POST['QTDCAMPOS']) ? $_POST['QTDCAMPOS'] : '';
	$string = "";

	if($QtdCampos != 0)
	{
		$string = "CREATE TABLE '$tabela' (";
		echo $sql;
		for($i = 0; $i <= $QtdCampos; $i++){
		
			if($_POST[$i] != " " || $_POST[$i] != "" || empty($_POST[$i]))
			{
				
				$field = $_POST[$i];
				 if ($field != 0 || $field != " " || empty($field)){
					$string .= "".$field." ";

					$valor = $_POST['cbmtipo'.$i]; 
					if($valor != " " || empty($valor) || $valor != 0)
					{
						$string .= " ".$valor.", ";
					}
				}
				
				
			}
			/*

				
				
			*/
		}
		$string .= ");";

		//$executa = mysql_query($sql) or die (mysql_error());
		echo $string;
	}
	/*for($i = 0; $i < $QtdCampos; $i++){  
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
	}*/

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
		  var strDiv = '<table border = 1>';
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
		      			strDiv += '<select name="'+m+'">';
		      			strDiv += '<option></option>';
		      			strDiv += '<option value="INT"> INT </option>';
		      			strDiv += '<option value="VARCHAR"> VARCHAR </option>';
		      			strDiv += '<option value="DATE"> DATE </option>';
		      			strDiv += '</select>';
		      			strDiv += '<input type="text" name="QTDCAMPOS" value='+ j +' hidden/>';

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
<br>

<input type="submit" name="Submit" value="Cadastrar">

</div>

<div id="CSVsaida"></div>

</form>
</body>
</html>