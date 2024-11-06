<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicleperformance";

    // Crear la conexión
    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para eliminar el vehículo
    $sql = "DELETE FROM vehicles WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Vehículo eliminado correctamente.";
    } else {
        echo "Error al eliminar el vehículo: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Vehículo</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-image: url('e.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: #fff;
            display: flex; /* Añadido para usar flexbox */
            flex-direction: column; /* Coloca los elementos en columna */
            align-items: center; /* Centra horizontalmente */
            justify-content: center; /* Centra verticalmente */
        }

        #header {
            margin: auto;
            width: 500px;
            padding-top: 20px;
            text-align: center;
        }


        /* Estilos para el mensaje de bienvenida */
        h1 {
            text-align: center;
            padding: 50px;
            background-color: rgba(0, 0, 0, 0.6); /* Fondo semitransparente */
            border-radius: 10px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
        }
        form {
            display: flex;
            flex-direction: column; /* Coloca los elementos del formulario en columna */
            align-items: center; /* Centra los elementos del formulario horizontalmente */
            background-color: rgba(0, 0, 0, 0.6); /* Fondo semitransparente para el formulario */
            padding: 20px;
            border-radius: 10px;
            width: 40%;
       
        }
      
    </style>
</head>
<body>
    <h1>Vehículo Eliminado Correctamente </h1>
</body>
</html>