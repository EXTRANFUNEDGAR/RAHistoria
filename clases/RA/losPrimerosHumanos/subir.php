<?php
// Verificar si se ha recibido el valor "1" del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["respuesta"]) && $_POST["respuesta"] == 1) {
    // Datos de conexión a la base de datos (modificar según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ra_db";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }

    // Preparar la consulta para insertar el valor en la tabla 'avance'
    $stmt = $conn->prepare("INSERT INTO avance (id_usuario, id_tema, avance) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $id_usuario, $id_tema, $avance);

    // Establecer los valores a insertar
    $id_usuario = 1; // Cambiar por el ID del usuario correspondiente
    $id_tema = 1; // Cambiar por el ID del tema correspondiente
    $avance = 1;

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "El avance se ha registrado correctamente en la base de datos.";
    } else {
        echo "Error al registrar el avance en la base de datos: " . $conn->error;
    }

    // Cerrar la conexión y liberar recursos
    $stmt->close();
    $conn->close();
} else {
    echo "No se ha recibido el valor 1 desde el formulario.";
}
?>
