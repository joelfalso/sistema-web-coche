<?php
// Consulta sensors.php
require_once 'conexionV.php';

// Consulta simple para obtener los datos de la tabla 'sensors'
$sql = "SELECT * FROM sensors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre del Sensor: " . $row["nombre"] . 
        " - Tipo: " . $row["tipo"] . " - ECU ID: " . $row["ecu_id"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>
