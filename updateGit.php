<?php

// Establece la ruta al directorio del repositorio Git
$repo_dir = '/var/www/html/adrmrk.site/public_html';

// Ejecuta el comando git pull
shell_exec("cd $repo_dir && git pull origin main");

echo "testeando";
?>