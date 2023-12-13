<?php
session_start();
require_once("../include/config.php");

// Obtener el phase_id desde JavaScript (suponiendo que se pasa a través de un método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];
    $phase_id = $_POST['phase_id'];

    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        echo json_encode(array("error" => "Error conexion base de datos"));
    }

    // Consultar la base de datos para obtener los clientes correspondientes al phase_id
    $sql = "UPDATE client SET phase_id = $phase_id WHERE client_id = $client_id";
    $result = $conn->query($sql);
    if ($result) {
        echo json_encode(array("success" => "Actualización exitosa"));
    } else {
        echo json_encode(array("error" => "Error al actualizar el cliente"));
    }

} else {
    echo json_encode(array("error" => "Solo post"));
}

// Cerrar la conexión
$conn->close();
?>
