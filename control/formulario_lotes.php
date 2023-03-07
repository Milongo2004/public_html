<?php
    // $refs = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    // $sql1="SELECT * from colores2 ORDER BY id ASC";
    // $result=mysqli_query($conexion,$sql1);
    
    // while($mostrar=mysqli_fetch_array($result)){
    //     var_dump($mostrar);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    <br>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Lotes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <center><h1>Nuevo Lote</h1></center>
    <div class="container mt-5">
        <div class="row">
            <form action="creaLote.php" method="get">
                <div class="mb-3">
                    <label for="lote" class="form-label">Código de Lote</label>
                    <input type="text" class="form-control" autofocus id="lote" name="lote" placeholder="Digita numero de lote">
                </div>
               
                <div class="mb-3">
                    <label for="color" class="form-label">Seleccionar color</label>
                    <select class="form-select" id="color" name="color" aria-label="Default select example">
                        <option selected>Selecciona un color</option>
                    <?php
                        $sql1="SELECT * from colores2 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                
                <input type="submit" name="Crear" >
            </form>
            <br></br>
            <br></br>
            
               <h1>Tabla Lotes</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                <td>Número</td>
                <td>color</td>
                <td>Estado</td>
                
                <td>Acción</td>
                <td>Acción</td>
                
            </tr>
            
            <?php
            $sql="SELECT lotes2.* , colores2.`nombre` AS color FROM lotes2 INNER JOIN colores2 ON lotes2.`colorId2`= colores2.`id` ORDER BY id DESC ";
            
            $result=mysqli_query($conexion,$sql); 
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['nombreL'] ?></td>
                <td><?php echo $mostrar['color'] ?></td>
                <td><?php echo $mostrar['estado'] ?></td>
               
 <td><a href="vistas/modulos/eliminar_lotes.php?id=<?php echo $mostrar['id'];?>">Eliminar</a></td>
 <td><a href="vistas/modulos/editar_lotes.php?id=<?php echo $mostrar['id'];?>">Editar</a></td>            
</tr>
<?php
}
?>
</table>

<script type="text/javascript">
$(document).on("click", "#delRg", function(event) {
event.preventDefault();

let ifRegistro = $(this).attr('data-rg');

$.ajax({
    url: "../control/eliminar_Lotes.php",
    data: {
        id: ifRegistro
    },
    success: function(result) {

        console.log(result);
        location.reload();
       

    },
    error: function(request, status, error) {
        console(request.responseText);
        console(error);
    }
});

});
</script>

 </table>
 <br></br>
 <br></br>
 
 <br></br>
        </div>
        
    </div>
</body>
</html>