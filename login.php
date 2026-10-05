<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usr = $_POST['usuario'];
    $pwd = $_POST['password'];

    $res = $conexion->query("SELECT * FROM usuarios WHERE usuario='$usr'");


    // Registro
    if ($row = $res->fetch_assoc()) {
        if (password_verify($pwd, $row['password'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol']     = $row['rol'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Iniciar Sesión</h2>

        <?php if (isset($error)): ?>
            <div class="msg-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Usuario:</label>
            <input type="text" name="usuario" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>

        <p style="margin-top: 15px; text-align: center;">
            <a href="registro.php">¿No tienes cuenta? Regístrate</a>
        </p>
    </div>

</body>
</html>
