<?php
$server = "localhost";
$username = "jhon";
$password = "jhon";
$database = "crmProyect";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crear conexión
    $conn = new mysqli($server, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la contraseña

    // Preparar la consulta SQL
    $query = "INSERT INTO usuarios (nombre, apellido, username, password) VALUES ('$nombre', '$apellido', '$username', '$password')";

    // Ejecutar la consulta
    if ($conn->query($query) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error en el registro: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="<?php echo htmlspecialchars("144.22.42.206/test.php"); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>
