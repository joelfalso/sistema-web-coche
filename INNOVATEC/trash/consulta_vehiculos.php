<?php
// Consulta vehiculos.php
require_once 'conexionV.php';

// Consulta simple para obtener los datos de la tabla 'vehicles'
$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Modelo: " . $row["modelo"] . " - Fabricante: " . $row["fabricante"] . 
        " - Año: " . $row["año"] . " - Motor: " . $row["motor"] . " - Cilindrada: " . $row["cilindrada"] . 
        " - Sistema de Alimentación: " . $row["sistema_alimentacion"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>
