<?php
    
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Lotes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    
    <center><h1>Selección de pedido para despacho</h1></center>
    <div class="container mt-5">
        <div class="row">
            <form action="empaque.php" method="get">
                
               
                <div class="mb-3">
                    <label for="pedido" class="form-label">Seleccionar pedido</label>
                    <select class="form-select" id="pedido" name="pedido" aria-label="Default select example">
                        <option selected>Selecciona el código del pedido a empacar</option>
                    <?php
                        $sql1="SELECT * from pedidos2 ORDER BY idP DESC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["idP"].'">'.$mostrar["codigoP"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
</body>
</html>