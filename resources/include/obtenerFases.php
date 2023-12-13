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

    $getFunnelSql = "SELECT f.name AS funnel_name, p.name AS phase_name
                     FROM funnel f
                     JOIN phase p ON f.funnel_id = p.funnel_id
                     WHERE f.store_id = $store_id";

    $result = $conn->query($getFunnelSql);

    if ($result->num_rows > 0) {
        $funnelData = array();
        $currentFunnelId = null;

        while ($row = $result->fetch_assoc()) {
            $funnelId = $row["id"];

            if ($funnelId !== $currentFunnelId) {
                $currentFunnelId = $funnelId;
                $funnelData[] = array(
                    "funnel_id" => $row["id"],
                    "funnel_name" => $row["name"],
                    "funnel_description" => $row["description"],
                    "phases" => array()
                );
            }

            $funnelData[count($funnelData) - 1]["phases"][] = array(
                "phase_name" => $row["phase_name"],
                "phase_description" => $row["phase_description"]
            );
        }

        header('Content-Type: application/json');
        echo json_encode($funnelData);
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