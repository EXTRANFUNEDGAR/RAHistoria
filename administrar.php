<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" href="custom.css" />
    <link rel="stylesheet" href="Recursos/styles.css">-->
    <link rel="stylesheet" href="Recursos/w3.css">
    <link rel="stylesheet" href="es.css">
</head>
<body>
<font face="Century Gothic">
<header class="header">
    <a href="index.php" type="button" class="button-55" id="btnindex">Inicio</a>
    <a href="index.php" type="button" class="button-55" id="btncerrar">Cerrar Sesion</a>
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


<br>

<div class="card-group" id="izquierda">
    <?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "ra_db"; 
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    } 
    
    $sql = "SELECT usuarios.id_usuario, usuarios.nombre, usuarios.tipo, 
                   avance1.avance AS aTema1, avance2.avance AS aTema2,
                   avance3.avance AS aTema3, avance4.avance AS aTema4,
                   avance5.avance AS aTema5, avance6.avance AS aTema6
            FROM usuarios 
            LEFT JOIN avance AS avance1 ON usuarios.id_usuario = avance1.id_usuario AND avance1.id_tema = '1' 
            LEFT JOIN avance AS avance2 ON usuarios.id_usuario = avance2.id_usuario AND avance2.id_tema = '2'
            LEFT JOIN avance AS avance3 ON usuarios.id_usuario = avance3.id_usuario AND avance3.id_tema = '3'
            LEFT JOIN avance AS avance4 ON usuarios.id_usuario = avance4.id_usuario AND avance4.id_tema = '4'
            LEFT JOIN avance AS avance5 ON usuarios.id_usuario = avance5.id_usuario AND avance5.id_tema = '5'
            LEFT JOIN avance AS avance6 ON usuarios.id_usuario = avance6.id_usuario AND avance6.id_tema = '6';";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
            
            
            
            echo '<div>Los Primeros Humanos</div>';
            echo '<progress class="progress" max="100" value="' . $row["aTema1"] . '"></progress> ' . $row["aTema1"] . '%&nbsp; ';
            
            echo '<div>Mexico Antiguo</div>';
            echo '<progress class="progress" max="100" value="' . $row["aTema2"] . '"></progress> ' . $row["aTema2"] . '%&nbsp;';
            
            echo '<div>La Conquista</div>';
            echo '<progress class="progress" max="100" value="' . $row["aTema3"] . '"></progress> ' . $row["aTema3"] . '%&nbsp;';
            
            echo '<div>La independencia Mexicana</div>';
            echo '<progress class="progress" max="100" value="' . $row["aTema4"] . '"></progress> ' . $row["aTema4"] . '%&nbsp;';
            
            echo '<div>Guerra de Reforma</div>';
            echo '<progress class="progress" max="100" value="' . $row["aTema5"] . '"></progress> ' . $row["aTema5"] . '%&nbsp;';
            
            echo '<div>Revolucion Mexicana</div>';
            echo '<progress class="progress" max="100" value="' . $row["aTema6"] . '"></progress> ' . $row["aTema6"] . '%&nbsp;';
            
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 resultados";
    }
    
    $conn->close();
    ?>
</div>
</font>
</body>
</html>
