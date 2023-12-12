<?php
session_start();
require_once("config.php");

// Verificar si se han enviado datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($database_server, $database_username, $database_password, $database_database);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
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
            header("Location: dashboard.php"); // Redirige a la página principal después del inicio de sesión
        } else {
            // Inicio de sesión fallido
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // El usuario no existe
        echo "Nombre de usuario o contraseña incorrectos.";
    }


    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
