<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testear GET a sí mismo</title>
</head>
<body>

<?php
// Comprobar si hay parámetros GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    echo '<h2>Parámetros GET recibidos:</h2>';
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
}
?>

<!-- Formulario de prueba con método GET -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="parametro">Parámetro de prueba:</label>
    <input type="text" name="parametro" id="parametro">
    <button type="submit">Enviar</button>
</form>

</body>
</html>
