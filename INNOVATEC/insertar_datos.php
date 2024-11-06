<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicleperformance";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);  //mysqli permite la conexión y ejecución de consultas en una base de datos MySQL

// Verificar la conexión
if ($conn->connect_error) { 
    die("Conexión fallida: " . $conn->connect_error); //
}

// Obtener los datos del formulario
$id = $_POST['id'];
$tipo_carburador = $_POST['tipo_carburador'];
$ajuste_mezcla = $_POST['ajuste_mezcla'];
$tipo_combustible = $_POST['tipo_combustible'];
$vehiculo_id = $_POST['vehiculo_id'];


// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO carburadores (id, tipo_carburador, ajuste_mezcla, tipo_combustible, vehiculo_id) 
        VALUES ('$id','$tipo_carburador', '$ajuste_mezcla', '$tipo_combustible', '$vehiculo_id')";

// Ejecutar la consulta e insertar los datos
if ($conn->query($sql) === TRUE) {
    echo "nuevo carburador registrado con exito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
