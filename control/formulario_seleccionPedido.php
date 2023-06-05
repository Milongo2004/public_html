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
<button onclick="location.href='https://trazabilidadmasterdent.online/control/consolidadoInventario.php'">Producto Terminado Consolidado</button>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/consolidadoBodega.php'">Bodega Consolidado</button>
<body>
    
    <center><h1>Selección de  
    <?php
            if ($destino=='detalles'){
                echo "Pedido para consulta y edición";
            }
            else if($destino=='inventario'){
                echo "Línea para ingreso a inventario";
            }
            else if($destino=='asignacion'){
                echo "Pedido para asignación de producto terminado";
            }
            else{
            echo "Pedido para Empaque";
            }
            ?>
            </h1></center>
    <div class="container mt-5">
        <div class="row">
            <form action="<?php
            if ($destino=='detalles'){
                echo "pedidoDetalles.php";
            } 
            else if ($destino=='inventario'){
                echo "inventario.php";
            } 
            else if ($destino=='asignacion'){
                echo "asignacionAPedido.php";
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
            else if($destino=='inventario'){
                echo "inventario";
            }
             else if($destino=='asignacion'){
                echo "asignación a pedido";
            }
            else{
            echo "Empaque";
            }
            ?></option>
                    <?php
                    
                   if($destino=='inventario'){
                       
                $sql1="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE codigoP LIKE 'ING%' ORDER BY idP DESC";
            }
            else if($destino=='empaqueNacional'){
                $sql1="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE codigoP LIKE 'ATC%' ORDER BY idP DESC";
            }
             else if($destino=='empaqueInternacional'){
                $sql1="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE codigoP NOT LIKE 'ATC%' AND codigoP NOT LIKE 'ING%' AND codigoP NOT LIKE 'PRUEBA%' ORDER BY idP DESC";
            }
             else if($destino=='asignacion'){
                $sql1="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE codigoP NOT LIKE 'ATC%' AND codigoP NOT LIKE 'ING%' AND codigoP NOT LIKE 'PRUEBA%' AND pedidos2.estado ='enProceso' OR pedidos2.codigoP ='ING NACIONAL' OR pedidos2.codigoP ='INTERNACIONAL' ORDER BY idP DESC";
            }
            else{
                        
                        $sql1="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` ORDER BY idP DESC";
            }
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