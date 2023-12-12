<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];

    $checkUserSql = "SELECT * FROM user WHERE username = '$username'";
    $checkUserResult = $conn->query($checkUserSql);

    if ($checkUserResult->num_rows > 0) {
        // El usuario ya existe, indicar en el formulario
        $response = array("success" => false, "message" => "El nombre de usuario ya está en uso. Por favor, elija otro.");
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $insertUserSql = "INSERT INTO user (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            
            $response = array("success" => true, "message" => "Usuario registrado exitosamente");
        } else {
            $response = array("success" => false, "message" => "Error al registrar el usuario: " . $conn->error);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    $conn->close();
}
?>
