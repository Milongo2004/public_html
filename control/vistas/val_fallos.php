<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

 $Nombre_maquina = $_GET['nombre'];
 $Fecha = $_GET['fecha'];
 $Problema= $_GET['problema'];

 $query=mysqli_query($conexion,"INSERT INTO fallos_masterdent(`Nombre_maquina`, `Fecha`, `Problema`) VALUES ('$Nombre_maquina','$Fecha','$Problema')");
 mysqli_close($conexion);
 if($query>0){
   
    echo "<script>
          
    alert('La informacion se ha guardo con exito en la base de datos.');
    window.location='https://trazabilidadmasterdent.online/control';
    
    </script>";
}
  else{
      echo "Hubo un error al  guardar la informacion, por favor  intentalo nuevamente.";
  }

?>