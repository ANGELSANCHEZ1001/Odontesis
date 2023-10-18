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
$diabetes = $_POST['diabetes'];
$fibrosisQuistica = $_POST['fibrosisQuistica'];
$anemiaFalciforme = $_POST['anemiaFalciforme'];
$cancer = $_POST['cancer'];
$hemofilia = $_POST['hemofilia'];
$hipertencion = $_POST['hipertencion'];
$hipercolesterolemia = $_POST['hipercolesterolemia'];

$sql = "INSERT INTO antecedentesHeredoFamiliares (noExpediente, diabetes, fibrosisQuistica, anemiaFalciforme, cancer, hemofilia, hipertencion, hipercolesterolemia) 
        VALUES ('$noExpediente', '$diabetes', '$fibrosisQuistica', '$anemiaFalciforme', '$cancer', '$hemofilia', '$hipertencion', '$hipercolesterolemia')";

if ($conn->query($sql) === TRUE) {
    echo "Antecedentes heredo-familiares guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
