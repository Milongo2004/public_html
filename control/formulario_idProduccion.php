<?php
    
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  
?>

<!DOCTYPE html>
<html lang="en">
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
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
            <form action="creaRotulo.php" method="get">
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
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"]." / Moldes Disponibles: ".$mostrar["moldesDisponibles"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lote" class="form-label">Seleccionar lote</label>
                    <select class="form-select" id="lote" name="lote" aria-label="Default select example">
                        <option selected>Selecciona un lote</option>
                    <?php
                        $sql1="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY id DESC LIMIT 200";
                        //$sql1="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY color DESC LIMIT 200";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        //echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreL"]. " / ".$mostrar["color"].'</option>';
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["color"]. " / ".$mostrar["nombreL"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>


                </div>
                
                <div class="mb-3">
                    <label for="pedido" class="form-label">Seleccionar Pedido</label>
                    <select class="form-select" id="pedido" name="pedido" aria-label="Default select example">
                        <option selected>Selecciona un pedido</option>
                    <?php
                        $sql1="SELECT * from pedidos2 ORDER BY idP DESC LIMIT 50";
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
                

                <div class="mb-3">
                    <label for="num_moldes" class="form-label">Número de moldes</label>
                    <input type="text" class="form-control" id="num_moldes" name="num_moldes" placeholder="Digita cantidad de moldes">
                </div>

                 <div class="mb-3">
                    <label for="casillas" class="form-label">Seleccionar casilla para caja</label>
                    <select class="form-select" id="casilla" name="casilla" aria-label="Default select example">
                        <!--<option selected>Selecciona una casilla</option>-->
                        <option value="41" >Selecciona una casilla</option>
                    <?php
                        $sql1="SELECT id, nombre, disponibilidad FROM casillas2 WHERE disponibilidad = 0 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                       // echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"].'</option>';
                          echo '<option value="'.$mostrar["id"].'">'.$mostrar["id"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="turno" class="form-label">Seleccionar un turno</label>
                    <select class="form-select" id="turno" name="turno" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
                </div>
                <input type="submit" name="Crear" >
            </form>
        </div>
        
    </div>
</body>
</html>