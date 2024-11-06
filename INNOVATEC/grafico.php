<?php
include 'conexionV.php'; // Incluir el archivo de conexión

// Consulta para obtener datos de la tabla 'experiments'
$sql = "SELECT relacion_aire_combustible, carga FROM experiments"; 
$result = $conn->query($sql);

$relaciones = [];
$cargas = [];

// Verifica si se obtuvieron resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $relaciones[] = $row['relacion_aire_combustible'];
        $cargas[] = $row['carga'];
    }
} else {
    echo "No se encontraron resultados."; // Mensaje si no hay resultados
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Mezcla Aire-Combustible</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Gráfico de Mezcla Aire-Combustible</h1>
    
    <!-- Canvas para el gráfico -->
    <canvas id="miGrafico" width="400" height="200"></canvas>

    <script>
        // Verifica si las variables tienen datos
        const relaciones = <?php echo json_encode($relaciones); ?>;
        const cargas = <?php echo json_encode($cargas); ?>;

        // Imprimir datos en la consola para verificar
        console.log('Relaciones:', relaciones);
        console.log('Cargas:', cargas);

        // Crea los datos para el gráfico
        const datosGrafico = cargas.map((carga, index) => ({
            x: carga,
            y: relaciones[index]
        }));

        // Inicializa el gráfico
        const ctx = document.getElementById('miGrafico').getContext('2d');
        const miGrafico = new Chart(ctx, {
            type: 'bar', // Cambiar 'scatter' a 'line' o 'bar' para probar
            data: {
                datasets: [{
                    label: 'Relación Aire-Combustible',
                    data: datosGrafico,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Carga (%)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Relación Aire-Combustible'
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    annotation: {
                        annotations: {
                            line1: {
                                type: 'line',
                                yMin: 14.7,
                                yMax: 14.7,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 2,
                                label: {
                                    content: 'Mezcla ideal (14.7)',
                                    enabled: true,
                                    position: 'end'
                                }
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                let rel = tooltipItem.raw.y;
                                let msg = '';
                                if (rel > 14.7) {
                                    msg = 'Mezcla pobre (exceso de aire)';
                                } else if (rel < 14.7) {
                                    msg = 'Mezcla rica (exceso de combustible)';
                                } else {
                                    msg = 'Mezcla ideal (14.7)';
                                }
                                return `Relación Aire-Combustible: ${rel} - ${msg}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
