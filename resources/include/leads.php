<!-- pagina1.php -->

<?php
session_start();

// Verificar si el usuario está autenticado
if(!isset($_SESSION['username'])) {
    header("Location: ../../index.html");
    exit;
}

?>
<?php
$titulo_pagina = "Leads";
$contenido_clase = "mostrar leads";
$contenido = '<div class="contenedor">
<div class="arriba">
    <span> '.$titulo_pagina.' </span>
    <input type="text" name="" id="">
    <button class="lead-add-new">+NEW LEAD</button>
</div>
<div class="contenedor-abajo">
    <div class="abajo">
        <div class="fase">
            <div class="informacion-fase">
                <span class="nombre-fase">fase 1</span>
                <span>informacion</span>
            </div>
            <div class="leads-list">
                <div class="lead-container draggable" draggable="true">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="lead-info">
                        <div class="lead-info-top">
                            <p class="nombre-lead">Nombre de cliente 1 ejemplo</p>
                            <p class="fecha-creacion">Hoy 08:29</p>
                        </div>
                        <div class="lead-info-middle">
                            <p class="lead-username">UsernameCliente1</p>
                        </div>
                        <div class="lead-info-down">
                            <p>Tags</p>
                            <p class="sin-tareas">Tareas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fase">
            <div class="informacion-fase">
                <span>fase 2</span>
                <span>informacion</span>
            </div>
            <div class="leads-list">
                <div class="lead-container draggable" draggable="true">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="lead-info">
                        <div class="lead-info-top">
                            <p class="nombre-lead">Nombre de cliente 2 ejemplo</p>
                            <p class="fecha-creacion">Ayer 26:29</p>
                        </div>
                        <div class="lead-info-middle">
                            <p class="lead-username">UsernameCliente2</p>
                        </div>
                        <div class="lead-info-down">
                            <p>Tags</p>
                            <p class="sin-tareas">Tareas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fase">
            <div class="informacion-fase">
                <span>fase 3</span>
                <span>informacion</span>
            </div>
            <div class="leads-list">
            </div>
        </div>
        <div class="fase">
            <div class="informacion-fase">
                <span>fase 4</span>
                <span>informacion</span>
            </div>
            <div class="leads-list">
            </div>
        </div>
    </div>
</div>
</div>
<script>
var draggableElements = document.querySelectorAll(".draggable");

draggableElements.forEach(function (draggableElement) {
    draggableElement.addEventListener("dragstart", function () {
        draggableElement.classList.add("dragging");
    });

    document.addEventListener("dragend", function () {
        draggableElement.classList.remove("dragging");
    });
});


</script>
';
include('plantilla.php');
?>