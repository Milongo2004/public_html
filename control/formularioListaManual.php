<?php
    
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Rótulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
        <!--  if ($_SESSION["mensaje"] && $_SESSION["mensaje"] != null) {
             echo "<script>".$_SESSION["mensaje"]."</script>";
         } -->
    <div class="container mt-5">
        <center><h1>Crear RÓTULO</h1></center>
        <div class="row">
            <form action="creaLista2.php" method="get">
                <!--<div class="mb-3">
                    <label for="rotulo" class="form-label">Código de Rótulo</label>
                    <input type="text" class="form-control" id="rotulo" name="rotulo" placeholder="Digita número de Rótulo">
                </div>-->
                <div class="mb-3">
                    <label for="refs" class="form-label">Seleccionar referencia</label>
                    <select class="form-select" id="refs" name="referencia" aria-label="Default select example">
                        <option selected>Selecciona una referencia</option>
                    <?php
                        $sql1="SELECT * from referencias2 ORDER BY id ASC";
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
                <div class="mb-3">
                    <label for="antPos" class="form-label">Seleccionar ANT/POS</label>
                    <select class="form-select" id="antPos" name="antPos" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="ANT">ANT</option>
                        <option value="POS">POS</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="supInf" class="form-label">Seleccionar SUP/INF</label>
                    <select class="form-select" id="supInf" name="supInf" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="SUP">SUP</option>
                        <option value="INF">INF</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="colors" class="form-label">Seleccionar color</label>
                    <select class="form-select" id="colors" name="color" aria-label="Default select example">
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
                
                <div class="mb-3">
                    <label for="lote" class="form-label">Codigo de lote</label>
                    <input type="text" class="form-control" id="lote" name="lote" placeholder="Digita numero de lote">
                    </div>

                <div class="mb-3">
                    <label for="juegos" class="form-label">Seleccionar número de juegos</label>
                    <select class="form-select" id="juegos" name="juegos" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="6">6</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                        <option value="14">14</option>
                        <option value="16">16</option>
                        <option value="20">20</option>
                    </select>
                </div>

                
          
                <input type="submit" name="Crear" >
            </form>
        </div>
        
    </div>
</body>
</html>