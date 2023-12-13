<?php
session_start();
require_once("config.php");

// Verificar si se han enviado datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        $response["success"] = false;
        $response["message"] = "Conexión fallida: " . $conn->connect_error;
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para verificar el usuario y la contraseña
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        // Verificar la contraseña usando password_verify
        if (password_verify($password, $storedPassword)) {
            // Inicio de sesión exitoso
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["user_id"];
            $response["success"] = true;
            $response["message"] = "Inicio de sesión exitoso";
        } else {
            $response["success"] = false;
            $response["message"] = "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // El usuario no existe
        $response["success"] = false;
        $response["message"] = "El usuario no existe";
    }
    $conn->close();
    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
