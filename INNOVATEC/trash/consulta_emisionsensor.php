<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener las emisiones detectadas por cada sensor
$sql = "SELECT sensors.nombre AS sensor_nombre, emissions.tipo_gas, emissions.cantidad, emissions.fecha_medicion
        FROM sensors
        JOIN emissions ON sensors.id = emissions.sensor_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Sensor: " . $row["sensor_nombre"] . " - Gas: " . $row["tipo_gas"] . " - Cantidad: " . $row["cantidad"] . " - Fecha: " . $row["fecha_medicion"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
