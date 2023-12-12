<?php
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

header("Location: resources/include/leads.php");