<?php

class Csv
{
	private $_file;  
  
    function __construct($file) {  
        $this->_file = $file;  
    }  
  
    public function set_file($file) {  
        $this->_file = $file;  
    }  
  
    public function abre() {  
        $fp = fopen ($this->_file,"r");  
        while ($data = fgetcsv ($fp, 1000, ";")) {  
            $conteudo[] = $data;  
        }  
        return $conteudo;  
    }  

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="leitor.php" method="post" enctype="multipart/form-data">
<label>Arquivo:</label>
<input type="file" name="arquivo" />

<input type="submit" name="Enviar" /   >
<?php

$csv = new Csv('arquivo.csv');  
$conteudo = $csv->abre();  


?>
</form>
</body>
</html>