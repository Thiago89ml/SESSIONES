<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: registro.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Compras</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="container-tienda">
        <h2>Catálogo de Productos</h2>
        <p style="text-align: center; color: #718096;">Explora nuestros artículos disponibles</p>

        <div class="grid-productos">
            <div class="card-producto">
                <div class="img-placeholder">💻</div>
                <h3>Laptop Pro 15"</h3>
                <p class="precio">$1,200</p>
                <button class="btn-comprar">Agregar al Carrito</button>
            </div>

            <div class="card-producto">
                <div class="img-placeholder">🎧</div>
                <h3>Auriculares Bluetooth</h3>
                <p class="precio">$85</p>
                <button class="btn-comprar">Agregar al Carrito</button>
            </div>

            <div class="card-producto">
                <div class="img-placeholder">📱</div>
                <h3>Smartphone X</h3>
                <p class="precio">$950</p>
                <button class="btn-comprar">Agregar al Carrito</button>
            </div>

            <div class="card-producto">
                <div class="img-placeholder">⌚</div>
                <h3>Reloj Inteligente</h3>
                <p class="precio">$190</p>
                <button class="btn-comprar">Agregar al Carrito</button>
            </div>
        </div>
    </div>

</body>
</html>