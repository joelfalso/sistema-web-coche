<?php
// Conexión a la base de datos
require_once 'conexionV.php';

// Función para ejecutar y mostrar los resultados de las consultas
function ejecutarConsulta($sql) {
    global $conn;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>"; // Abre la tabla
        echo "<tr>"; // Comienza la fila de encabezados

        // Mostrar los encabezados
        while ($field_info = $result->fetch_field()) {
            echo "<th>" . ucfirst($field_info->name) . "</th>"; // Crea celdas de encabezado
        }
        echo "</tr>"; // Cierra la fila de encabezados

        // Mostrar los datos
        while ($row = $result->fetch_assoc()) {
            echo "<tr>"; // Comienza una nueva fila
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>"; // Crea celdas para los datos
            }
            echo "</tr>"; // Cierra la fila
        }

        echo "</table>"; // Cierra la tabla
    } else {
        echo "0 resultados";
    }
}

// Seleccionar la consulta en función del parámetro 'consulta' de la URL
if (isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];

    switch ($consulta) {
        case 'emisiones_fecha':
            $sql = "SELECT * FROM emissions WHERE fecha_medicion BETWEEN '2024-09-01' AND '2024-09-30'";
            ejecutarConsulta($sql);
            break;

        case 'emisiones_sensor':
            $sql = "SELECT sensors.nombre AS sensor_nombre, emissions.tipo_gas, emissions.cantidad, emissions.fecha_medicion
                    FROM sensors
                    JOIN emissions ON sensors.id = emissions.sensor_id";
            ejecutarConsulta($sql);
            break;

        case 'experimentos_vehiculos':
            $sql = "SELECT vehicles.id AS vehiculo_id, vehicles.modelo, experiments.nombre_experimento, experiments.descripcion
                    FROM vehicles
                    JOIN experiments ON vehicles.id = experiments.vehicle_id";
            ejecutarConsulta($sql);
            break;

        case 'experiments':
            $sql = "SELECT * FROM experiments";
            ejecutarConsulta($sql);
            break;

        case 'experimentos_relacion':
            $sql = "SELECT * FROM experiments WHERE relacion_aire_combustible = 14.70";
            ejecutarConsulta($sql);
            break;

        case 'sensors':
            $sql = "SELECT * FROM sensors";
            ejecutarConsulta($sql);
            break;

        case 'sensores_tipo':
            $sql = "SELECT * FROM sensors WHERE tipo = 'emisiones'";
            ejecutarConsulta($sql);
            break;

        case 'carburadores_vehiculos':
            $sql = "SELECT carburadores.id AS carburador_id, carburadores.tipo_carburador, vehicles.modelo AS vehiculo_modelo
                    FROM carburadores
                    JOIN vehicles ON carburadores.vehiculo_id = vehicles.id";
            ejecutarConsulta($sql);
            break;

        case 'vehiculos_ecus_sensores':
            $sql = "SELECT vehicles.id AS vehiculo_id, vehicles.modelo, vehicles.fabricante, vehicles.año,
                           ecus.id AS ecu_id, ecus.nombre AS ecu_nombre, sensors.id AS sensor_id, sensors.nombre AS sensor_nombre
                    FROM vehicles
                    LEFT JOIN ecus ON vehicles.id = ecus.vehiculo_id
                    LEFT JOIN sensors ON ecus.id = sensors.ecu_id";
            ejecutarConsulta($sql);
            break;

        case 'vehiculos':
            $sql = "SELECT * FROM vehicles";
            ejecutarConsulta($sql);
            break;

        case 'vehiculos_sensores':
            $sql = "SELECT vehicles.id AS vehiculo_id, vehicles.modelo, vehicles.fabricante, vehicles.año, 
                           sensors.id AS sensor_id, sensors.nombre AS sensor_nombre, sensors.tipo
                    FROM vehicles
                    JOIN ecus ON vehicles.id = ecus.vehiculo_id
                    JOIN sensors ON ecus.id = sensors.ecu_id";
            ejecutarConsulta($sql);
            break;

        case 'vehiculos_alimentacion':
            $sql = "SELECT vehicles.id, vehicles.modelo, vehicles.fabricante, vehicles.sistema_alimentacion
                    FROM vehicles";
            ejecutarConsulta($sql);
            break;

        case 'vehiculos_sistema':
            $sql = "SELECT * FROM vehicles WHERE sistema_alimentacion = 'fuel_injection'";
            ejecutarConsulta($sql);
            break;

        default:
            echo "Consulta no válida.";
    }
} else {
    echo "Seleccione una consulta en el menú.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-image: url('car.jpg');
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
        
       
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            overflow: hidden; /* Para bordes redondeados */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #cc42ee;
            color: white;
        }

        tr:hover {
            background-color: rgba(200, 255, 255, 0.5);
        }
    </style>
</head>
<body><form>
    <h1>Consulta</h1>
</form>
</body>
</html>
