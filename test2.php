<?php
$servername = "localhost";
$username = "jhon";
$password = "jhon";
$database = "crmProyect";

try {
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }

    // Datos de prueba
    $nombre = "John";
    $apellido = "Doe";
    $username = "john_doe";
    $password = password_hash("secure_password", PASSWORD_DEFAULT);

    // Consulta de inserción
    $sql = "INSERT INTO usuarios (nombre, apellido, username, password) VALUES ('$nombre', '$apellido', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        throw new Exception("Error al insertar el registro: " . $conn->error);
    }

    // Cerrar la conexión
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
