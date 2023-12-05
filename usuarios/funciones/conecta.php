 <?php 
define("HOST", 'localhost');
define("BD", 'empresa'); 
define("USER_BD", 'root');
define("PASS_BD", 'lm10yas10');


function conecta(){
    $con= new mysqli(HOST, USER_BD, PASS_BD, BD);
    return $con;
}

?>