<?php
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

header("Location: resources/include/leads.php");