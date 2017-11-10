<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
    <title></title>
    
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <script type='text/javascript'>//<![CDATA[
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


		  for (var i = 0; i < fileArr.length; i++) {
		    strDiv += '<tr>';


	    	var fileLine = fileArr[i].split(';');

		    for (var j = 0; j < fileLine.length; j++) {

		      if(fileLine[j].length > 0){
		      	if (i == 0)
		      	{
		      		strDiv += '<br> <input type="text" > <br>';
		      	}
		      	strDiv += '<td>' + fileLine[j].trim() + '</td>';
		      }
		    }
		    strDiv += '</tr>';
		  }

		  strDiv += '</table>';

		  var CSVsaida = document.getElementById('CSVsaida');
		  CSVsaida.innerHTML = strDiv;
		}

		var cbs = document.getElementsByClassName('cb');



		function cbClick() {
    		var input = document.querySelector('input[data-id="' + this.getAttribute('data-id') + '"]:not([type="checkbox"])');
    		input.disabled = !this.checked;
		}

		for(var i in cbs) {
    		cbs[i].onclick = cbClick;
		}

    </script>
  
</head>

<body>

<input type="checkbox" name="chkNovo" checked="true" value="Novo" onchange="cbClick">Nova tabela?<br>

<input type="file" id="inputCSV" onchange="pegaCSV(this)" data-id="inputCSV" disabled>
<div id="CSVsaida"></div>

</body>
</html>