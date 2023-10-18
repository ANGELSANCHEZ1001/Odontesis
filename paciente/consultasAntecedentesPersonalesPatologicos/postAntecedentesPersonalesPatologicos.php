<?php
$servername = "localhost";
$username = "root";
$password = "Roof";
$database = "mydb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$noExpediente = $_POST['noExpediente'];
$sida = $_POST['sida'];
$diabetes = $_POST['diabetes'];
$prediabetes = $_POST['prediabetes'];
$carebrovasculares = $_POST['carebrovasculares'];
$hepatitis = $_POST['hepatitis'];
$osteoartritis = $_POST['osteoartritis'];
$osteorporosis = $_POST['osteorporosis'];
$herpes = $_POST['herpes'];
$cardiopatias = $_POST['cardiopatias'];
$cancer = $_POST['cancer'];

$sql = "INSERT INTO antecedentesPersonalesPatologicos (noExpediente, sida, diabetes, prediabetes, carebrovasculares, hepatitis, osteoartritis, osteorporosis, herpes, cardiopatias, cancer) 
        VALUES ('$noExpediente', '$sida', '$diabetes', '$prediabetes', '$carebrovasculares', '$hepatitis', '$osteoartritis', '$osteorporosis', '$herpes', '$cardiopatias', '$cancer')";

if ($conn->query($sql) === TRUE) {
    echo "Antecedentes personales patológicos guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
