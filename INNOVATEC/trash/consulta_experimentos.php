<?php
// Consulta experiments.php
require_once 'conexionV.php';

// Consulta simple para obtener los datos de la tabla 'experiments'
$sql = "SELECT * FROM experiments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Vehículo ID: " . $row["vehicle_id"] . " - ECU ID: " . $row["ecu_id"] . 
        " - Nombre del Experimento: " . $row["nombre_experimento"] . " - Descripción: " . $row["descripcion"] . 
        " - Relación Aire/Combustible: " . $row["relacion_aire_combustible"] . " - Carga: " . $row["carga"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>
