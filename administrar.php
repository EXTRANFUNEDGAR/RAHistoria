<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // nombre del servidor
$username = "root"; // nombre de usuario
$password = ""; // contraseña
$database = "ra_db"; // nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 

// Consulta SQL
$sql = "SELECT id_usuario, curp, tipo FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_usuario"]. " - Nombre: " . $row["curp"]. " - Email: " . $row["tipo"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>

