<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Agregar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="es.css">
</head>
<body>
<h1>Hola Mundo</h1>    



 <div class="card-group" id="izquierda">
      <form action="reExcel.php" method="POST" enctype="multipart/form-data"/>
        
            <input  type="file" name="usuarios" id="file-input"/>
            <label  for="file-input">
              <span>Elegir Archivo Excel</span></label>
        
          <input type="submit" name="subir" class="btn-enviar" value="Subir Excel"/>
      </form>
    

    
</div>

</body>
</html>