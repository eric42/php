<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
    <title></title>
    
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


    <script type='text/javascript'>//<![CDATA[
        $(window).load(function(){
        $('#click').click(function(){
            var files = $('input#files')[0].files;
            var names = "";
            $.each(files,function(i, file){
               names += file.name + "<br/>";
            });
            document.getElementById("result").innerHTML = names;
        });
        });//]]> 

    </script>
  
</head>

<body>
  <form action='server.php' method='post' enctype='multipart/form-data' >
                <input id="files" name='files[]' type='file' multiple>
                <input type='button' value="Click para mostrar Arquivos" id="click">
                <div id="result" />
    </form>

  
</body>

</html>