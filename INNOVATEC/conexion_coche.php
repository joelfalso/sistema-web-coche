<?php
// Datos para la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicleperformance";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos";

// Consulta simple para obtener los datos de la tabla 'usuarios'
$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - tipo_carburador: " . $row["tipo_carburador" ]. " - ajuste_mezcla: " . $row["ajuste_mezcla"]. "- tipo_combustible:  " . $row["tipo_combustible"]. "- vehiculo_id:  " . $row["vehiculo_id"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>