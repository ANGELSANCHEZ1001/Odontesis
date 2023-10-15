<?php
session_start();
error_reporting(0);

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_registroPaciente.css">
    <title>Nuevo Paciente</title>
</head>
<body>
    <div class="navbar">
        <a href="welcome.php">Inicio</a>
        <a href="../paciente/registroPaciente.php">Pacientes</a>
        <a href="usuarios.php">Usuarios</a>
        <a href="logout.php" class="cerrarsesion">Cerrar Sesión</a>
        
    </div>
    
    <form class="form">
        <h2 class="form_title">Nuevo Usuario</h2><br>
        <div class="form_containers">
            <div class="form_group">
                    <input type="text" id="name" class="form_input" placeholder="Nombre "><br><br>
                    <input type="text" id="name" class="form_input" placeholder="Apellido paterno "><br><br>
                    <input type="text" id="name" class="form_input" placeholder="Apellido materno "><br><br>
                    <input type="text" id="name" class="form_input" placeholder="Correo "><br><br> 
                    <input type="password" id="pass" class="form_input" placeholder="pass "><br><br><br><br> 
                    <label class="form_label">Fecha de nacimiento</label> <br>
                    <input type="date" id="name" class="form_input" placeholder="Fecha de nacimiento "><br><br> <br>
                    
                    <label class="form_label">Rol</label> <br>
                    <select name="" id="" class="form_input">
                        <option value="1">Administrador</option>
                        <option value="2">Maestro</option>
                        <option value="3">Estudiante</option>
                        
                    </select><br><br>
                    
            </div>
            <br>
            <br>    
            <div class="form_group">
                <button class="form_submit" onclick="" >Finalizar</button>
            </div>
        </div>
    </form>
    <script src="login.js"></script>
</body>
</html>
