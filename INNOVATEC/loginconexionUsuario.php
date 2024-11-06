<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inovatec";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos del formulario están definidos y no están vacíos
if (!isset($_POST['EmailUsuario']) || !isset($_POST['Contrasenausuario']) || empty($_POST['EmailUsuario']) || empty($_POST['Contrasenausuario'])) {
    http_response_code(400); // Código de respuesta de error de cliente
    die("Error: Los campos de email y contraseña son obligatorios.");
}

// Obtener y sanitizar datos del formulario
$email = filter_var($_POST['EmailUsuario'], FILTER_SANITIZE_EMAIL);
$pass = password_hash($_POST['Contrasenausuario'],PASSWORD_DEFAULT);

// Consulta para verificar el usuario
$sql = "SELECT Contrasenausuario FROM usuariosinnovatec WHERE EmailUsuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Verificar si el usuario existe
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verificar que la contraseña y el hash estén definidos y no estén vacíos
    if (password_verify($pass, $hashed_password)) {
        echo 'La contraseña es válida!';
    } else {
        echo 'La contraseña no es válida.';
    }
} else {
    http_response_code(404); // Código de respuesta de recurso no encontrado
    echo "Usuario no encontrado";
    exit();
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
