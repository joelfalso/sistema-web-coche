<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $año = $_POST['año'];
    $motor = $_POST['motor'];
    $cilindrada = $_POST['cilindrada'];
    $sistema_alimentacion = $_POST['sistema_alimentacion'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicleperformance";

    // Crear la conexión
    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Actualizar los datos del vehículo
    $sql = "UPDATE vehicles SET modelo = ?, fabricante = ?, año = ?, motor = ?, cilindrada = ?, sistema_alimentacion = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssiissi", $modelo, $fabricante, $año, $motor, $cilindrada, $sistema_alimentacion, $id);

    if ($stmt->execute()) {
        echo "Vehículo actualizado correctamente.";
    } else {
        echo "Error al actualizar el vehículo.";
    }

    $stmt->close();
    $conexion->close();
}
?>
