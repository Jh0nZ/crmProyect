<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $titulo_pagina; ?>
    </title>
    <link rel="stylesheet" href="../styles/plantilla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="../icons/logo.ico" type="image/x-icon">
</head>

<body>

    <div id="sidebar" class="sidebar-container">
        <div class="user-icon-container">
            <i class="fa-solid fa-user-shield"></i>
        </div>
        <?php
        $elementos = array("Leads", "Chats", "Stats");

        foreach ($elementos as $elemento) {
            $clase = ($elemento == $titulo_pagina) ? 'class="active"' : '';
            echo "<button $clase>$elemento</button>";
        }

        ?>
        <a href='../../logout.php' class="cerrar-sesion">Cerrar Sesión</a>
        
    </div>
    <?php echo $contenido; ?>
</body>

</html>