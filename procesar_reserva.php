<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en otro lugar
$username = "root"; // Cambia el nombre de usuario si es diferente
$password = ""; // Cambia la contraseña si es diferente
$dbname = "reserva_online";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar datos del formulario
if (isset($_POST["reservar"])) {
    // El formulario ha sido enviado, procesa los datos aquí
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $n_personas = $_POST["n_personas"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $mensaje = $_POST["mensaje"];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Procesar el formulario solo si se ha enviado por POST

    // Insertar datos en la tabla de reservaciones
    $sql = "INSERT INTO reservaciones (Nombre, Telefono, N_personas, Fecha, Hora, Mensaje) VALUES ('$nombre', '$telefono', '$n_personas', '$fecha', '$hora', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        $message = '<span style="color: green;"><i class="fas fa-check-circle"></i> Reserva realizada correctamente</span>';
        $formClass = "success"; // Clase CSS para el formulario exitoso
    } else {
        $message = '<span style="color: red;"><i class="fas fa-times-circle"></i> Error: ' . $sql . '<br>' . $conn->error . '</span>';
        $formClass = "error"; // Clase CSS para el formulario con error
    }
}
}
// Cerrar la conexión a la base de datos
$conn->close();
?>


<?php include("./formulario.html"); ?>


