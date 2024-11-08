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
        label{
            margin-bottom: 1%;
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
    <h1>Eliminar Vehículo</h1>

    <form method="POST" action="borrar_vehiculo.php">
        <label for="id">ID del Vehículo:</label>
        <input type="number" id="id" name="id" required>
        <input type="submit" value="Eliminar Vehículo">
    </form>
</body>
</html>
