<?php
session_start();
require_once("config.php");

if (isset($_SESSION["user_id"]) && isset($_SESSION["store_id"]) && isset($_SESSION["username"])) {
    $user_id = $_SESSION["user_id"];
    $store_id = $_SESSION["store_id"];
    
    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        echo json_encode(array("error" => "Error conexion base de datos"));
    }

    $getFunnelSql = "SELECT f.name AS funnel_name, p.name AS phase_name, p.phase_id
                     FROM funnel f
                     JOIN phase p ON f.funnel_id = p.funnel_id
                     WHERE f.store_id = $store_id";

    $result = $conn->query($getFunnelSql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $funnel_name = $row['funnel_name'];
            $phase_name = $row['phase_name'];
            $phase_id = $row['phase_id'];
            
            // Agregar el phase_name y phase_id al array asociativo
            if (!isset($data[$funnel_name])) {
                $data[$funnel_name] = array();
            }
            $data[$funnel_name][] = array("phase_name" => $phase_name, "phase_id" => $phase_id);
        }
        
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("error" => "No se encontró un embudo para el usuario."));
    }

    $conn->close();
} else {
    header('Content-Type: application/json');
    echo json_encode(array("error" => "Usuario no autenticado."));
}
?>
