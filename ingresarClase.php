<?php
    
    $id_clase = $_GET['ingresar'];
    echo $id_clase;
    
    if (isset($_COOKIE['session'])) {
        // valor de la cookie
        $usuario = htmlspecialchars($_COOKIE['session']);
        //echo " El valor de la cookie 'usuario' es: $usuario ";
    } else {
       // echo " La cookie 'usuario' no está establecida.";
    }
    $conexion= mysqli_connect("localhost","root","","ra_db");

$sql="SELECT id_usuario FROM usuarios WHERE curp = '$usuario'";
$result=mysqli_query($conexion,$sql);

$id_usuario = null;

if ($result) {
    $fila = $result->fetch_assoc();
    if ($fila) {
        $id_usuario = $fila["id_usuario"];
    } else {
        //echo "No se encontró el usuario.";
    }
} else {
    //echo "Error en la consulta: " . mysqli_error($conexion);
}

if ($id_usuario !== null) {
   // echo "ID de usuario: " . $id_usuario;
}
require('config.php');
//id_usuario 

if (!$con) {
    die("Error en la conexión: " . mysqli_connect_error());
}


    require('config.php');
    //id_usuario 

    $cons ="SELECT * FROM `clase_usuario` WHERE id_clase = $id_clase";

    
    $result = mysqli_query($con, $cons);
     if (mysqli_num_rows($result) > 1) {
        echo"No existe la clase";
        echo"<a class='button-55' href='clases.php'>Volver atrás</a>";
} else {
    $cons ="INSERT INTO `clase_usuario`(`id_clase`, `id_usuario`) VALUES ('$id_clase','$id_usuario')";
    mysqli_query($con, $cons);
    echo"<a class='button-55' href='clases.php'>Volver atrás</a>";
} 
    if (!$con) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
    
    //$cons ="INSERT INTO `clases`(`id_clase`, `id_usuario`) VALUES ('$id_clase','$id_usuario')";


    ?>