<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehiculo_id = $_POST['vehiculo_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicleperformance";

    // Crear la conexión
    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos del vehículo
    $sql = "SELECT * FROM vehicles WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $vehiculo_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $vehiculo = $resultado->fetch_assoc();

    if ($vehiculo) {
        // Redireccionar al formulario con los datos del vehículo
        header("Location: formulario.php?id=" . $vehiculo['id'] . "&modelo=" . urlencode($vehiculo['modelo']) . "&fabricante=" . urlencode($vehiculo['fabricante']) . "&año=" . $vehiculo['año'] . "&motor=" . urlencode($vehiculo['motor']) . "&cilindrada=" . $vehiculo['cilindrada'] . "&sistema_alimentacion=" . urlencode($vehiculo['sistema_alimentacion']));
        exit();
    } else {
        echo "Vehículo no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>
