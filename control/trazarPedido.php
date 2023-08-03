<?php
//$pedido=$_GET ["id"];
//echo "aquí podremos ver lo ítems del pedido". $pedido. "según su estado dentro del proceso.";

//////////////////////////////////////////////////////////////

//condenado por session start malo   session_start();
//condenado por session start malo     if(!isset ($_SESSION['Cedula']) or !isset($_SESSION['Contrasena'])){ 
//condenado por session start malo       $cedula=1993;
//condenado por session start malo     $contrasena=2050;
//condenado por session start malo       echo "<script>
//condenado por session start malo       alert('Zona  no autorizada,por favor inicia la seccion');
//condenado por session start malo       window.location='../index.php';
//condenado por session start malo     
//condenado por session start malo     
//condenado por session start malo       
//condenado por session start malo     </script>";
//condenado por session start malo     
//condenado por session start malo      
//condenado por session start malo     }
//condenado por session start malo      
//condenado por session start malo     
//condenado por session start malo     else{
//condenado por session start malo       
//condenado por session start malo       
//condenado por session start malo       $cedula=$_SESSION['Cedula'];
//condenado por session start malo       $contrasena=$_SESSION['Contrasena']; 
//condenado por session start malo      $rol=$_SESSION['Rol'];
 




  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  $sumaItem=array();
  $juegosItem=array(array());
  $nombreItem='';
  
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
       
        
    
     
    
    
    
 
    
    
   
  
    $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $uppLow = isset( $_POST['uppLow'] ) ? $_POST['uppLow'] : '';
    $tipo = isset( $_POST['tipo'] ) ? $_POST['tipo'] : '';
    
    $faltante=0;
    
    //variable para determinar las columnas a mostrar según área de la empresa
    
    $origenBusqueda=$_GET['origenBusqueda'];
    
    if ($origenBusqueda==NULL || $origenBusqueda==''){
    
    $origenBusqueda=$_POST['origenBusqueda'];
    
    }
     $origenBusqueda=trim($origenBusqueda," ");
    
    $granel=0;
    $programados=0;
    $producidos=0;
    $pulidos=0;
    $separados=0;
    $emplaquetados=0;
    $revisados=0;
    $verificados=0;
    $empacados=0;
    
    // imprimo las variables 
   // echo "pedido= ".$pedido;
   // echo "pedidoId= ".$pedidoId;
   // echo "referencia= ".$referencia;
   // echo "color= ".$color;
    
     $filtros = array();
     
     if ($pedidoId != ''){
        $filtros[]= "pedidoDetalles.`pedidoId` = '$pedidoId'";
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
    
    
    $consultaFiltros= 'SELECT pedidoDetalles.*, sum(pedidoDetalles.`juegos`) as totalPedidos,sum(pedidoDetalles.`programados`) as totalProgramados, sum(pedidoDetalles.`granel`) as totalGranel, sum(pedidoDetalles.`pulidos`) as totalPulidos, sum(pedidoDetalles.`producidos`) as totalProducidos, sum(pedidoDetalles.`enSeparacion`) as totalEnSeparacion, sum(pedidoDetalles.`separado`) as totalSeparados, sum(pedidoDetalles.`enEmplaquetado`) as totalEnEmplaquetado, sum(pedidoDetalles.`emplaquetados`) as totalEmplaquetados, sum(pedidoDetalles.`revision1`) as totalRevision1, sum(pedidoDetalles.`revision2`) as totalRevision2, sum(pedidoDetalles.`empacados`) as totalEmpacados, referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, colores2.`nombre` AS Color FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE ';
    
    $consultaSuma = 'select referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, sum(pedidoDetalles.`juegos`) as totalPedidos,sum(pedidoDetalles.`programados`) as totalProgramados, sum(pedidoDetalles.`granel`) as totalGranel, sum(pedidoDetalles.`pulidos`) as totalPulidos, sum(pedidoDetalles.`producidos`) as totalProducidos, sum(pedidoDetalles.`enSeparacion`) as totalEnSeparacion, sum(pedidoDetalles.`separado`) as totalSeparados, sum(pedidoDetalles.`enEmplaquetado`) as totalEnEmplaquetado, sum(pedidoDetalles.`emplaquetados`) as totalEmplaquetados, sum(pedidoDetalles.`revision1`) as totalRevision1, sum(pedidoDetalles.`revision2`) as totalRevision2, sum(pedidoDetalles.`empacados`) as totalEmpacados FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` WHERE ';
    
 //condenado por session start malo }
  
  //condenado por session start malo if($rol==1 OR $rol==3 ){
    
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
     <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaPedidos.php?origenBusqueda=<?php echo $origenBusqueda ?>'">Atrás</button>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeguimientoPedidos</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
</head>

<head>
	<meta charset="UTF-8">
	<title>Empaque</title>
</head>
<body>
    <center>

   



        <h1>Seguimiento del pedido <?php echo $pedido  ?>  </h1>
        
        <?php
        
   
        
        //presento el nombre del cliente

        $sql3= "SELECT pedidos2.`idCliente`, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente` = clientes2.`id` WHERE idP ='".$pedidoId. "'";
        $result3=mysqli_query($conexion,$sql3);

            ?>



        <h3>Cliente: 

        
                 <?php

                while($mostrar3=mysqli_fetch_array($result3)){
                    $nombreCliente=$mostrar3['cliente'];
            ?>

            
                
                <td><?php //echo $mostrar3['cliente'] 
                echo $nombreCliente;
                ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h3>
            
            <?php
            
            //presento la línea

        $sql4= "SELECT linea FROM pedidos2 WHERE idP ='". $pedidoId. "'";
        $result4=mysqli_query($conexion,$sql4);

            ?>



        <h3>Línea: 

        
                 <?php

                while($mostrar4=mysqli_fetch_array($result4)){
                    $línea=$mostrar4['linea'];
            ?>

            
                
                <td><?php echo $línea; ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h3>
  

  
    
    
<div class="row">
            <form action="trazarPedido.php" method="POST">
            
            <div class="mb-3">
                
                   
                    
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" size="15" class="form-control " autofocus  id="referencia" name="referencia">
         
                    <label for="color" class="form-label">Color</label>
                    <input type="text" size="15" class="form-control "  id="color" name="color">
                    
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
                    
                    
                    
                    <input name="id" type="hidden" value=" <?php
                        echo $pedidoId;  
                    ?>">
                    
                    <input name="origenBusqueda" type="hidden" value=" <?php
                        echo $origenBusqueda;  
                    ?>">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    
<br></br>

<?php

//presento la tabla según sea el origen de la búsqueda. 

if($origenBusqueda=='terminacion'){
    ?>
    
    <!--espacio para poner la tabla útil para terminación-->
    
    <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>Referencia</td>
                <td>Color</td>
                <td>Pedidos</td>
                <!--<td>Granel</td>-->
                <!--<td>PorProgramar</td>-->
                <!--<td>Programados</td>-->
                <!--<td>Producidos</td>-->
                <!--<td>Pulidos</td>-->
                <!--<td>EnSeparación</td>-->
                <!--<td>Separados</td>-->
                <!--<td>EnEmplaquetado</td>-->
                <!--<td>Emplaquetados</td>-->
                <!--<td>Revisión 1</td>-->
                <td>Asignados</td>
                <td>Faltan</td>
                <td>Empacados</td>
                
                <!--<td>EnProceso</td>-->
                <td>Historial</td>
                <td>VerGranel</td>
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." GROUP BY pedidoId, colorId, referenciaId ";
            //echo $sql;
            ?>
            <p>*Faltante calculado como  la diferencia entre el asignado y el pedido</p>
            <?php
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
                
                /*
                $nombreItem=$mostrar['referencia'].$mostrar['Color'];
                $sumaItem[$nombreItem]=0;
                
                $sqlSumaJuegosEnProceso="SELECT pedidoDetalles.*, rotulos2.estacionId2 as estacionId, rotulos2.total as juegos FROM pedidoDetalles INNER JOIN rotulos2 ON pedidoDetalles.rotuloId = rotulos2.id WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' AND pedidoDetalles.`referenciaId` = '".$mostrar['referencia']."' AND pedidoDetalles.`colorId` = '".$mostrar['Color']."' AND rotuloId is not null GROUP BY rotuloId";
                
            $sqlSumaJuegosEnProceso= $this->conexion->conexion->prepare($sqlSumaJuegosEnProceso);
            $sqlSumaJuegosEnProceso->execute();
		    $datos = $sqlSumaJuegosEnProceso->fetch();
		    
		    
		            $juegosItem[$nombreItem][] = $datos['juegos'];
		            
		            foreach($juegosItem[$nombreItem][] as $juegItem){
		            $sumaItem[$nombreItem]=$sumaItem[$nombreItem]+$juegItem;
		            }
		            */
                
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["totalPedidos"] ?></td>
                
                <!--<td><?php //echo $mostrar["totalGranel"]?></td>-->
                <!--<td><?php //echo ($mostrar["totalPedidos"]*1.25)-($mostrar["totalRevision2"]+$mostrar["totalProgramados"])?></td>-->
                <!--<td bgcolor= "<?php if(($mostrar["totalRevision2"]+$mostrar["totalProgramados"])>$mostrar["totalPedidos"]*1.25){
                //echo "B6FF8A";
                }?>"><?php //echo $mostrar["totalProgramados"] ?></td>-->
                <!--<td bgcolor= "<?php if($mostrar["totalProducidos"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProducidos"] ?></td>-->
                <!--<td bgcolor= "<?php if($mostrar["totalPulidos"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                }?>"><?php //echo $mostrar["totalPulidos"] ?></td>-->
                
                <!--<td bgcolor= "<?php //if($mostrar["totalEnSeparacion"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                //}?>"><?php //echo $mostrar["totalEnSeparacion"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalSeparados"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                }?>"><?php //echo $mostrar["totalSeparados"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalEnEmplaquetado"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php //echo $mostrar["totalEnEmplaquetado"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalEmplaquetados"]>=$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                }?>"><?php //echo $mostrar["totalEmplaquetados"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalRevision1"]>=$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                }?>"><?php //echo $mostrar["totalRevision1"] ?></td>-->
                
                <td bgcolor= "<?php if($mostrar["totalRevision2"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision2"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalPedidos"]-$mostrar["totalRevision2"]==0){
                echo "B6FF8A";
                }
                else if($mostrar["totalPedidos"]-$mostrar["totalRevision2"]<0){
                    echo  "FB413B";
                }
                ?>"><?php echo ($mostrar["totalPedidos"])-($mostrar["totalRevision2"])?></td>
                
                <td bgcolor= "<?php 
                
                if($mostrar["totalEmpacados"]==$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }
                else if(($mostrar["totalEmpacados"]>$mostrar["totalPedidos"]) || ($mostrar["totalEmpacados"]-$mostrar["totalPedidos"]==$mostrar["totalEmpacados"])){
                    echo  "FB413B";
                }
                ?>"><?php echo $mostrar["totalEmpacados"] ?></td>
                
                
                
                <!--<td><?php echo $sumaItem[$nombreItem] ?></td>-->
                
                <td><a href="../control/trazarItem.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&origenBusqueda=<?php echo $origenBusqueda ?>&Crear=Enviar'" >Historial</a></td>
                
                <td><a href="../control/vistas/modulos/verTablaGranel.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&Crear=Enviar'" >verGranel</a></td>
                
                <!--<td><a    href="editar_detellePedido.php?id=<?php //echo $mostrar['id'] ?>&turno=<?php //echo $turno?>&prensada=<?php //echo $prensada?>&fecha=<?php //echo $fecha?> ">Editar</a></td>
                <td><a href="#" data-href="eliminar_detallePedido.php?id=<?php //echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>-->
            </tr>
            <?php
            //$faltante=$faltante+($mostrar["totalPedidos"]-$mostrar["totalRevision2"]);
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
               
                <td>Pedidos</td>
                <td>Asignados</td>
                <td>Faltan</td>
                <td>Empacados</td>
                
                
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros)." ";
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
                
                $faltante=($mostrarSuma["totalPedidos"]-$mostrarSuma["totalRevision2"]);
            ?>
            <tr>
                
                
                <td><?php echo $mostrarSuma['totalPedidos'] ?></td>
                <td><?php echo $mostrarSuma['totalRevision2'] ?></td>
                <td><?php echo $faltante ?></td>
                <td><?php echo $mostrarSuma['totalEmpacados'] ?></td>
                
                
                
            </tr>
            <?php
            
            }
            ?>
        </table>
        <br></br>
    
    <?php
}

