<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usr  = $_POST['usuario'];
    $pwd  = $_POST['password'];
    $edad = $_POST['edad'];

    $hash = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario, password, edad, rol) VALUES ('$usr', '$hash', '$edad', 'cliente')";

    if ($conexion->query($sql)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error al registrar: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Registro de Usuario</h2>

        <?php if (isset($error)): ?>
            <div class="msg-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre de Usuario:</label>
            <input type="text" name="usuario" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <label>Edad:</label>
            <input type="number" name="edad" min="1" max="120" placeholder="Ej: 20" required>

            <button type="submit">Registrarse</button>
        </form>

        <p style="margin-top: 15px; text-align: center;">
            <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
        </p>
    </div>

</body>
</html>
