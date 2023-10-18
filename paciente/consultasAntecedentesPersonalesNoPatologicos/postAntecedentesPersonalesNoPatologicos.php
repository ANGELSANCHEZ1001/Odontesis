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
$antecedentesPersonalesNoPatologicoscol1 = $_POST['antecedentesPersonalesNoPatologicoscol1'];
$adiccionTabaco = $_POST['adiccionTabaco'];
$adiccionAlcohol = $_POST['adiccionAlcohol'];
$alergias = $_POST['alergias'];
$alergiasCuales = $_POST['alergiasCuales'];
$antecedentesPersonalesNoPatologicoscol = $_POST['antecedentesPersonalesNoPatologicoscol'];
$primeraMestruacion = $_POST['primeraMestruacion'];
$embarazo = $_POST['embarazo'];
$mesesEmbarazo = $_POST['mesesEmbarazo'];

$sql = "INSERT INTO antecedentesPersonalesNoPatologicos (NoExpediente, antecedentesPersonalesNoPatologicoscol1, adiccionTabaco, adiccionAlcohol, alergias, alergiasCuales, antecedentesPersonalesNoPatologicoscol, primeraMestruacion, embarazo, mesesEmbarazo) 
        VALUES ('$NoExpediente', '$antecedentesPersonalesNoPatologicoscol1', '$adiccionTabaco', '$adiccionAlcohol', '$alergias', '$alergiasCuales', '$antecedentesPersonalesNoPatologicoscol', '$primeraMestruacion', '$embarazo', '$mesesEmbarazo')";

if ($conn->query($sql) === TRUE) {
    echo "Antecedentes personales no patológicos guardados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
