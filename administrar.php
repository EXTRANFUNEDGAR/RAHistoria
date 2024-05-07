
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="custom.css" />
    <link rel="stylesheet" href="es.css">
    <link rel="stylesheet" href="Recursos/styles.css">
    <link rel="stylesheet" href="Recursos/w3.css">
    <link rel="stylesheet" href="es.css">
</head>
<body>
<font face="Century Gothic">
<header class="header">
        <a href="index.php" type="button" class="btn btn-secondary" id="btnindex">Inicio</a>
        <a href="index.php" type="button" class="btn btn-secondary" id="btncerrar">Cerrar Sesion</a>
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


<aside class="izqa">
  <br>
  <div class="izq">
      <a class="button-55" href="javascript: history.go(-1)">Volver atrás</a>

  </div>
</aside>

<br>
<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "ra_db"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 


$sql = "SELECT usuarios.id_usuario, usuarios.curp, usuarios.tipo, avance1.avance AS aTema1, avance2.avance AS aTema2 FROM usuarios LEFT JOIN avance AS avance1 ON usuarios.id_usuario = avance1.id_usuario AND avance1.id_tema = '1' LEFT JOIN avance AS avance2 ON usuarios.id_usuario = avance2.id_usuario AND avance2.id_tema = '2';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo $row["curp"]."<br>";
        
        echo "Los Primero Humanos &nbsp;&nbsp;&nbsp;&nbsp;"." Mexico Antiguo&nbsp;"."<br>"; 
        echo "<progress max='10' value='" . $row["aTema1"] . "'></progress> " . $row["aTema1"] . "%&nbsp; " . "<progress max='10' value='" . $row["aTema2"] . "'></progress> " . $row["aTema2"] . "%&nbsp;";

        echo "<br>";

    }
} else {
    echo "0 resultados";
}




$conn->close();
?>









</font>
</body>
</html>
