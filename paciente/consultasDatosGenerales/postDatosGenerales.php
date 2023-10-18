<?php
// Conexión a la base de datos (ajusta las credenciales según tu entorno)
$servername = "localhost";
$username = "root";
$password = "Roof";
$database = "mydb";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$noExpediente = $_POST['noExpediente'];
$nombre = $_POST['nombre'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$lugarNacimiento = $_POST['lugarNacimiento'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$domicilioCalle = $_POST['domicilioCalle'];
$domicilioMunicipio = $_POST['domicilioMunicipio'];
$noDomicilio = $_POST['noDomicilio'];
$domicilioColonia = $_POST['domicilioColonia'];
$domicilioEstado = $_POST['domicilioEstado'];
$datosGeneralescol = $_POST['datosGeneralescol'];
$celular = $_POST['celular'];
$ocupacion = $_POST['ocupacion'];
$fechaUltimacitadental = $_POST['fechaUltimacitadental'];
$motivoConsulta = $_POST['motivoConsulta'];

// Consulta SQL para insertar los datos en la tabla datosGenerales
$sql = "INSERT INTO datosGenerales (noExpediente, nombre, fechaNacimiento, lugarNacimiento, edad, sexo, domicilioCalle, domicilioMunicipio, noDomicilio, domicilioColonia, domicilioEstado, datosGeneralescol, celular, ocupacion, fechaUltimacitadental, motivoConsulta) 
        VALUES ('$noExpediente', '$nombre', '$fechaNacimiento', '$lugarNacimiento', '$edad', '$sexo', '$domicilioCalle', '$domicilioMunicipio', '$noDomicilio', '$domicilioColonia', '$domicilioEstado', '$datosGeneralescol', '$celular', '$ocupacion', '$fechaUltimacitadental', '$motivoConsulta')";

if ($conn->query($sql) === TRUE) {
    echo "Datos generales guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
