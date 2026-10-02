<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div class="nav-container">
        <h1 class="logo"><a href="index.php">MiWeb</a></h1>
        
        <nav class="nav-links">
            <a href="index.php">Inicio</a>
            <a href="compras.php">Compras</a>

            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                <a href="panel.php" class="btn-admin">Panel Admin</a>
            <?php endif; ?>

            <div class="auth-box">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
                <?php else: ?>
                    <a href="login.php" class="btn-login">Iniciar Sesión</a>
                    <a href="registro.php" class="btn-registro">Registrarse</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>