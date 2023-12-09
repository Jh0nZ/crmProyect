<?php
// Cambia el directorio al del repositorio
chdir("/var/www/html/adrmrk.site/public_html");
// Set the path to your private key
$keyPath = "/root/.ssh/id_ed25519.pub";

// Execute the command with the key path
exec("GIT_SSH_COMMAND='ssh -i $keyPath && git pull origin main 2>&1", $output);
// Muestra la salida del comando
echo "<pre>" . implode("\n", $output) . "</pre>";
?>