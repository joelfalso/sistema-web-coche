<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener vehículos que utilizan un sistema específico de alimentación
$sql = "SELECT * FROM vehicles WHERE sistema_alimentacion = 'fuel_injection'"; // Cambia 'fuel_injection' por 'carburador'

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
