<?php
session_start();
require_once('config.php');

// Verificar si el usuario está autenticado
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

// Procesar el formulario de inicio de sesión
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Conectar a la base de datos
    $conn = new mysqli($server, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar al usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['usuario_id'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
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
    <link rel="stylesheet" href="resources/styles/login.css">
    <title>Iniciar sesión</title>
</head>
<body>

<h2>Iniciar sesión</h2>

<form action="" method="post">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>

    <input type="submit" name="login" value="Iniciar sesión">
</form>

<p>¿No tienes una cuenta? <a href="index.php">Regístrate aquí</a>.</p>

</body>
</html>
