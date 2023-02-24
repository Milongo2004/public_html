<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estaciones</title>
</head>
<body>

    <h1>Tabla Estaciones</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                <td>nombre</td>
            </tr>
            
            <?php
            $sql="SELECT * from estaciones2";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['nombre'] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>


    
</body>
</html>