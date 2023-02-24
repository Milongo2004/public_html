<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    $idMolde=$_GET ["molde"];




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RotulosPorLote</title>
</head>
<body>

    <?php
            

        $sql2= "SELECT prensados2.*, moldes2.nombreM FROM prensados2 INNER JOIN moldes2 ON prensados2.moldeId = moldes2.idM WHERE prensados2.moldeId = '".$idMolde."'";
        $result2=mysqli_query($conexion,$sql2);

            ?>



        <h1>Detalles del molde 

        
                 <?php

                while($mostrar2=mysqli_fetch_array($result2)){
            ?>

            
                
                <td><?php echo $mostrar2['nombreM'] ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h1>
    
    
    
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
            //$sql="SELECT * from Rotulo";
            
            //$sql= "SELECT * from rotulos2 WHERE id = '". $rotulo. "'";

            $sql= "SELECT prensados2.*, moldes2.nombreM FROM prensados2 INNER JOIN moldes2 ON prensados2.moldeId = moldes2.idM WHERE prensados2.moldeId = '".$idMolde."'";

            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
                
                <td><?php echo $mostrar['idM'] ?></td>
                
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





    </br>

    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaReferencias.php'">Ver tabla Referencias</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaColores.php'">Ver tabla Colores</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaEstaciones.php'">Ver tabla Estaciones</button>
    
</body>
</html>