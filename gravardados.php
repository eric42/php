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

			$executa = mysql_query($string) or die (mysql_error());


		//echo $sql;
		}
	}



			$ac =  "Operacao realizada com sucesso";

?>

<html>
<head>
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

		  for (var i = 0; i < fileArr.length; i++) {

		    var fileLine = fileArr[i].split(',');
		    for (var j = 0; j < fileLine.length; j++) {
		      strDiv += '<td>' + fileLine[j].trim() + '</td>';
		    }
		    strDiv += '</tr>';
		  }

		  strDiv += '</table>';

		  var CSVsaida = document.getElementById('CSVsaida');
		  CSVsaida.innerHTML = strDiv;
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
<br><br>
Escolha uma acao para realizar com a tabela <?php echo $tabela; ?>:
<br>
<button class="btn-toggle" data-element="#hideDive">Inserir registros</button>
<div hidden="true" id="hideDive">
	
<input type="file" name="pegaDados" onchange="InserirRegistros($this)">
</div>
</body>
</html>
	
<?php	

			
				
/*
				// Lê o conteúdo do arquivo
				while(!feof($handle)){
    				// Pega os dados da linha
    				$linha = fgets($handle, 1024);

    				// Divide as Informações das celular para poder salvar
    				$dados = explode(';', $linha);



     				echo $dados[0]."<br>"; 


    				// Verifica se o Dados Não é o cabeçalho ou não esta em branco
    				if(!empty($dados[0]) && !empty($linha)){


       				//mysql_query('INSERT INTO emails (nome, email) VALUES ("'.$dados[0].'", "'.$dados[1].'")');
    			}
			}

			// Fecha arquivo aberto
			
		}*/
		?>