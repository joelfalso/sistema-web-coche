<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener los vehículos con sus ECU y Sensores
$sql = "SELECT vehicles.id AS vehiculo_id, vehicles.modelo, vehicles.fabricante, vehicles.año,
               ecus.id AS ecu_id, ecus.nombre AS ecu_nombre, sensors.id AS sensor_id, sensors.nombre AS sensor_nombre
        FROM vehicles
        LEFT JOIN ecus ON vehicles.id = ecus.vehiculo_id
        LEFT JOIN sensors ON ecus.id = sensors.ecu_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Vehículo ID: " . $row["vehiculo_id"] . " - Modelo: " . $row["modelo"] . " - ECU: " . $row["ecu_nombre"] . " - Sensor: " . $row["sensor_nombre"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
