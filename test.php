<?php
$server = "localhost";
$username = "jhon";
$password = "jhon";
$database = "crmProyect";

// Crear conexión
$conn = new mysqli($server, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";

// Realizar una consulta simple
$query = "SELECT * FROM tu_tabla";
$result = $conn->query($query);

// Verificar si la consulta fue exitosa
if ($result) {
    // Procesar los resultados
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . "<br>";
    }
} else {
    // Mostrar un mensaje de error si la consulta falla
    echo "Error en la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
