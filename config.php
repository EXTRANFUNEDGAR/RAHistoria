<?php
//header("Content-Type: text/html;charset=utf-8");
$usuario  = "root";
$password = "";
$server = "localhost";
$basededatos = "ra_db";
$con = mysqli_connect($server, $usuario, $password) or die("No se ha podido conectar al Server");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
$db = mysqli_select_db($con, $basededatos) or die("Error");

?>