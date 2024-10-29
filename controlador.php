<?php

session_start();

$conexion = new mysqli("localhost", "root", "", "ra_db");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar"])) {
    $curp = $_POST["curp"];
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $confirmar_contrasena = $_POST["confirmar_contrasena"]; 
    $tipo = $_POST["tipo"];
    
    if ($contrasena != $confirmar_contrasena) {
        echo '<div class="alert alert-danger">Las contraseñas no coinciden. Por favor, intenta de nuevo.</div>';
        exit;
    } else {
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO usuarios (nombre, curp, contrasena, tipo) VALUES ('$nombre', '$curp', '$hash_contrasena', '$tipo')";
        
        if ($conexion->query($query) === TRUE) {
            echo '<div class="alert alert-success">Usuario registrado exitosamente.</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar usuario: ' . $conexion->error . '</div>';
        }
    }
}

// Inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btningresar"])) {
    $curp = $_POST["curp"];
    $contrasena = $_POST["contrasena"];
    
    $sql = $conexion->prepare("SELECT contrasena, tipo FROM usuarios WHERE curp=?");
    $sql->bind_param("s", $curp);
    $sql->execute();
    $sql->bind_result($hash_contrasena, $tipo);
    
    if ($sql->fetch()) {
        if (password_verify($contrasena, $hash_contrasena)) {
            $_SESSION['usuario'] = $curp;
            setcookie("session", $curp, time() + (86400 * 30), "/");
            echo "Cookie creada";
            if ($tipo == 1) {
                header("location: clases.php");
                exit; 
            } elseif ($tipo == 2) {
                header("location: clasesMaestro.php");
                exit; 
            }
            exit;
        } else {
            echo '<div class="alert alert-danger">Contraseña incorrecta</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Usuario no encontrado</div>';
    }
    
    $sql->close();
}

$conexion->close();
?>
