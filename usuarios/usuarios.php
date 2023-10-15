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

<html>
    <head><script src="jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="style_registroPaciente.css">
        <script>
            function elim( id){
                yes = confirm("Estas seguro que quieres eliminar el registro con id " +id+" ?");


                if(yes==true){
                    $.ajax({
                        url:    'Banners_elimina.php',
                        type:  'post',
                        dataType: 'text',
                        data:   'id='+id,
                        success: function(res){
                            if(res==1){
                                location.reload();
                                }
                                
                                else{
                                    $('#mensaje').html('No se pudo eliminar correctamente');
                                setTimeout("$('#mensaje').html(' ')",5000);
                            }
                            //setTimeout("$('#mensaje').html('')",5000);
                        },error:function(){
                            $('#mensaje').html('Archivo no enocntrado');
                                setTimeout("$('#mensaje').html(' ')",5000);
                        }
                    });
                }
            }

        </script>
        
    </head>
    <body>
    <div class="navbar">
        <a href="welcome.php">Inicio</a>
        <a href="../paciente/registroPaciente.php">Pacientes</a>
        <a href="usuarios.php">Usuarios</a>
        <a href="logout.php" class="cerrarsesion">Cerrar Sesión</a>
        
    </div>
    
          
  </div>
       <table class="tabla">
           <tr>
            <th colspan="5" class="titulomuestralist"> <p>Usuarios</p> </th>
           </tr>
            <tr>
                <td id="ttlt" class="col1">ID</td>
                <td id="ttlt" class="col2">Nombre</td>
                <td id="ttlt" class="col1">Correo</td>
                <td id="ttlt" class="col2">Rol</td>
                <td id="ttlt" class="col7">    </td>
            </tr>
            <br>
            <?php
           require "funciones/conecta.php";
           $con= conecta();        
           $sql= "SELECT*FROM usuarios";
           $res= $con->query($sql);
           while($row= $res->fetch_array()){
  
                ?>
                <tr id="renglon<?php echo $row['ID'] ?>">
                    <td class="col1"><?php echo $id=$row['ID_usuario']?></td>
                    <td class="col2"><?php echo $row['Nombre']?></td>
                    <td class="col1"><?php echo $id=$row['Correo']?></td>
                    <td class="col2"><?php echo $row['Rol']?></td>
                    <td> <input type="submit" value="&#128465" onclick="elim(<?php echo $id; ?>)"></td>
                    <td> <input type="submit" value="✎" onclick="location.href='Banners_edita.php?id=<?php echo $id; ?>'"></td>
                    <td> <input type="submit" value="&#128065" onclick="location.href='Banners_muestra.php?id=<?php echo$id; ?>'"></td>                  
                </tr>     
            <?php } ?>
          
            </table>
            <div class="Alta">
        <br>
        <a href="registro_usuario.php">Nuevo usuario</a>
    </div>
        <div id="mensaje"></div>
    
    </body>

</html>