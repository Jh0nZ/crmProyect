<?php
// Cambia el directorio al del repositorio
chdir("/var/www/html/adrmrk.site/public_html");
// Set the path to your private key

// Execute the command with the key path
exec("git pull https://jhon202107786:xqn4Nz66f_hE5HS@github.com:Jh0nZ/crmProyect.git main 2>&1", $output);
// Muestra la salida del comando
echo "<pre>" . implode("\n", $output) . "</pre>";
?>