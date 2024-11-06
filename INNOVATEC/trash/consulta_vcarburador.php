<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener los carburadores y los vehículos que los usan
$sql = "SELECT carburadores.id AS carburador_id, carburadores.tipo_carburador, vehicles.modelo AS vehiculo_modelo
        FROM carburadores
        JOIN vehicles ON carburadores.vehiculo_id = vehicles.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Carburador ID: " . $row["carburador_id"] . " - Tipo: " . $row["tipo_carburador"] . " - Vehículo: " . $row["vehiculo_modelo"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
