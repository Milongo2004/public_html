<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Referencias</title>
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>

    <h1>Tabla Referencias</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                <td>nombre</td>
                <td>juegos</td>
                <td>totalMoldes</td>
                <td>tipo</td>
                <td>capas</td>
            </tr>
            
            <?php
            $sql="SELECT * from referencias2";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><?php echo $mostrar['juegos'] ?></td>
                <td><?php echo $mostrar['totalMoldes'] ?></td>
                <td><?php echo $mostrar['tipo'] ?></td>
                <td><?php echo $mostrar['capas'] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>


    
</body>
</html>