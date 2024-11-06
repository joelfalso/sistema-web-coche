<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Consulta para obtener los sensores por tipo
$sql = "SELECT * FROM sensors WHERE tipo = 'emisiones'"; // Cambia 'emisiones' por 'temperatura' o 'flujo de aire'

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Sensor ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Tipo: " . $row["tipo"] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
