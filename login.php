<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar los valores del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar las credenciales de inicio de sesión
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = $conn->query($sql);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($resultado->num_rows > 0) {
  // Inicio de sesión exitoso, redirigir al usuario a la página de inicio
  header("Location: main/usuario.html");
} else {
  // Credenciales de inicio de sesión inválidas, mostrar un mensaje de error
  echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>