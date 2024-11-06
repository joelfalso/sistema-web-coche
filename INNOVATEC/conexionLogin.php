<?php
// Datos para la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inovatec";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos";

// Obtener y sanitizar datos del formulario
$nombre = $_POST['nombreUsuario'];
$apellido = $_POST['ApellidoUsuario'];
$email = filter_var($_POST['EmailUsuario'], FILTER_SANITIZE_EMAIL);
$pass = password_hash($_POST['Contrasenausuario'], PASSWORD_DEFAULT); // Hashear contraseña

// Prepare la consulta SQL
$sql = "INSERT INTO usuariosinnovatec (nombreUsuario, ApellidoUsuario, EmailUsuario, Contrasenausuario) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters
    $stmt->bind_param("ssss", $nombre, $apellido, $email, $pass);
    
    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}


// Consulta simple para obtener los datos de la tabla 'usuarios'
$sql = "SELECT * FROM usuariosinnovatec";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "nombreUsuario: " . $row["nombreUsuario"]. " - ApellidoUsuario: " . $row["ApellidoUsuario" ]. " - EmailUsuario: " . $row["EmailUsuario"]. "- Contrasenausuario:  " . $row["Contrasenausuario"].  "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>