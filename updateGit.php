<?php
$output = shell_exec("cd /var/www/html/adrmrk.site/public_html");
echo "<pre>$output</pre>";
$output = shell_exec("git pull origin main");
echo "<pre>$output</pre>";

?>
