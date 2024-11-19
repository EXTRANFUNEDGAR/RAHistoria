<?php
$num = $_GET['respuesta'];
echo "El valor enviado es: $num";


// Verificar si la cookie "usuario" está establecida
if (isset($_COOKIE['session'])) {
    // Imprimir el valor de la cookie
    $usuario = htmlspecialchars($_COOKIE['session']);
    echo " El valor de la cookie 'usuario' es: $usuario ";
} else {
    echo " La cookie 'usuario' no está establecida.";
}

$conexion= mysqli_connect("localhost","root","","ra_db");
//id_usuario
$sql="SELECT id_usuario FROM usuarios WHERE curp = '$usuario'";
$result=mysqli_query($conexion,$sql);

$id_usuario = null;

if ($result) {
    $fila = $result->fetch_assoc();
    if ($fila) {
        $id_usuario = $fila["id_usuario"];
    } else {
        echo "No se encontró el usuario.";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

if ($id_usuario !== null) {
    echo "ID de usuario: " . $id_usuario;
}
//id_usuario

$sql = "SELECT avance FROM avance WHERE id_usuario = '$id_usuario' AND id_tema='2'";
$result = mysqli_query($conexion, $sql);

// Inicializar la variable
$avance = null;

if ($result) {
    $fila = $result->fetch_assoc();
    if ($fila) {
        $avance = $fila["avance"]; 
    } else {
        echo "No se encontró el avance para el usuario.";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

if ($avance !== null) {
    echo "Avance: " . $avance;
} else {
    echo "No hay datos de avance disponibles.";
}


if($avance<=90){
if(!empty($avance)){
    $avance = $avance +10;
    $sql1="UPDATE avance SET avance='$avance' WHERE id_usuario = $id_usuario AND id_tema='2'";

    mysqli_query( $conexion,$sql1);
    echo"----";
    
}else{
    $sql1="INSERT INTO avance (id_usuario,id_tema,avance) VALUES ('$id_usuario','2','10')";

    mysqli_query( $conexion,$sql1);

}
}
switch ($num) {
    case 1:
    echo "i equals 0";
    header('Location: mem/memoria.html');
    break;
    case 2:
        header('Location: actividad3.html');
    break;
    case 3:
        header('Location: ahorcado/a.hmtl');
    break;
    case 4:
        header('Location: actividad5.html');
    default:
    }



echo  $avance;
//$sql1="INSERT INTO avance (id_usuario,id_tema,avance) VALUES ('$id_usuario','3','$avance')";

//mysqli_query( $conexion,$sql1);


?>
