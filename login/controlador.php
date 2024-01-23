<?php
if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) and empty($_POST["password"])){
        echo '<div class="alert alert-danger">Estan vacios los campos</div>';
    } else {
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["password"];
        $sql=$conexion->query("select * from usuarios where usuario='$usuario' and contraseña='$contraseña'");
        if ($datos=$sql->fetch_object()){
            header("location: clases/clases.html");
        } else {
            echo '<div class="alert alert-danger">Acceso denegado</div>';
        }
    }
}
?>