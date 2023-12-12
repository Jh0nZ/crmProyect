<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["username"])) {
    header("Location: ./../index.html"); // Redirige al formulario de inicio de sesión si no ha iniciado sesión
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["username"]; ?></h2>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
a