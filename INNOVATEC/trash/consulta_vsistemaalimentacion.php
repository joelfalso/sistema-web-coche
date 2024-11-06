<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener los vehículos con su sistema de alimentación
$sql = "SELECT vehicles.id, vehicles.modelo, vehicles.fabricante, vehicles.sistema_alimentacion
        FROM vehicles";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Vehículo ID: " . $row["id"] . " - Modelo: " . $row["modelo"] . " - Sistema de Alimentación: " . $row["sistema_alimentacion"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