else if($origenBusqueda=='almacen'){
    ?>
    
    <!--espacio para poner la tabla útil para almacén-->
    
    <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>Referencia</td>
                <td>Color</td>
                <td>Pedidos</td>
                
                <!--<td>Granel</td>-->
                <!--<td>PorProgramar</td>-->
                <!--<td>Programados</td>-->
                <!--<td>Producidos</td>-->
                <!--<td>Pulidos</td>-->
                <!--<td>EnSeparación</td>-->
                <!--<td>Separados</td>-->
                <!--<td>EnEmplaquetado</td>-->
                <!--<td>Emplaquetados</td>-->
                <!--<td>Revisión 1</td>-->
                <!--<td>Asignados</td>-->
                <td>Empacados</td>
                <td>Faltan</td>
                <!--<td>EnProceso</td>-->
                <td>Historial</td>
                <td>VerGranel</td>
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." GROUP BY pedidoId, colorId, referenciaId ";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
                
                /*
                $nombreItem=$mostrar['referencia'].$mostrar['Color'];
                $sumaItem[$nombreItem]=0;
                
                $sqlSumaJuegosEnProceso="SELECT pedidoDetalles.*, rotulos2.estacionId2 as estacionId, rotulos2.total as juegos FROM pedidoDetalles INNER JOIN rotulos2 ON pedidoDetalles.rotuloId = rotulos2.id WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' AND pedidoDetalles.`referenciaId` = '".$mostrar['referencia']."' AND pedidoDetalles.`colorId` = '".$mostrar['Color']."' AND rotuloId is not null GROUP BY rotuloId";
                
            $sqlSumaJuegosEnProceso= $this->conexion->conexion->prepare($sqlSumaJuegosEnProceso);
            $sqlSumaJuegosEnProceso->execute();
		    $datos = $sqlSumaJuegosEnProceso->fetch();
		    
		    
		            $juegosItem[$nombreItem][] = $datos['juegos'];
		            
		            foreach($juegosItem[$nombreItem][] as $juegItem){
		            $sumaItem[$nombreItem]=$sumaItem[$nombreItem]+$juegItem;
		            }
		            */
                
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["totalPedidos"] ?></td>
                
                <!--<td><?php echo $mostrar["totalGranel"]?></td>-->
                <!--<td><?php echo ($mostrar["totalPedidos"]*1.25)-($mostrar["totalRevision2"]+$mostrar["totalProgramados"])?></td>-->
                
                <!--<td bgcolor= "<?php if(($mostrar["totalRevision2"]+$mostrar["totalProgramados"])>$mostrar["totalPedidos"]*1.25){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProgramados"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalProducidos"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProducidos"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalPulidos"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalPulidos"] ?></td>-->
                
                <!--<td bgcolor= "<?php //if($mostrar["totalEnSeparacion"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                //}?>"><?php //echo $mostrar["totalEnSeparacion"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalSeparados"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalSeparados"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalEnEmplaquetado"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalEnEmplaquetado"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalEmplaquetados"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalEmplaquetados"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalRevision1"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision1"] ?></td>-->
                
                <!--<td bgcolor= "<?php if($mostrar["totalRevision2"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision2"] ?></td>-->
                
                <td bgcolor= "<?php 
                
                if($mostrar["totalEmpacados"]==$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }
                else if(($mostrar["totalEmpacados"]>$mostrar["totalPedidos"]) || ($mostrar["totalEmpacados"]-$mostrar["totalPedidos"]==$mostrar["totalEmpacados"])){
                    echo  "FB413B";
                }
                ?>"><?php echo $mostrar["totalEmpacados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalPedidos"]-$mostrar["totalEmpacados"]==0){
                echo "B6FF8A";
                }
                else if($mostrar["totalPedidos"]-$mostrar["totalEmpacados"]<0){
                    echo  "FB413B";
                }
                ?>"><?php echo ($mostrar["totalPedidos"])-($mostrar["totalEmpacados"])?></td>
                
                <!--<td><?php echo $sumaItem[$nombreItem] ?></td>-->
                
                <td><a href="../control/trazarItem.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&origenBusqueda=<?php echo $origenBusqueda ?>&Crear=Enviar'" >Historial</a></td>
                
                <td><a href="../control/vistas/modulos/verTablaGranel.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&Crear=Enviar'" >verGranel</a></td>
                
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
               
                <td>Pedidos</td>
               
                <td>Empacados</td>
                
                <td>Faltante</td>
                
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros)." ";
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
                
                 $faltante=$faltante+($mostrarSuma["totalPedidos"]-$mostrarSuma["totalEmpacados"]);
            ?>
            <tr>
                
                <td><?php echo $mostrarSuma['totalPedidos'] ?></td>
               
                <td><?php echo $mostrarSuma['totalEmpacados'] ?></td>
                
                <td><?php echo $faltante ?></td>
                
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
    
    <?php
}
else if($origenBusqueda=='moldeado'){
    ?>
    
    <!--espacio para poner la tabla útil para moldeado-->
    
    <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>Referencia</td>
                <td>Color</td>
                <td>Pedidos</td>
                <td>Granel</td>
                <td>PorProgramar</td>
                <td>Programados</td>
                <td>Producidos</td>
                <td>Pulidos</td>
                <!--<td>EnSeparación</td>-->
                <td>Separados</td>
                <td>EnEmplaquetado</td>
                <td>Emplaquetados</td>
                <td>Revisión 1</td>
                <td>Asignados</td>
                <td>Empacados</td>
                <td>Faltan</td>
                <td>EnProceso</td>
                <td>Historial</td>
                <td>VerGranel</td>
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." GROUP BY pedidoId, colorId, referenciaId ";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
                
                /*
                $nombreItem=$mostrar['referencia'].$mostrar['Color'];
                $sumaItem[$nombreItem]=0;
                
                $sqlSumaJuegosEnProceso="SELECT pedidoDetalles.*, rotulos2.estacionId2 as estacionId, rotulos2.total as juegos FROM pedidoDetalles INNER JOIN rotulos2 ON pedidoDetalles.rotuloId = rotulos2.id WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' AND pedidoDetalles.`referenciaId` = '".$mostrar['referencia']."' AND pedidoDetalles.`colorId` = '".$mostrar['Color']."' AND rotuloId is not null GROUP BY rotuloId";
                
            $sqlSumaJuegosEnProceso= $this->conexion->conexion->prepare($sqlSumaJuegosEnProceso);
            $sqlSumaJuegosEnProceso->execute();
		    $datos = $sqlSumaJuegosEnProceso->fetch();
		    
		    
		            $juegosItem[$nombreItem][] = $datos['juegos'];
		            
		            foreach($juegosItem[$nombreItem][] as $juegItem){
		            $sumaItem[$nombreItem]=$sumaItem[$nombreItem]+$juegItem;
		            }
		            */
                
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["totalPedidos"] ?></td>
                <td><?php echo $mostrar["totalGranel"]?></td>
                <td><?php echo ($mostrar["totalPedidos"]*1.25)-($mostrar["totalRevision2"]+$mostrar["totalProgramados"])?></td>
                
                <td bgcolor= "<?php if(($mostrar["totalRevision2"]+$mostrar["totalProgramados"])>$mostrar["totalPedidos"]*1.25){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProgramados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalProducidos"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProducidos"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalPulidos"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalPulidos"] ?></td>
                
                <!--<td bgcolor= "<?php //if($mostrar["totalEnSeparacion"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                //}?>"><?php //echo $mostrar["totalEnSeparacion"] ?></td>-->
                
                <td bgcolor= "<?php if($mostrar["totalSeparados"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalSeparados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalEnEmplaquetado"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalEnEmplaquetado"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalEmplaquetados"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalEmplaquetados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalRevision1"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision1"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalRevision2"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision2"] ?></td>
                
                <td bgcolor= "<?php 
                
                if($mostrar["totalEmpacados"]==$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }
                else if(($mostrar["totalEmpacados"]>$mostrar["totalPedidos"]) || ($mostrar["totalEmpacados"]-$mostrar["totalPedidos"]==$mostrar["totalEmpacados"])){
                    echo  "FB413B";
                }
                ?>"><?php echo $mostrar["totalEmpacados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalPedidos"]-$mostrar["totalEmpacados"]==0){
                echo "B6FF8A";
                }
                else if($mostrar["totalPedidos"]-$mostrar["totalEmpacados"]<0){
                    echo  "FB413B";
                }
                ?>"><?php echo ($mostrar["totalPedidos"])-($mostrar["totalEmpacados"])?></td>
                
                <td><?php echo $sumaItem[$nombreItem] ?></td>
                
                <td><a href="../control/trazarItem.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&origenBusqueda=<?php echo $origenBusqueda ?>&Crear=Enviar'" >Historial</a></td>
                
                <td><a href="../control/vistas/modulos/verTablaGranel.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&Crear=Enviar'" >verGranel</a></td>
                
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
    
    <?php
}
else{
     ?>
    
    <!--espacio para poner la tabla útil para todos-->
    
    <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>Referencia</td>
                <td>Color</td>
                <td>Pedidos</td>
                <td>Granel</td>
                <td>PorProgramar</td>
                <td>Programados</td>
                <td>Producidos</td>
                <td>Pulidos</td>
                <!--<td>EnSeparación</td>-->
                <td>Separados</td>
                <td>EnEmplaquetado</td>
                <td>Emplaquetados</td>
                <td>Revisión 1</td>
                <td>Asignados</td>
                <td>Empacados</td>
                <td>Faltan</td>
                <td>EnProceso</td>
                <td>Historial</td>
                <td>VerGranel</td>
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." GROUP BY pedidoId, colorId, referenciaId ";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
                
                /*
                $nombreItem=$mostrar['referencia'].$mostrar['Color'];
                $sumaItem[$nombreItem]=0;
                
                $sqlSumaJuegosEnProceso="SELECT pedidoDetalles.*, rotulos2.estacionId2 as estacionId, rotulos2.total as juegos FROM pedidoDetalles INNER JOIN rotulos2 ON pedidoDetalles.rotuloId = rotulos2.id WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' AND pedidoDetalles.`referenciaId` = '".$mostrar['referencia']."' AND pedidoDetalles.`colorId` = '".$mostrar['Color']."' AND rotuloId is not null GROUP BY rotuloId";
                
            $sqlSumaJuegosEnProceso= $this->conexion->conexion->prepare($sqlSumaJuegosEnProceso);
            $sqlSumaJuegosEnProceso->execute();
		    $datos = $sqlSumaJuegosEnProceso->fetch();
		    
		    
		            $juegosItem[$nombreItem][] = $datos['juegos'];
		            
		            foreach($juegosItem[$nombreItem][] as $juegItem){
		            $sumaItem[$nombreItem]=$sumaItem[$nombreItem]+$juegItem;
		            }
		            */
                
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["totalPedidos"] ?></td>
                <td><?php echo $mostrar["totalGranel"]?></td>
                <td><?php echo ($mostrar["totalPedidos"]*1.25)-($mostrar["totalRevision2"]+$mostrar["totalProgramados"])?></td>
                
                <td bgcolor= "<?php if(($mostrar["totalRevision2"]+$mostrar["totalProgramados"])>$mostrar["totalPedidos"]*1.25){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProgramados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalProducidos"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalProducidos"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalPulidos"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalPulidos"] ?></td>
                
                <!--<td bgcolor= "<?php //if($mostrar["totalEnSeparacion"]>$mostrar["totalPedidos"]){
                //echo "B6FF8A";
                //}?>"><?php //echo $mostrar["totalEnSeparacion"] ?></td>-->
                
                <td bgcolor= "<?php if($mostrar["totalSeparados"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalSeparados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalEnEmplaquetado"]>$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalEnEmplaquetado"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalEmplaquetados"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalEmplaquetados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalRevision1"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision1"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalRevision2"]>=$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }?>"><?php echo $mostrar["totalRevision2"] ?></td>
                
                <td bgcolor= "<?php 
                
                if($mostrar["totalEmpacados"]==$mostrar["totalPedidos"]){
                echo "B6FF8A";
                }
                else if(($mostrar["totalEmpacados"]>$mostrar["totalPedidos"]) || ($mostrar["totalEmpacados"]-$mostrar["totalPedidos"]==$mostrar["totalEmpacados"])){
                    echo  "FB413B";
                }
                ?>"><?php echo $mostrar["totalEmpacados"] ?></td>
                
                <td bgcolor= "<?php if($mostrar["totalPedidos"]-$mostrar["totalEmpacados"]==0){
                echo "B6FF8A";
                }
                else if($mostrar["totalPedidos"]-$mostrar["totalEmpacados"]<0){
                    echo  "FB413B";
                }
                ?>"><?php echo ($mostrar["totalPedidos"])-($mostrar["totalEmpacados"])?></td>
                
                <td><?php echo $sumaItem[$nombreItem] ?></td>
                
                <td><a href="../control/trazarItem.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&origenBusqueda=<?php echo $origenBusqueda ?>&Crear=Enviar'" >Historial</a></td>
                
                <td><a href="../control/vistas/modulos/verTablaGranel.php?idP=<?php echo $mostrar['pedidoId']; ?>&referenciaId=<?php echo $mostrar['referenciaId'] ?>&colorId=<?php echo $mostrar['colorId'] ?>&Crear=Enviar'" >verGranel</a></td>
                
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
               
                <td>Pedidos</td>
                <td>Granel</td>
                <td>Programados</td>
                <td>Producidos</td>
                <td>Pulidos</td>
                <!--<td>EnSeparación</td>-->
                <td>Separados</td>
                <td>EnEmplaquetado</td>
                <td>Emplaquetados</td>
                <td>Revisión1</td>
                <td>Asignados</td>
                <td>Empacados</td>
                
                
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
                
                <td><?php echo $mostrarSuma['totalPedidos'] ?></td>
                <td><?php echo $mostrarSuma['totalGranel'] ?></td>
                <td><?php echo $mostrarSuma['totalProgramados'] ?></td>
                <td><?php echo $mostrarSuma['totalProducidos'] ?></td>
                <td><?php echo $mostrarSuma['totalPulidos'] ?></td>
                <!--<td><?php //echo $mostrarSuma['totalEnSeparacion'] ?></td>-->
                <td><?php echo $mostrarSuma['totalSeparados'] ?></td>
                <td><?php echo $mostrarSuma['totalEnEmplaquetado'] ?></td>
                <td><?php echo $mostrarSuma['totalEmplaquetados'] ?></td>
                <td><?php echo $mostrarSuma['totalRevision1'] ?></td>
                <td><?php echo $mostrarSuma['totalRevision2'] ?></td>
                <td><?php echo $mostrarSuma['totalEmpacados'] ?></td>
                
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
    
    <?php
    
    
}

?>
    
        
    
   
            
          
            

<?php




//condenado por session start malo }
//condenado por session start malo 
//condenado por session start malo else {
//condenado por session start malo   echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
//condenado por session start malo }
?>