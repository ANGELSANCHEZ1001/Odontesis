<?php
// Conexión a la base de datos (ajusta las credenciales según tu entorno)
$servername = "localhost";
$username = "root";
$password = "Roof";
$database = "mydb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$noExpediente = $_POST['noExpediente'];
$peso = $_POST['peso'];
$talla = $_POST['talla'];
$presionArterial = $_POST['presionArterial'];
$frecuenciaCardiaca = $_POST['frecuenciaCardiaca'];
$temperatura = $_POST['temperatura'];
$frecuenciaRespiratoria = $_POST['frecuenciaRespiratoria'];

// cammbier lo de exporacionfisica
$sql = "INSERT INTO exporacionfisica (noExpediente, peso, talla, presionArterial, frecuenciaCardiaca, temperatura, frecuenciaRespiratoria) 
        VALUES ('$noExpediente', '$peso', '$talla', '$presionArterial', '$frecuenciaCardiaca', '$temperatura', '$frecuenciaRespiratoria')";

if ($conn->query($sql) === TRUE) {
    echo "Datos de exploración física guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


