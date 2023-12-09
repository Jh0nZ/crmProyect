<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online de Prueba</title>
    <!-- Agrega tus enlaces a hojas de estilo CSS aquí -->
</head>
<body>

<header>
    <h1>Tienda Online de Prueba</h1>
    <!-- Puedes agregar un menú de navegación aquí -->
</header>

<main>
    <section>
        <h2>Productos Destacados</h2>
        <!-- Muestra los productos destacados con sus detalles -->
        <div class="producto">
            <img src="producto1.jpg" alt="Producto 1">
            <h3>Producto 1</h3>
            <p>Descripción del producto. Precio: $XX.XX</p>
            <button>Agregar al Carrito</button>
        </div>

        <div class="producto">
            <img src="producto2.jpg" alt="Producto 2">
            <h3>Producto 2</h3>
            <p>Descripción del producto. Precio: $XX.XX</p>
            <button>Agregar al Carrito</button>
        </div>

        <!-- Repite esta estructura para otros productos -->
    </section>

    <section>
        <h2>Carrito de Compras</h2>
        <!-- Muestra los productos en el carrito con la opción de eliminar o actualizar la cantidad -->
        <ul>
            <li>Producto 1 - Cantidad: 2 - Precio Total: $XX.XX</li>
            <li>Producto 2 - Cantidad: 1 - Precio Total: $XX.XX</li>
            <!-- Repite esta estructura para otros productos en el carrito -->
        </ul>

        <h3>Total del Carrito: $XX.XX</h3>

        <button>Realizar Pedido</button>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Tienda Online de Prueba. Todos los derechos reservados.</p>
</footer>

<!-- Agrega tus enlaces a scripts JavaScript aquí, si es necesario -->

</body>
</html>
