<?php
session_start();
error_reporting(0);
/*
if (!isset($_SESSION['correo'])) {
  header('Location: login.php');
  exit;
}

$correo = $_SESSION['correo'];
$contrasena = $_SESSION['contrasena'];

$pos = strpos($correo, '@');
if ($pos !== false) {
  $nomb = substr($correo, 0, $pos);
  $_SESSION['nomb'] = $nomb;
} else {
  $nomb = $correo;
}*/
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bienvenido</title>
  <link rel="stylesheet" href="../estilos/style_registroPaciente.css">
  <script src="jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="navbar">
        <a href="welcome.php">Inicio</a>
        <a href="../paciente/registroPaciente.php">Pacientes</a>
        <a href="usuarios.php">Usuarios</a>
        <a href="logout.php" class="cerrarsesion">Cerrar Sesión</a>
        
  </div>
  <div class="form" style="text-align: center;">
    <h1 class="form_title"><br>Bienvenido, <?php echo $nomb; ?>!</h1>
  </div>
</body>
</html>
