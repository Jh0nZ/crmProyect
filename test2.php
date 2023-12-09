<?php
$servername = "localhost";
$username = "jhon";
$password = "jhon";
$database = "crmProyect";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";

// Cerrar la conexión
$conn->close();
?>
