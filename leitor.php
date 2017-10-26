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

$csv = new Csv('arquivo.csv');  
$conteudo = $csv->abre();  
?>