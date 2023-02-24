<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moldes</title>
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>

    <h1>Tabla Moldes</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                <td>nombre</td>
                <td>referencia</td>
                <td>juegos</td>           
                <td>tipo</td> 
                <td>capas</td>               
                
                
            </tr>
            
            <?php
            $sql="SELECT * from moldes2 INNER JOIN referencias2 ON referencias2.`id`=moldes2.`referenciaId3` ORDER BY moldes2.`idM` ASC";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['idM'] ?></td>
                <td><?php echo $mostrar['nombreM'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><?php echo $mostrar['juegos'] ?></td>                 
                <td><?php echo $mostrar['tipo'] ?></td>
                <td><?php echo $mostrar['capas'] ?></td>
              
                
            </tr>
            <?php
            }
            ?>
        </table>


    
</body>
</html>