<?php
    
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
     $destino=$_GET ["destino"];

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
<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
<body>
    
    <center><h1>Selección de Pedido para 
    <?php
            if ($destino=='detalles'){
                echo "consulta y edición";
            } 
            else{
            echo "Empaque";
            }
            ?>
            </h1></center>
    <div class="container mt-5">
        <div class="row">
            <form action="<?php
            if ($destino=='detalles'){
                echo "pedidoDetalles.php";
            } 
            else{
            echo "empaque.php";
            }?>" method="get">
                
               
                <div class="mb-3">
                    <label for="pedidoId" class="form-label">Seleccionar pedido</label>
                    <select class="form-select" id="pedidoId" name="pedidoId" aria-label="Default select example">
                        <option selected>Selecciona el código del pedido para <?php
            if ($destino=='detalles'){
                echo "consulta y edición";
            } 
            else{
            echo "Empaque";
            }
            ?></option>
                    <?php
                        //$sql1="SELECT * from pedidos2 ORDER BY idP DESC";
                        $sql1="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` ORDER BY idP DESC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["idP"].'">'.$mostrar["codigoP"]." / ".$mostrar["cliente"].'</option>';
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