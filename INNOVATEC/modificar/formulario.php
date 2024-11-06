<?php
$id = $_GET['id'] ?? null;
if ($id) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicleperformance";

    // Crear la conexión
    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del vehículo
    $sql = "SELECT * FROM vehicles WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
    } else {
        echo "No se encontró el vehículo.";
        exit();
    }
} else {
    echo "ID no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Vehículo</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-image: url('c.jpg');
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
            width: 25%;
       
        }
     
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px; /* Espacio entre los inputs */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            width: 100%; /* Hacer que el input ocupe todo el ancho disponible */
            max-width: 200px; /* Ancho máximo del input */
        }

        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px; /* Espacio entre los inputs */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            width: 100%; /* Hacer que el input ocupe todo el ancho disponible */
            max-width: 200px; /* Ancho máximo del input */
        }

        input[type="submit"] {
            background-color: #cc42ee; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            cursor: pointer; /* Cambia el cursor al pasar por encima */
        }

        input[type="submit"]:hover {
            background-color: #8e05b1; /* Cambia el color al pasar el cursor */
        }
    </style>
</head>
<body>
    <h1>Modificar Vehículo</h1>
    <form action="actualizar_vehiculo.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
        Modelo: <input type="text" name="modelo" value="<?php echo htmlspecialchars($fila['modelo']); ?>" required><br>
        Fabricante: <input type="text" name="fabricante" value="<?php echo htmlspecialchars($fila['fabricante']); ?>" required><br>
        Año: <input type="number" name="año" value="<?php echo htmlspecialchars($fila['año']); ?>" required><br>
        Motor: <input type="text" name="motor" value="<?php echo htmlspecialchars($fila['motor']); ?>" required><br>
        Cilindrada: <input type="text" name="cilindrada" value="<?php echo htmlspecialchars($fila['cilindrada']); ?>" required><br>
        Sistema de Alimentación: <input type="text" name="sistema_alimentacion" value="<?php echo htmlspecialchars($fila['sistema_alimentacion']); ?>" required><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
