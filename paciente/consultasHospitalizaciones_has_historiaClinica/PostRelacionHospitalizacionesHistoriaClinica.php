<?php
$servername = "localhost";
$username = "root";
$password = "Roof";
$database = "mydb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$hospitalizacionesNoExpediente = $_POST['hospitalizacionesNoExpediente'];
$historiaClinicaNoExpediente = $_POST['historiaClinicaNoExpediente'];

$sql = "INSERT INTO hospitalizaciones_has_historiaClinica (hospitalizacionesNoExpediente, historiaClinicaNoExpediente) 
        VALUES ('$hospitalizacionesNoExpediente', '$historiaClinicaNoExpediente')";

if ($conn->query($sql) === TRUE) {
    echo "Relación entre Hospitalización y Historia Clínica guardada con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
