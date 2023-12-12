<?php
session_start();
session_destroy();
header("Location: ../../index.html"); // Redirige al formulario de inicio de sesión después de cerrar sesión
?>
