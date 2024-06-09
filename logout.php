<?php
// Iniciar sesión si aún no está iniciada
session_start();

// Eliminar la variable de sesión específica
unset($_SESSION['usuario']);

// Destruir todas las demás variables de sesión
$_SESSION = array();

// Finalmente, destruir la sesión
session_destroy();

// Borrar la cookie de sesión si se creó
if (isset($_COOKIE["session"])) {
    setcookie("session", "", time()-3600, "/");
    echo "Cookie de sesión eliminada correctamente.";
} else {
    echo "No se encontró la cookie de sesión.";
}



// Redirigir al usuario a la página de inicio o a cualquier otra página que prefieras
header("Location: index.php");
exit;

?>
