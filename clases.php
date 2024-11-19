<?php
if (isset($_COOKIE['session'])) {
    // valor de la cookie
    $usuario = htmlspecialchars($_COOKIE['session']);
    //echo " El valor de la cookie 'usuario' es: $usuario ";
} else {
   // echo " La cookie 'usuario' no está establecida.";
}
//id_usuario
$conexion= mysqli_connect("localhost","root","","ra_db");

$sql="SELECT id_usuario FROM usuarios WHERE curp = '$usuario'";
$result=mysqli_query($conexion,$sql);

$id_usuario = null;

if ($result) {
    $fila = $result->fetch_assoc();
    if ($fila) {
        $id_usuario = $fila["id_usuario"];
    } else {
       // echo "No se encontró el usuario.";
    }
} else {
    //echo "Error en la consulta: " . mysqli_error($conexion);
}

if ($id_usuario !== null) {
    //echo "ID de usuario: " . $id_usuario;
}
require('config.php');
//id_usuario 

if (!$con) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$cons ="SELECT c.id_clase  FROM usuarios u JOIN clase_usuario c on u.id_usuario = c.id_usuario WHERE u.id_usuario = $id_usuario";


$result = mysqli_query($con, $cons);

$cons1 ="SELECT * FROM clase_usuario";
$result1 = mysqli_query($con, $cons1);
/* if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
} else {

    while ($row = mysqli_fetch_assoc($result)) {

        print_r($row);
    }
} */





?>
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
</head>
<body>
    <font face="Century Gothic">
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

        <br>


    <br>
    
    
    <div class="card-group" id="izquierda" align='center'>
    <?php
// Verificar si la consulta devuelve algún resultado
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $codigoClase = $row['id_clase'];
        ?>
        <div class="card">
            <div class="p-3 mb-2 bg-dark text-white">
                <img src="img/a2.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Clase: <?php echo $codigoClase; ?> </h5>
                    <a href="marcadores.html" class="button-55">Marcadores</a>
                    <br>
                    <div class="container mt-4">
                        <div class="form-group">
                            <label for="seleccionA">Selecciona la clase:</label>
                            <select class="form-control" id="seleccionA">
                                <option value="elemento1">Los primeros Humanos</option>
                                <option value="elemento2">Pueblos y culturas del Mexico Antiguo</option>
                                <option value="elemento3">La Conquista</option>
                                <option value="elemento4">La independencia Mexicana</option>
                                <option value="elemento5">Guerra de Reforma</option>
                                <option value="elemento6">Revolucion Mexicana</option>
                            </select>
                        </div>
                        <br>
                        <button type="button" class="button-55" onclick="enviarDatoSeleccionado('seleccionA')">Abrir</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} 

// Cerrar la conexión
?>
<!--         <div class="card">
            <div class="p-3 mb-2 bg-dark text-white">
                <img src="img/a2.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Clase: </h5>
                    
                    <a href="marcadores.html" class="button-55">Marcadores</a>
                    <br>
                    <div class="container mt-4">
                        <div class="form-group">
                            <label for="seleccionA">Selecciona la clase:</label>
                            <select class="form-control" id="seleccionA">
                                <option value="elemento1">Los primeros Humanos</option>  Edgar
                                <option value="elemento2">Pueblos y culturas del Mexico Antiguo</option> <!-- Edgar 
                                <option value="elemento3">La Conquista</option> <!-- Emmanuel 
                                <option value="elemento4">La independencia Mexicana</option> <!-- Emmanuel 
                                <option value="elemento5">Guerra de Reforma</option> <!-- Emmanuel -
                                <option value="elemento6">Revolucion Mexicana</option> <!-- Edgar -
                                
                                
                                
                                
                        
                            </select>
                            
                        </div>
                        <br>
                        <button type="button" class="button-55" onclick="enviarDatoSeleccionado('seleccionA')">Abrir</button>
                    </div>
                </div>
            </div>
        </div> -->
        
        <?php
// Verificar si la consulta devuelve algún resultado
if (mysqli_num_rows($result) < 1) {
    ?>
        <form id="form" method="get" action="agregarClase.php">
            <label for="res">Crear de clase</label>
            <br>
            <input type="text" id="res" name="res">
            <br>
            <br>
            <input class="button-55" role="button" id="enviar" type="submit" value="Entrar">
        </form>
        <form id="form" method="get" action="ingresarClase.php">
            <label for="ingresar">Ingresar clase</label>
            <br>
            <input type="text" id="ingresar" name="ingresar">
            <br>
            <br>
            <input class="button-55" role="button" id="enviar" type="submit" value="Entrar">
        </form>
    
    <?php
    }
    ?>

</div>
    </font>

    <script>
        document.getElementById('logoutButton').addEventListener('click', function() {
            deleteCookie("session");
            window.location.href = "index.php"; 
        });
        
        function checkSession() {
            if (!document.cookie.includes("session=")) {
                window.location.href = "index.php"; 
            }
        }

        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === 'visible') {
                checkSession();
            }
        });

        function deleteCookie(name) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }
        checkSession();

        function enviarDatoSeleccionado(selectId) {
            var selectedValue = document.getElementById(selectId).value;
            
            var pageUrls = {
                'elemento1': 'clases/losPrimerosHumanos.html',
                'elemento2': 'clases/MexicoAntiguo.html',
                'elemento3': 'clases/laConquista.html',
                'elemento4': 'clases/laIndependenciaMexicana.html',
                'elemento5': 'clases/guerraDeReforma.html',
                'elemento6': 'clases/revolucionMexicana.html'
            };

            var selectedPageUrl = pageUrls[selectedValue];

            window.location.href = selectedPageUrl;

            return false;
        }

function getCookie(session) {
    let cookieArr = document.cookie.split(";");

    for(let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split("=");


        if(session === cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }


    return null;
}

let curpValue = getCookie("session");
console.log("Valor de la cookie curp: " + curpValue);
    </script>
</body>
</html>