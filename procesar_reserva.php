<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reserva_online";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["reservar"])) {
        // Se ha enviado el formulario de reservas, procesa los datos aquí
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $n_personas = $_POST["n_personas"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $mensaje = $_POST["mensaje"];

        // Insertar datos en la tabla de reservaciones
        $sql = "INSERT INTO reservaciones (Nombre, Telefono, N_personas, Fecha, Hora, Mensaje) VALUES ('$nombre', '$telefono', '$n_personas', '$fecha', '$hora', '$mensaje')";

        if ($conn->query($sql) === TRUE) {
            $message = '<span style="color: green;"><i class="fas fa-check-circle"></i> Reserva realizada correctamente</span>';
            $formClass = "success"; // Clase CSS para el formulario exitoso

            // Redirige a la página "formulario.html" después de la reserva
            header("Location: formulario.html");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            $message = '<span style="color: red;"><i class="fas fa-times-circle"></i> Error: ' . $sql . '<br>' . $conn->error . '</span>';
            $formClass = "error"; // Clase CSS para el formulario con error
        }
    } elseif (isset($_POST["suscribir"])) {
        // Se ha enviado el formulario de suscripción a descuentos, procesa los datos aquí
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        // Insertar datos en la tabla de descuentos
        $sql = "INSERT INTO descuentos (Nombres, Apellidos, Telefono, Correo) VALUES ('$nombre', '$apellidos', '$telefono', '$correo')";

        if ($conn->query($sql) === TRUE) {
            $message = '<span style="color: green;"><i class="fas fa-check-circle"></i> Suscripción realizada correctamente</span>';
            $formClass = "success"; // Clase CSS para el formulario exitoso

            // Redirige a la página "descuentos.html" después de la suscripción
            header("Location: descuentos.html");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            $message = '<span style="color: red;"><i class="fas fa-times-circle"></i> Error: ' . $sql . '<br>' . $conn->error . '</span>';
            $formClass = "error"; // Clase CSS para el formulario con error
        }
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

