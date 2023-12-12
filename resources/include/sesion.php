<?php
session_start();
$response = ['success' => false];
// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $response['success'] = true;
}
echo json_encode($response);
?>
