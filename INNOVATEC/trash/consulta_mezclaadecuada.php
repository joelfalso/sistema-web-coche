<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener experimentos con una relación aire/combustible específica
$sql = "SELECT * FROM experiments WHERE relacion_aire_combustible = 14.70"; // Cambia 14.70 por otro valor si lo deseas

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Experimento ID: " . $row["id"] . " - Nombre: " . $row["nombre_experimento"] . " - Relación Aire/Combustible: " . $row["relacion_aire_combustible"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
