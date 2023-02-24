<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
$id=$_POST['id'];
$contraseña= md5 (mysqli_real_escape_string($conexion,$_POST['contraseña']));
$confirmar= md5 (mysqli_real_escape_string ( $conexion,$_POST['confirmar']));


if ($contraseña==$confirmar){
    
    $cambioclave=mysqli_query($conexion,"UPDATE usuario SET Contrasena='$contraseña' WHERE id='$id'");

    if ($cambioclave>0){

         echo "<script>
  alert('Se ha ejecutado con exito');
  window.location='../../index.php';
  </script>";
        
    }
    
}

else {
    
    echo "<script>
  alert('Las contraseñas no coinciden');
  window.location='cambiar_contrasena.php?a26031997=$id';
  </script>";

}


?>