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

$nombreArchivo = $_FILES['archivo']['name'];
$nombreArchivoReal = $_FILES['archivo']['name'];
$fechaCreacion = date("Y-m-d"); // Obtiene la fecha actual

// Ruta donde se almacenarán los archivos
$directorio = "archivos/";

if (!file_exists($directorio)) {
    mkdir($directorio, 0755, true);
}

$rutaCompleta = $directorio . $nombreArchivo;

if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
    $sql = "INSERT INTO archivos (nombreArchivo, nombreArchivoReal, fechaCreacion, noExpediente) 
            VALUES ('$nombreArchivo', '$nombreArchivoReal', '$fechaCreacion', '$noExpediente')";

    if ($conn->query($sql) === TRUE) {
        echo "Archivo subido y registrado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error al subir el archivo.";
}

$conn->close();
?>
