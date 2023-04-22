<?php
//la presente versión toma los datos de la tabla de pedidoDetalles, en vez de la de seguimiento emplaquetado. suponiendo que las cantidades en ambos coinsidan.
session_start();
  if(!isset ($_SESSION['Cedula']) or !isset($_SESSION['Contrasena'])){ 
    $cedula=1993;
  $contrasena=2050;
    echo "<script>
    alert('Zona  no autorizada,por favor inicia la seccion');
    window.location='../index.php';
  
  
    
  </script>";
  
   
  }
  
  else{
    
    
    $cedula=$_SESSION['Cedula'];
    $contrasena=$_SESSION['Contrasena']; 
   $rol=$_SESSION['Rol'];
  




  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  $pedidoId=$_GET ['id'];
    if(is_null($pedidoId)){
        $pedidoId=$_POST['id'] ;
        
            }
            
            //consulto el nombre o código del pedido a partir del id
                 //echo "se encontró pedido en POST";
                 
            $sqlCod= "SELECT pedidos2.`codigoP` from pedidos2 WHERE idP ='".$pedidoId. "' ";
        $resultCod=mysqli_query($conexion,$sqlCod);

         

                while($mostrarCod=mysqli_fetch_array($resultCod)){
                    $pedido=$mostrarCod['codigoP'];
                }
       
        
    
     
    
    
    
 
    
    
    $emplaquetador = isset( $_POST['emplaquetador'] ) ? $_POST['emplaquetador'] : '';
    
    $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $codigoP = isset( $_POST['codigoP'] ) ? $_POST['codigoP'] : '';
    $tipo = isset( $_POST['tipo'] ) ? $_POST['tipo'] : '';
    $uppLow = isset( $_POST['uppLow'] ) ? $_POST['uppLow'] : '';
    $linea = isset( $_POST['linea'] ) ? $_POST['linea'] : '';
    $categoria = isset( $_POST['categoria'] ) ? $_POST['categoria'] : '';
    $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
    
    
    
    $emplaquetados=0;
   
    
    // imprimo las variables 
   // echo "pedido= ".$pedido;
   // echo "pedidoId= ".$pedidoId;
   // echo "referencia= ".$referencia;
   // echo "color= ".$color;
    
     $filtros = array();
     
      if ($emplaquetador != ''){
        $filtros[]= "pedidoDetalles.`colaborador` = '$emplaquetador'";
    }
     
     if ($codigoP != ''){
         
          // busco el id del pedido según su nombre en la tabla pedidos2
                
                
$sqlPedido= "SELECT `idP` FROM `pedidos2` WHERE codigoP = '$codigoP'";
$resultPedido=mysqli_query($conexion,$sqlPedido);       

     
                while($mostrarPedido=mysqli_fetch_array($resultPedido)){
                    $pedidoId=$mostrarPedido['idP'];
                   
            }
            $filtros[]= "pedidoDetalles.pedidoId = '$pedidoId'";
    }
    
     if ($referencia != ''){
        
         // busco el id de la referencia según su nombre en la tabla referencias2
                
                
$sqlRef= "SELECT `id` FROM `referencias2` WHERE nombre LIKE '$referencia'";
$resultRef=mysqli_query($conexion,$sqlRef);       

     
                while($mostrarRef=mysqli_fetch_array($resultRef)){
                    $referencia=$mostrarRef['id'];
                   
            }
            
            $filtros[]= "pedidoDetalles.`referenciaId` = '$referencia'";
            
                
    }
    if ($color != ''){
        
         // busco el id del color según su nombre 
                
                
$sqlCol= "SELECT `id` FROM `colores2` WHERE nombre = '$color'";
$resultCol=mysqli_query($conexion,$sqlCol);       

     
                while($mostrarCol=mysqli_fetch_array($resultCol)){
                    $color=$mostrarCol['id'];
                   
            }
            
            $filtros[]= "pedidoDetalles.`colorId` = '$color'";
    }
    
    if ($uppLow != ''){
            $filtros[]= "referencias2.`nombre` LIKE '%$uppLow'";
    }
     if ($tipo != ''){
            $filtros[]= "referencias2.`tipo` = '$tipo'";
    }
    
     if ($linea != ''){
        if ($linea=="NULL"){
            $filtros[]="1 ";
        }
        else{
        
            $filtros[]= "pedidos2.`linea` = '$linea'";
        }
    }
    
    if ($categoria != ''){
        if ($categoria=="INTERNO"){
            $filtros[]= "emplaquetadores.`categoria` = 'INTERNO'";
        }
        else{
        $filtros[]= "emplaquetadores.`categoria` = 'EXTERNO'";
        }
    }
    
    if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "pedidoDetalles.`fechaCreacion` BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    $consultaFiltros= 'SELECT pedidoDetalles.*, sum(pedidoDetalles.`emplaquetados`) as totalEmplaquetados, emplaquetadores.`nombre` as nombreEmplaquetador, emplaquetadores.`categoria` as categoria, referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, colores2.`nombre` AS Color, pedidos2.`codigoP` as codigoP, pedidos2.`linea` as linea FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` INNER JOIN pedidos2 ON pedidoDetalles.`pedidoId`= pedidos2.`idP` INNER JOIN emplaquetadores ON pedidoDetalles.`colaborador` = emplaquetadores.`id` WHERE ';
    
    $consultaSuma = 'select pedidoDetalles.*, referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, sum(pedidoDetalles.`emplaquetados`) as totalEmplaquetados, pedidos2.`codigoP` as codigo, pedidos2.`linea` as linea, emplaquetadores.`categoria` as categoria, colores2.`nombre` AS Color FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN pedidos2 ON pedidoDetalles.`pedidoId`= pedidos2.`idP` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` INNER JOIN emplaquetadores ON pedidoDetalles.`colaborador` = emplaquetadores.`id` WHERE ';
    
  }
  
  if($rol==1 OR $rol==3 ){
    
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
     <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaPedidos.php'">Atrás</button>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emplaquetadoConsolidado</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
</head>


<body>
    <center>

   



        <h1>Emplaquetado Consolidado</h1>
        

<div class="row">
            <form action="consolidadoEmplaquetado.php" method="POST">
            
            <div class="mb-3">
                
                    <div class="mb-3">
                    <label for="emplaquetador" class="form-label">Emplaquetador</label>
                    <select class="form-select" id="emplaquetador" name="emplaquetador" autofocus aria-label="Default select example">
                        <option selected></option>
                    <?php
                        $sql1="SELECT * from emplaquetadores  ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"].'     /       '.$mostrar["iniciales"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <br></br>
                    
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" size="15" class="form-control " autofocus  id="referencia" name="referencia">
         
                    <label for="color" class="form-label">Color</label>
                    <input type="text" size="15" class="form-control "  id="color" name="color">
                    
                    <label for="codigoP" class="form-label">Pedido</label>
                    <input type="text" class="form-control "  id="codigoP" name="codigoP" style="width: 100px">
                    
                    <label for="tipo" class="form-label">Muela/Diente</label>
                    <select class="form-select"  id="tipo" name="tipo" aria-label="Default select example">
                        <option selected></option>
                        <option value="Muela">MUELA</option>
                        <option value="Diente">DIENTE</option>
                    
                    </select>
                    
                     <label for="uppLow" class="form-label">Sup/Inf</label>
                    <select class="form-select"  id="uppLow" name="uppLow" aria-label="Default select example">
                        <option selected></option>
                        <option value="-S">SUP</option>
                        <option value="-I">INF</option>
                    
                    </select>
                    
                     <label for="linea" class="form-label">Línea</label>
                 <select class="form-select" id="linea" name="linea" aria-label="Default select example">
                        <option selected value="NULL"></option>
                        <option value="RESISTAL">RESISTAL</option>
                        <option value="STARPLUS">STARPLUS</option>
                        <option value="REVEAL">REVEAL</option>
                        <option value="STARVIT">STARVIT</option>
                        <option value="UHLERPLUS">UHLERPLUS</option>
                        <option value="STARDENT">STARDENT</option>
                        <option value="ZENITH">ZENITH</option>
                        
                 
                    </select>
                    
                     <label for="categoria" class="form-label">INT/EXT</label>
                    <select class="form-select"  id="categoria" name="categoria" aria-label="Default select example">
                        <option selected></option>
                        <option value="INTERNO">INTERNO</option>
                        <option value="EXTERNO">EXTERNO</option>
                    
                    </select>
                    
                    <br></br>
                    
                    <label for="fechaDesde" class="form-label">Desde</label>
                    <input type="Date" class="form-control" id="fechaDesde" name="fechaDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaHasta" name="fechaHasta" placeholder="Ingresa la fecha" >
                    
                    
                    <input name="id" type="hidden" value=" <?php
                        echo $pedidoId;  
                    ?>">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    
<br></br>
    
        <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>Referencia</td>
                <td>Color</td>
                <td>Pedido</td>
                <td>Emplaquetado</td>
                <td>Emplaquetador</td>
                <td>FechaHora</td>
                
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            
            echo "Emplaquetados";
            
            if ($emplaquetador != ''){
                
                // busco el nombre del emplaquetador según su id en la tabla emplaquetadores
                
                
$sqlNombreEmplaquetador= "SELECT `nombre` FROM `emplaquetadores` WHERE id = '$emplaquetador'";
$resultNombreEmplaquetador=mysqli_query($conexion,$sqlNombreEmplaquetador);       

     
                while($mostrarNombreEmplaquetador=mysqli_fetch_array($resultNombreEmplaquetador)){
                    $nombreEmplaquetador=$mostrarNombreEmplaquetador['nombre'];
                   
            }
        echo " por " . $nombreEmplaquetador;
    }
     
     if ($codigoP != ''){
         
          
            echo "-pedido: ".$codigoP;
    }
    
     if ($referencia != ''){
        
        
            
           echo "-referencia: ".$referencia;
            
                
    }
    if ($color != ''){
        
            
           echo "-color: ".$color;
    }
    
    if ($uppLow != ''){
            echo "-Sup/Inf-> ".$uppLow;
    }
     if ($tipo != ''){
            echo "-tipo: ".$tipo;
    }
    
     if ($linea != ''){
        if ($linea=="NULL"){
           
        }
        else{
        
            echo "-linea: ".$linea;
        }
    }
    
    if ($categoria != ''){
        if ($categoria=="INTERNO"){
            echo "-categoría: INTERNO";
        }
        else{
        echo "-categoría: EXTERNO";
        }
    }
    
    if ($fechaDesde != '' && $fechaHasta != ''){
            echo "- entre el " .$fechaDesde. " y el ".$fechaHasta;
    }
            
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ."AND pedidoDetalles.emplaquetados IS NOT NULL GROUP BY colorId, referenciaId ORDER BY pedidoDetalles.fechaCreacion DESC";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["codigoP"] ?></td>
                <td><?php echo $mostrar["totalEmplaquetados"] ?></td>
                <td><?php echo $mostrar["nombreEmplaquetador"] ?></td>
                <td><?php echo $mostrar["fechaCreacion"] ?></td>
                
               
                
                <!--<td><a    href="editar_detellePedido.php?id=<?php //echo $mostrar['id'] ?>&turno=<?php //echo $turno?>&prensada=<?php //echo $prensada?>&fecha=<?php //echo $fecha?> ">Editar</a></td>
                <td><a href="#" data-href="eliminar_detallePedido.php?id=<?php //echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>-->
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
        
         <script type="text/javascript">
        $(document).on("click", "#delRg", function(event) {
            event.preventDefault();

            let ifRegistro = $(this).attr('data-rg');

            $.ajax({
                url: "../control/trazarItem.php",
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
    
    <!--enlace en tabla para ver producción a granel de esa referencia y color-->
    
           <script type="text/javascript">
        $(document).on("click", "#delRg", function(event) {
            event.preventDefault();

            let ifRegistro = $(this).attr('data-rg');

            $.ajax({
                url: "../control/vistas/modulos/verTablaGranel.php",
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
    
   <table border="1">
        <tr>
               
                <td COLSPAN= "13"><CENTER>TOTALES</CENTER></td>
                
            </tr>
            <tr>
               
                
                <td>Emplaquetados</td>
                
                
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros)." ";
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                
               
                <td><?php echo $mostrarSuma['totalEmplaquetados'] ?></td>
               
                
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
            
          
            

<?php




}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}

?>