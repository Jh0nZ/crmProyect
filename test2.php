<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testear POST a sí mismo</title>
</head>
<body>

<?php
// Comprobar si hay datos POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    echo '<h2>Datos POST recibidos:</h2>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}
?>

<!-- Formulario de prueba con método POST -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="dato">Dato de prueba:</label>
    <input type="text" name="dato" id="dato">
    <button type="submit">Enviar</button>
</form>

</body>
</html>
