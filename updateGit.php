<?php
// Cambia el directorio al del repositorio
chdir("/var/www/html/adrmrk.site/public_html");
// Set the path to your private key

// Execute the command with the key path
exec("git pull https://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@github.com/Jh0nZ/crmProyect.git main 2>&1", $output);
// Muestra la salida del comando
echo "<pre>" . implode("\n", $output) . "</pre>";
?>