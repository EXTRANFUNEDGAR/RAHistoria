<?php
session_start();

unset($_SESSION['usuario']);

$_SESSION = array();

session_destroy();

if (isset($_COOKIE["session"])) {
    setcookie("session", "", time()-3600, "/");
    echo "Cookie de sesión eliminada correctamente.";
} else {
    echo "No se encontró la cookie de sesión.";
}


header("Location: index.php");
exit;

?>
