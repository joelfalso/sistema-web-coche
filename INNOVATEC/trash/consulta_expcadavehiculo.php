<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener los experimentos realizados en cada vehículo
$sql = "SELECT vehicles.id AS vehiculo_id, vehicles.modelo, experiments.nombre_experimento, experiments.descripcion
        FROM vehicles
        JOIN experiments ON vehicles.id = experiments.vehicle_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Vehículo ID: " . $row["vehiculo_id"] . " - Modelo: " . $row["modelo"] . " - Experimento: " . $row["nombre_experimento"] . " - Descripción: " . $row["descripcion"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
