<?php

// Establece la ruta al directorio del repositorio Git
$repo_dir = '/var/www/html/adrmrk.site/public_html';

// Ejecuta el comando git pull
$output = shell_exec("cd $repo_dir && git pull origin main");

// Verifica si el comando se ejecutó correctamente
if ($output === null) {
    echo "Error al ejecutar el comando.";
} else {
    echo "Comando ejecutado correctamente. Salida: $output";
}

$uid = posix_geteuid();

$user = posix_getpwuid($uid);

echo $user['name'];

echo "testeando";
?>
