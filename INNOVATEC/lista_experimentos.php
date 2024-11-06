<?php
include 'conexionV.php'; // Incluir el archivo de conexión

// Consulta para obtener todos los experimentos
$sql = "SELECT e.id, e.nombre_experimento, e.descripcion, e.relacion_aire_combustible, e.carga, v.fabricante, v.modelo 
        FROM experiments e 
        JOIN vehicles v ON e.vehicle_id = v.id"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Experimentos</title>
    <link rel="stylesheet" href="css/estilos.css"> <!-- Estilos CSS -->
</head>
<body>
    <h1>Lista de Experimentos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Experimento</th>
                <th>Descripción</th>
                <th>Relación Aire-Combustible</th>
                <th>Carga</th>
                <th>Vehículo</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre_experimento']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['relacion_aire_combustible']; ?></td>
                        <td><?php echo $row['carga']; ?></td>
                        <td><?php echo $row['fabricante'] . ' ' . $row['modelo']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay experimentos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="grafico.php">Ver Gráfico</a> <!-- Enlace para ver el gráfico -->
</body>
</html>
