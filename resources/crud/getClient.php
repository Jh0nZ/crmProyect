<?php
session_start();
require_once("config.php");

// Obtener el phase_id desde JavaScript (suponiendo que se pasa a través de un método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phase_id = $_POST["phase_id"];

    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        echo json_encode(array("error" => "Error conexion base de datos"));
    }

    // Consultar la base de datos para obtener los clientes correspondientes al phase_id
    $sql = "SELECT * FROM client WHERE phase_id = $phase_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Convertir el resultado a un array asociativo y enviarlo como JSON
        $clientes = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($clientes);
    } else {
        echo "No se encontraron clientes para el phase_id proporcionado.";
    }
} else {
    echo "Acceso no autorizado.";
}

// Cerrar la conexión
$conn->close();
?>
