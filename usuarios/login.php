<!DOCTYPE html>
<html lang="en">
<head>
<?php

session_start();
$error_message = '';

if (isset($_SESSION['correo'])) {
  header('Location: welcome.html');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require "funciones/conecta.php";
  $con = conecta();

  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

  $query = "SELECT * FROM empleados WHERE Correo='$correo' AND Pass='$contrasena'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['correo'] = $correo;
    header('Location: welcome.html');
    exit;
  } else {
    $error_message = 'Correo o contraseña incorrectos';
  }
}
?>  




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>Login</title>
</head>
<body>
    <form class="form" method="POST">
        <h2 class="form_title">Inicia sesión</h2>
        
        <div class="form_containers">
            <div class="form_group">
                <input type="text" id="correo" name="correo" class="form_input" placeholder="Correo" required>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="password" id="contrasena" name="contrasena" class="form_input" placeholder="Contraseña" required>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <button class="form_submit">Entrar</button>
            </div>
            <div class="form_group" id="erroAutenti">
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
</div>

        </div>

        
    </form>
    
    <script>
    function submitForm() {
        var correo = document.getElementById('correo').value;
        var contrasena = document.getElementById('contrasena').value;

        if (correo === '' || contrasena === '') {
            alert('Por favor, complete todos los campos.');
            return;
        }
        document.forms[0].submit();
    }
    </script>
</body>
</html>