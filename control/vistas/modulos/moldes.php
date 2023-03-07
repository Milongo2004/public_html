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
	<title>Moldes</title>
</head>
<body>
   


<h1>Moldes en Proceso</h1>
         
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                
                <td>molde</td>
                <td>rotuloId</td>           
                <td>fecha de Creación</td>           
                
               
                <td>vuelta1</td>
                <td>vuelta2</td>
                <td>vuelta3</td>
                <td>vuelta4</td>
                <td>vuelta5</td>
                <td>vuelta6</td>
                <td>vuelta7</td>
                <td>vuelta8</td>                
                <td>total</td>
                
                
                
            </tr>
            
            <?php
            $sql="SELECT prensados2.*, moldes2.nombreM FROM prensados2 INNER JOIN moldes2 ON prensados2.moldeId = moldes2.idM WHERE prensados2.estado = 'enProceso' ORDER BY id DESC LIMIT 50";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                
                <td><?php echo $mostrar['nombreM'] ?></td>
                <td><?php echo $mostrar['rotuloId'] ?></td>                 
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                
               
                <td><?php echo $mostrar['vuelta1'] ?></td>
                <td><?php echo $mostrar['vuelta2'] ?></td>
                <td><?php echo $mostrar['vuelta3'] ?></td>
                <td><?php echo $mostrar['vuelta4'] ?></td>
                <td><?php echo $mostrar['vuelta5'] ?></td>
                <td><?php echo $mostrar['vuelta6'] ?></td>
                <td><?php echo $mostrar['vuelta7'] ?></td>
                <td><?php echo $mostrar['vuelta8'] ?></td>            
                <td><?php echo $mostrar['total'] ?></td>
                
                
                
            </tr>
            <?php
            }
            ?>
        </table>

        <br>

    <h1>Moldes terminados</h1>

    <br>
        <table border="1">
            <tr>
                <td>id</td>
                
                <td>molde</td>
                <td>rotuloId</td>           
                <td>fecha de Creación</td>           
                
                
                <td>vuelta1</td>
                <td>vuelta2</td>
                <td>vuelta3</td>
                <td>vuelta4</td>
                <td>vuelta5</td>
                <td>vuelta6</td>
                <td>vuelta7</td>
                <td>vuelta8</td>                
                <td>total</td>
                
                
                
            </tr>
            
            <?php
            $sql="SELECT prensados2.*, moldes2.nombreM FROM prensados2 INNER JOIN moldes2 ON prensados2.moldeId = moldes2.idM WHERE prensados2.estado = 'terminado' ORDER BY id DESC LIMIT 50";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                
                <td><?php echo $mostrar['nombreM'] ?></td>
                <td><?php echo $mostrar['rotuloId'] ?></td>                 
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                
               
                <td><?php echo $mostrar['vuelta1'] ?></td>
                <td><?php echo $mostrar['vuelta2'] ?></td>
                <td><?php echo $mostrar['vuelta3'] ?></td>
                <td><?php echo $mostrar['vuelta4'] ?></td>
                <td><?php echo $mostrar['vuelta5'] ?></td>
                <td><?php echo $mostrar['vuelta6'] ?></td>
                <td><?php echo $mostrar['vuelta7'] ?></td>
                <td><?php echo $mostrar['vuelta8'] ?></td>            
                <td><?php echo $mostrar['total'] ?></td>
                
               
                
            </tr>
            <?php
            }
            ?>
        </table>
        
                

                <br> </br>
        
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaMoldes.php'">Ver tabla Moldes</button>
                <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_moldes.php'">Nuevo  Molde</button>
                 <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_prensados.php'">Registrar prensado</button>
	
</body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>