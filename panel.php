<?php
session_start();
require_once 'conexion.php';

//Control de Acceso: Verificar sesión activa y rol de administrador
if (!isset($_SESSION['usuario']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT id, usuario, edad, rol FROM usuarios ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - MiWeb</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>


    <?php include 'header.php'; ?>

    <main class="container-admin">
        <h2>Panel de Administración</h2>
        <p style="text-align: center; color: #718096;">
            Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>. Gestión del sistema.
        </p>

        <h3 style="margin-top: 25px; color: #2c3e50;">Usuarios Registrados</h3>

        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Edad</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while ($row = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                            <td><?php echo $row['edad']; ?></td>
                            <td>
                                <?php if ($row['rol'] === 'admin'): ?>
                                    <span class="badge-admin">Administrador</span>
                                <?php else: ?>
                                    <span class="badge-cliente">Cliente</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

</body>
</html>