<?php

 $correo=$_GET['correo'];
 $enlace=$_GET['enlace'];
$to      = $correo;
$subject = 'Reestablecimiento de clave de usuario' ;
$message = 'Restablece tu clave de usuario, para que puedas ingresar al sistema Masterdent'.'       '.$enlace;

mail($to, $subject, $message);

header("location:../../index.php");

?>