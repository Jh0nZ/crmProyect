<?php
session_start();
$response = ['success' => false];
// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION["user_id"]) && isset($_SESSION["store_id"])) {
    $response['success'] = true;
}
echo json_encode($response);
?>
