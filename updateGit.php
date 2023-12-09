<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$output = shell_exec("cd /var/www/html/adrmrk.site/public_html && GIT_SSH_COMMAND='ssh -i /root/.ssh/id_ed25519.pub' git pull origin main 2>&1");
echo "<pre>$output</pre>";
?>
