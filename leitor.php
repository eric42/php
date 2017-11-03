<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
    <title></title>
    
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <script type='text/javascript'>//<![CDATA[
        $(window).load(function(){
        $('#click').click(function(){
        	$csv = Array();
            var files = $('input#files')[0].files;
            var names = "";
            $.each(files,function(i, file){
               names += file.name + "<br/>";
            });
            $file = fopen(names, 'r');

			while (($line = fgetcsv($file)) !== false)
			{
  				$csv[] = $line;
			}

			fclose($file);

			for($i = 0; $i < count(csv); $i++){
				echo $csv[$i];
			}
            //document.getElementById("result").innerHTML = $csv;
        });
        });//]]> 


$file = fopen('numeros.csv', 'r');
while (($line = fgetcsv($file)) !== false)
{
  $meuArray[] = $line;
}
fclose($file);
print_r($meuArray);

    </script>
  
</head>

<body>
  <form action='server.php' method='post' enctype='multipart/form-data' >
                <input id="files" name='files[]' type='file' multiple>
                <input type='button' value="Carregar dados" id="click">
                <div id="result" />
    </form>

  
</body>

</html>