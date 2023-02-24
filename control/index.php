<?php

session_start();

if(!isset ($_SESSION['Cedula']) or !isset($_SESSION['Contrasena'])){ 
    $cedula=1993;
 $contrasena=2050;
    echo "<script>
    alert('Zona  no autorizada,por favor inicia la seccion');
    window.location='../index.php';


    
</script>";

   
}

else{
    
    $cedula=$_SESSION['Cedula'];
    $contrasena=$_SESSION['Contrasena']; 
   

}


# en el index mostramos la salida de las vistas del usurario y también a través de  él enviaremos las distintas acciones que el usuario envíe al controlador. A través de módulos se contruye lo que va a ver el usuario.
# el require establece que el archivo requerido es obligatorio para el funcionamiento del  programa. si el archivo requerido no se encuentra se presenta un error fatal
#se requiere una vez pero con el once se requiere una sola vez. para evitar la redefinición de variables o clases.
require_once "controladores/controller.php";
require_once "modelos/modelo.php";
$mvc = new MvcController();
$mvc -> plantilla();
#estoy instanciando o creando un objeto de la clase MvcController.

?>

