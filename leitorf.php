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
<form id="form1" name="form1" method="post" action="gravardados.php">
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<button type="button" class="btn-toggle" data-element="#minhaDiv">Nova Tabela</button>

<input type="button" name="btnNovo" value="Atualizar Tabela">

<div id="minhaDiv" hidden="true">

<input type="file" id="inputCSV" name="pegaDados" onchange="pegaCSV(this) ">
<br>
<br>
Digite o nome da tabela: <input type="text" name="Nome" id="Nome">
<br>

<input type="submit" name="Submit" value="Cadastrar">

</div>

<div id="CSVsaida"></div>

</form>
</body>
</html>