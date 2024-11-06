<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener las emisiones en un rango de fechas
$sql = "SELECT * FROM emissions WHERE fecha_medicion BETWEEN '2024-09-01' AND '2024-09-30'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Emisión ID: " . $row["id"] . " - Gas: " . $row["tipo_gas"] . " - Cantidad: " . $row["cantidad"] . " - Fecha: " . $row["fecha_medicion"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
