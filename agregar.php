<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Agregar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="custom.css" />
    <link rel="stylesheet" href="es.css">
    <link rel="stylesheet" href="Recursos/styles.css">
    <link rel="stylesheet" href="Recursos/w3.css">
</head>
<header class="header">

<div id="izq">
<a class="button-55" href="javascript: history.go(-1)">Volver atrás</a>
<a href="index.php"  class="button-55" >Inicio</a>
<a href="" id="logoutButton" class="button-55">Cerrar Sesión</a>
</div>
<div class="logo">
    <img src="Recursos/juarez.png" alt="Primaria Benito Juarez">
</div>
<nav class="menu">
   <ul class="nav-links">
    <label id="titulo">Escuela Benito Juárez</label>
    
    <li><a href="#"> Ayuda </a>
        <ul id="submenu">
            <li><a href="#">Contacto </a></li>
            <li><a href="#">Soporte </a></li>
        </ul>
    </li>
   </ul> 
</nav>

</header>
<body>
   

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