<?php
$output = shell_exec("cd /var/www/html/adrmrk.site/public_html && git pull origin main 2>&1");
echo "<pre>$output</pre>";
?>
