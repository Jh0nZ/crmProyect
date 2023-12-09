<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar datos en una base de datos con POST</title>
</head>
<body>

<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "jhon";
$password = "jhon";
$database = "crmProyect";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si hay datos POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta SQL para la inserción
    $sql = "INSERT INTO usuarios (nombre, apellido, username, password) VALUES ('$nombre', '$apellido', '$username', '$password')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo '<h2>Datos guardados en la base de datos con éxito.</h2>';
    } else {
        echo 'Error al guardar datos: ' . $conn->error;
    }
}
?>

<!-- Formulario de prueba con método POST -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>
    <br>
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>
