<?php
  
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
   $rol=$_SESSION['Rol'];
  
  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  }
  
  if($rol==1 OR $rol==3 ){
    
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta charset="UTF-8">
	<title>materiales</title>
</head>
<body>
    <center>
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_lotes.php'">Nuevo Lote</button>
     <h1>Materiales</h1>
    <br>
    
   
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/material_preparado.php'">Material Preparado</button>
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Material Pigmentado</button>
        
        
         <br></br>
    
        
        

	</center>
</body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>