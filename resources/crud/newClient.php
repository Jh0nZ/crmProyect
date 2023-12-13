<?php
session_start();
require_once("../include/config.php");

// Obtener el phase_id desde JavaScript (suponiendo que se pasa a través de un método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $store_id = $_SESSION["store_id"];
    $first_name = $_POST["first_name"];
    $phase_id = $_POST["phase_id"];
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : null;
    $whatsapp = isset($_POST["whatsapp"]) ? $_POST["whatsapp"] : null;
    $extra = isset($_POST["extra"]) ? $_POST["extra"] : null;
    $creation_date = $_POST["creation_date"];

    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        echo json_encode(array("error" => "Error conexion base de datos"));
    }

    // Consultar la base de datos para obtener los clientes correspondientes al phase_id
    $sql = "INSERT INTO client (store_id, first_name, phase_id, last_name, whatsapp, extra, creation_date)
        VALUES ('$store_id', '$first_name', '$phase_id', '$last_name', '$whatsapp', '$extra', '$creation_date')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => "Cliente insertado correctamente"));
    } else {
        echo json_encode(array("error" => "Error al insertar cliente"));
    }
} else {
    echo json_encode(array("error" => "Solo metodo post"));
}

// Cerrar la conexión
$conn->close();
?>