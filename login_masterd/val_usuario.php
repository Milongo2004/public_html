<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

 $cedula=mysqli_real_escape_string($conexion,$_POST['usuario']);
 $contraseña=md5(mysqli_real_escape_string($conexion,$_POST['contraseña']));
session_start();
 $query=mysqli_query($conexion,"SELECT *FROM usuario WHERE Cedula='$cedula' AND Contrasena='$contraseña'");
 mysqli_close($conexion);
 $resultado=mysqli_num_rows($query);
 if($resultado >0){
    $data=mysqli_fetch_array($query);
    $_SESSION['id']=$data['id'];
    $_SESSION['Nombres']=$data['Nombres'];
    $_SESSION['Apellidos']=$data['Apellidos'];
    $_SESSION['Cedula']=$data['Cedula'];
    $_SESSION['Contrasena']=$data['Contrasena'];
    $_SESSION['Rol']=$data['Rol'];
    $_SESSION['Email']=$data['Email'];
    $_SESSION['Telefono']=$data['Telefono'];
    $_SESSION['Estado']=$data['Estado'];

    echo "<script>

       alert('Bienvenido a el sistema de Masterdent');

       window.location='../control/';

 </script>";

 }
else{
    echo "<script>

       alert('No puedes ingresar al sistema, intentalo nuevamente');

       window.location='../index.php';

 </script>";
}

?>