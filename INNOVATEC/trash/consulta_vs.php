<?php
// Consulta vehiculos_y_sensores.php
require_once 'conexionV.php';

// Consulta para obtener los datos de 'vehicles' y 'sensors' a través de 'ecus'
$sql = "SELECT vehicles.id AS vehiculo_id, vehicles.modelo, vehicles.fabricante, vehicles.año, 
               sensors.id AS sensor_id, sensors.nombre AS sensor_nombre, sensors.tipo
        FROM vehicles
        JOIN ecus ON vehicles.id = ecus.vehiculo_id
        JOIN sensors ON ecus.id = sensors.ecu_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "Vehículo ID: " . $row["vehiculo_id"] . " - Modelo: " . $row["modelo"] . " - Fabricante: " . $row["fabricante"] . 
        " - Año: " . $row["año"] . " - Sensor ID: " . $row["sensor_id"] . " - Nombre del Sensor: " . $row["sensor_nombre"] . 
        " - Tipo de Sensor: " . $row["tipo"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>
