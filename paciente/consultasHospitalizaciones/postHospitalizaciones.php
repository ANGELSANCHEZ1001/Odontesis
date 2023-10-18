<?php
$servername = "localhost";
$username = "root";
$password = "Roof";
$database = "mydb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$NoExpediente = $_POST['NoExpediente'];
$fechaHospitalizacion = $_POST['fechaHospitalizacion'];
$motivo = $_POST['motivo'];

$sql = "INSERT INTO hospitalizaciones (NoExpediente, fechaHospitalizacion, motivo) 
        VALUES ('$NoExpediente', '$fechaHospitalizacion', '$motivo')";

if ($conn->query($sql) === TRUE) {
    echo "Datos de hospitalización guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
