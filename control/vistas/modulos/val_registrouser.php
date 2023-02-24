<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

 $Nombres = $_GET['nombres'];
 $Apellidos = $_GET['apellidos'];
 $Cedula = $_GET['cedula'];
 $Contrasena=md5(  mysqli_real_escape_string ($conexion,$_GET['contraseña']));
 $Rol=$_GET['rol'];
 $Email = $_GET['email'];
 $Telefono= $_GET['telefono'];
 $Estado=$_GET['estado'];


 $query=mysqli_query($conexion,"INSERT INTO `usuario`(`Nombres`, `Apellidos`, `Cedula`, `Contrasena`, `Rol`, `Email`, `Telefono`, `Estado`) VALUES ('$Nombres','$Apellidos','$Cedula','$Contrasena','$Rol','$Email','$Telefono','$Estado')");
 mysqli_close($conexion);
 if($query>0){
   
    echo "<script>
          
    alert('El registro ha sido guardado con exito en la base de datos');
    window.location='../../index.php';
    
    </script>";
}
  else{
      echo "Hubo un error al  guardar el registro, por favor  intentalo nuevamente";
  }

?>