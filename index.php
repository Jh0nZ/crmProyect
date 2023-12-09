<?php
session_start();
require_once('config.php');

// Verificar si el usuario está autenticado
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

// Procesar el formulario de registro
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Conectar a la base de datos
    $conn = new mysqli($server, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insertar nuevo usuario en la tabla Usuarios
    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/styles/index.css">
    <title>Registro</title>
</head>
<body>

<h2>Registro</h2>

<form action="" method="post">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>

    <input type="submit" name="register" value="Registrar">
</form>

<p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>

</body>
</html>
