<?php
    
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Listas de Empaque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <center><h1>Creación de lista de Empaque</h1></center>
        <h2>Ingreso uno a uno</h2>
        <div class="row">
            <form action="creaLista.php" method="get">

                <div class="mb-3">

                    <label for="lote" class="form-label">Seleccionar lote</label>
                    <select class="form-select" id="lote" name="lote" aria-label="Default select example">
                        <option selected>Selecciona un lote</option>
                    <?php
                        $sql1="SELECT * from lotes2 ORDER BY id DESC LIMIT 50";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreL"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>


                </div>

                <div class="mb-3">
                    <label for="juegos" class="form-label">Número de juegos</label>
                    <input type="text" class="form-control" id="juegos" name="juegos" placeholder="Digita cantidad juegos">
                </div>

                <div class="mb-3">
                    <label for="codigoQR" class="form-label">Código QR</label>
                    <input type="text" class="form-control" id="codigoQR" name="codigoQR" placeholder="Digita numero de lote">
                </div>               
                
                <input type="submit" name="Crear" >
            </form>
        </div>
        
    </div>
</body>
</html>