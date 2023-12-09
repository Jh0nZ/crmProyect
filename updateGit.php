<?php

// Establece la ruta al directorio del repositorio Git
$repo_dir = '/var/www/html/adrmrk.site/public_html';

// Ejecuta el comando git pull
exec("cd $repo_dir && git pull origin main > git_log.txt 2>&1", $output, $return_code);


// Verifica el código de salida del comando
if ($return_code !== 0) {
    echo "Error al ejecutar el comando. Código de salida: $return_code";
} else {
    echo "Comando ejecutado correctamente. Salida: " . implode("\n", $output);
}

echo "testeando";
?>
