<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["respuesta"]) && $_POST["respuesta"] == 1) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ra_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO avance (id_usuario, id_tema, avance) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $id_usuario, $id_tema, $avance);

    $id_usuario = 1; 
    $id_tema = 1; 
    $avance = 1;

    sleep(2);

    if ($stmt->execute()) {
        // Redirigir a la página después de la ejecución exitosa
        header("Location: http://localhost/RAHistoria/clases/losPrimerosHumanos.html");
        exit();
    } else {
        echo "Error al registrar el avance en la base de datos: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No se ha recibido el valor 1 desde el formulario.";
}

?>

