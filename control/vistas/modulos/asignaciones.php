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
	<title>RotulosEstaciones</title>
</head>
<body>
     <h1>Asignaciones</h1>
    <br>
    
   
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_asignaciones.php'">nueva asigación</button>
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaRotulos.php'">Ver tabla Rótulos</button>
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaMoldes.php'">Ver tabla Moldes</button>
        
         <br></br>
    
        <table border="1">
            <tr>
                <td>id</td>
                <td>rotulo</td>
                <td>molde</td>
                <td>fechaCreación</td>
                <td>estado</td>
                <td>acción</td>
                <td>acción</td>
                
                
                
                
        
            </tr>
            
            <?php
            //$sql="SELECT * from Rotulo";
            $sql="SELECT asignaciones2.*, moldes2.nombreM, rotulos2.cod_rotulo FROM asignaciones2 INNER JOIN moldes2 ON asignaciones2.moldeId=moldes2.idM INNER JOIN rotulos2 ON asignaciones2.rotuloId = rotulos2.id ORDER BY asignaciones2.id DESC LIMIT 40 ";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['cod_rotulo'] ?></td>
                <td><?php echo $mostrar['nombreM'] ?></td>
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                <td><?php echo $mostrar['estado'] ?></td>
                <td><a href="../control/vistas/modulos/eliminar_asignaciones.php?id=<?php echo $mostrar['id']; ?>">Eliminar</a></td>
                <td><a href="../control/vistas/modulos/editar_asignaciones.php?id=<?php echo $mostrar['id']; ?>">Editar</a></td>
                
                
                
                
            </tr>
            <?php
            }
            ?>
        </table>

        

	
</body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>