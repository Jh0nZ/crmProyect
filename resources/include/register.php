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
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
   
    $conn->close();
}
?>
