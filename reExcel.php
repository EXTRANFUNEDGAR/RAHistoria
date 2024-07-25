<?php
require('config.php');
$tipo       = $_FILES['usuarios']['type'];
$tamanio    = $_FILES['usuarios']['size'];
$archivotmp = $_FILES['usuarios']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $nombre = !empty($datos[0])  ? ($datos[0]) : '';
		$curp   = !empty($datos[1])  ? ($datos[1]) : '';
        $contrasena = !empty($datos[2])  ? ($datos[2]) : '';
        $tipo   =   !empty( $datos[3]) ? $datos[3] : '';

$insertarData = "INSERT INTO usuarios( 
   nombre,
    curp,
    contrasena,
    tipo
) VALUES(
    '$nombre',
    '$curp',
    '$contrasena',
    '$tipo'
)";
mysqli_query($con, $insertarData);
} 
 $i++;
}
?>
<a href="index.php">Atras</a>