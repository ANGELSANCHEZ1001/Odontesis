<?php
// Verificar si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (debes configurar esto con tus propios datos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mydb";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Recuperar los datos del formulario
    $noExpediente = $_POST["noExpediente"];
    $fecha = $_POST["fecha"];
    $folio = $_POST["folio"];
    $idUsuarioCreador = $_POST["idUsuarioCreador"];

    // Preparar la consulta SQL para insertar los datos en la tabla historiaClinica
    $sql = "INSERT INTO historiaClinica (noExpediente, fecha, folio, idUsuarioCreador) 
            VALUES ($noExpediente, '$fecha', $folio, $idUsuarioCreador)";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibió una solicitud POST, muestra un mensaje de error
    echo "Acceso denegado.";
}
?>
