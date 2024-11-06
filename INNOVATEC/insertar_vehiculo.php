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
//$id = $_POST['id'];
$modelo = $_POST['modelo'];
$fabricante = $_POST['fabricante'];
$año = $_POST['año'];
$motor = $_POST['motor'];
$cilindrada = $_POST['cilindrada'];
$sistema_alimentacion = $_POST['sistema_alimentacion'];



// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO vehicles ( modelo, fabricante, año, motor, cilindrada, sistema_alimentacion) 
        VALUES ('$modelo', '$fabricante', '$año', '$motor', '$cilindrada', '$sistema_alimentacion')";

// Ejecutar la consulta e insertar los datos
if ($conn->query($sql) === TRUE) {
    echo "nuevo vehiculo registrado con exito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
