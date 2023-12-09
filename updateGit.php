<?php
// Cambia el directorio al del repositorio
chdir("/var/www/html/adrmrk.site/public_html");
// Ejecuta el comando git pull origin main
exec("git pull origin main 2>&1", $output);
// Muestra la salida del comando
echo "<pre>" . implode("\n", $output) . "</pre>";
?>