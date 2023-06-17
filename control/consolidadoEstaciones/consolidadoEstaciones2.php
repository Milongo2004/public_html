<?php
//echo "bienvenido al consolidado por estaciones";

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
$fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';

if($fechaDesde=='' and $fechaHasta==''){
    $fechaDesde = date("Y-m-d");
    $fechaHasta = date("Y-m-d");
}

$pedidosEnProceso= array();
$idPedidosEnProceso= array();

$totalMoldeado=0;
$totalAcabado=0;
$totalSeparado=0;
$totalEmplaquetado=0;
$totalGranel=0;


$sqlPedidosEnProceso ="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE 1 AND pedidos2.`estado` LIKE '%enProceso%' AND pedidos2.`codigoP` NOT LIKE 'ATC%' AND pedidos2.`codigoP` NOT LIKE '000%' ORDER BY `idP` DESC LIMIT 200";

 $resultPedidosEnProceso=mysqli_query($conexion,$sqlPedidosEnProceso);
 
  while($mostrarPedidosEnProceso=mysqli_fetch_array($resultPedidosEnProceso)){
                $pedidosEnProceso[]=$mostrarPedidosEnProceso['codigoP'];
                $idPedidosEnProceso[]=$mostrarPedidosEnProceso['idP'];
            }
$cantidadDePedidosEnProceso=count($pedidosEnProceso);
//echo "número de pedidos en proceso = ".$cantidadDePedidosEnProceso;

//echo "/ pedidos en proceso = ";
/*
for ($i=0;$i<$cantidadDePedidosEnProceso;$i++){
    echo " - ".$pedidosEnProceso[$i];
    echo " * ".$idPedidosEnProceso[$i];
}
*/
//guardo el id de las estaciones requeridas en un arreglo.
$estaciones=array('1','2','3','4','7');

//consulto los rótulos de cada pedido que se encuentren en cada una de las estaciones. 

//creo un arreglo para guardar los rótulos del pedido que estén en cada estación.

$rotulosPedidoEstacion=array(array(array()));
$rotuloEstacion=array();
$sumatorias=array();

$totalPedido=array();




//un ciclo para recorrer los pedidos activos

for ($i=0;$i<$cantidadDePedidosEnProceso;$i++){
    
    $totalPedido[$idPedidosEnProceso[$i]]=0;
    //cada que iniciampos un ciclo para un pedido igualamos las sumas a 0
$sumaMoldeado=0;
$sumaAcabado=0;
$sumaSeparado=0;
$sumaEmplaquetado=0;
$sumaGranel=0;
   //un ciclo para recorrer las estaciones.
   for($j=0;$j<5;$j++){
       $sqlRotuloEstacion="SELECT * FROM `rotulos2` WHERE pedido='".$idPedidosEnProceso[$i]."' AND estacionId2='".$estaciones[$j]."' AND fechaActualizacion BETWEEN '".$fechaDesde."' AND '".$fechaHasta."'";
       //echo $sqlRotuloEstacion;
       
       $resultRotuloEstacion=mysqli_query($conexion,$sqlRotuloEstacion);
       
                while($mostrarRotuloEstacion=mysqli_fetch_array($resultRotuloEstacion)){
                    
                    //$rotuloEstacion[]=array($mostrarRotuloEstacion['id'],$mostrarRotuloEstacion['estacionId2']);
                    $rotuloEstacion[]=$mostrarRotuloEstacion['id'];
                    $rotulosPedidoEstacion[$idPedidosEnProceso[$i]][$estaciones[$j]][]=$mostrarRotuloEstacion['id'];
                
                
            }
            //$rotulosPedidoEstacion[$idPedidosEnProceso[$i]]=array();
            
            
            
            //dependiendo del valor de j consulto en detalles de esa estación la sumatoria de juegos de cada rótulo. 
            
            switch($j){
                    case 0://moldeado/programados
                    
                    //consulto uno por uno cada rótulo en detalles su sumatoria según esta estación y voy agregando el valor a la suma correspondiente
                    
                   
                    
                    foreach($rotuloEstacion as $rotuloId){
                    
                    $sqlSumatoria="SELECT SUM(programados) AS moldeado FROM pedidoDetalles WHERE rotuloId ='".$rotuloId."' and pedidoId ='".$idPedidosEnProceso[$i]."';";
                    
                    //echo $sqlSumatoria;
                    
                    $resultSumatoria=mysqli_query($conexion,$sqlSumatoria);
       
                while($mostrarSumatoria=mysqli_fetch_array($resultSumatoria)){
                    
                    //$rotuloEstacion[]=array($mostrarRotuloEstacion['id'],$mostrarRotuloEstacion['estacionId2']);
                    $sumaMoldeado=$sumaMoldeado+$mostrarSumatoria['moldeado'];
                    
                    
                    //$rotulosPedidoEstacion[$idPedidosEnProceso[$i]]=$sumaMoldeado;
                
                
                         }
                    
                    
                    }
                    $totalMoldeado=$totalMoldeado+$sumaMoldeado;
                    $sumatorias[$idPedidosEnProceso[$i]]['moldeado']=$sumaMoldeado;
                    
                    break;
                    case 1://acabado/producidos
                  
                      foreach($rotuloEstacion as $rotuloId){
                    
                    $sqlSumatoria="SELECT SUM(producidos) AS acabado FROM pedidoDetalles WHERE rotuloId ='".$rotuloId."' and pedidoId ='".$idPedidosEnProceso[$i]."';";
                    
                    //echo $sqlSumatoria;
                    
                    
                    $resultSumatoria=mysqli_query($conexion,$sqlSumatoria);
       
                while($mostrarSumatoria=mysqli_fetch_array($resultSumatoria)){
                    
                    //$rotuloEstacion[]=array($mostrarRotuloEstacion['id'],$mostrarRotuloEstacion['estacionId2']);
                    $sumaAcabado=$sumaAcabado+$mostrarSumatoria['acabado'];
                    
                    //$rotulosPedidoEstacion[$idPedidosEnProceso[$i]]=$sumaMoldeado;
                
                
                         }
                    
                    
                    }
                    $totalAcabado=$totalAcabado+$sumaAcabado;
                    $sumatorias[$idPedidosEnProceso[$i]]['acabado']=$sumaAcabado;
                    
                    break;
                    case 2://separado/pulidos
                    
                    
                    
                      foreach($rotuloEstacion as $rotuloId){
                    
                    $sqlSumatoria="SELECT SUM(pulidos) AS separado FROM pedidoDetalles WHERE rotuloId ='".$rotuloId."' and pedidoId ='".$idPedidosEnProceso[$i]."';";
                    
                    //echo $sqlSumatoria;
                    
                    
                    $resultSumatoria=mysqli_query($conexion,$sqlSumatoria);
       
                while($mostrarSumatoria=mysqli_fetch_array($resultSumatoria)){
                    
                    //$rotuloEstacion[]=array($mostrarRotuloEstacion['id'],$mostrarRotuloEstacion['estacionId2']);
                    $sumaSeparado=$sumaSeparado+$mostrarSumatoria['separado'];
                     
                    //$rotulosPedidoEstacion[$idPedidosEnProceso[$i]]=$sumaMoldeado;
                
                
                         }
                    
                    
                    }
                    $totalSeparado=$totalSeparado+$sumaSeparado;
                    $sumatorias[$idPedidosEnProceso[$i]]['separado']=$sumaSeparado;
                    
                    break;
                    case 3://emplaquetado/emplaquetados
                    
                     foreach($rotuloEstacion as $rotuloId){
                    
                    $sqlSumatoria="SELECT SUM(enEmplaquetado) AS emplaquetado FROM pedidoDetalles WHERE rotuloId ='".$rotuloId."' and pedidoId ='".$idPedidosEnProceso[$i]."';";
                    
                    //echo $sqlSumatoria;
                    
                    
                    $resultSumatoria=mysqli_query($conexion,$sqlSumatoria);
       
                while($mostrarSumatoria=mysqli_fetch_array($resultSumatoria)){
                    
                    //$rotuloEstacion[]=array($mostrarRotuloEstacion['id'],$mostrarRotuloEstacion['estacionId2']);
                     $sumaEmplaquetado=$sumaEmplaquetado+$mostrarSumatoria['emplaquetado'];
                    
                    //$rotulosPedidoEstacion[$idPedidosEnProceso[$i]]=$sumaMoldeado;
                
                
                         }
                    
                    
                    }
                     $totalEmplaquetado=$totalEmplaquetado+$sumaEmplaquetado;
                    $sumatorias[$idPedidosEnProceso[$i]]['emplaquetado']=$sumaEmplaquetado;
                    
                    
                    break;
                    case 4://granel/Separados
                    
                     foreach($rotuloEstacion as $rotuloId){
                    
                    $sqlSumatoria="SELECT SUM(separado) AS granel FROM pedidoDetalles WHERE rotuloId ='".$rotuloId."' and pedidoId ='".$idPedidosEnProceso[$i]."';";
                    
                    //echo $sqlSumatoria;
                    
                    
                    $resultSumatoria=mysqli_query($conexion,$sqlSumatoria);
       
                while($mostrarSumatoria=mysqli_fetch_array($resultSumatoria)){
                    
                    //$rotuloEstacion[]=array($mostrarRotuloEstacion['id'],$mostrarRotuloEstacion['estacionId2']);
                    $sumaGranel=$sumaGranel+$mostrarSumatoria['granel'];
                     
                    //$rotulosPedidoEstacion[$idPedidosEnProceso[$i]]=$sumaMoldeado;
                
                
                         }
                    
                    
                    }
                    $totalGranel=$totalGranel+$sumaGranel;
                    $sumatorias[$idPedidosEnProceso[$i]]['granel']=$sumaGranel;
                    
                    break;
                    
            }
        
   }
   
   $totalPedido[$idPedidosEnProceso[$i]]=$totalPedido[$idPedidosEnProceso[$i]]+$sumatorias[$idPedidosEnProceso[$i]]['moldeado']+$sumatorias[$idPedidosEnProceso[$i]]['acabado']+$sumatorias[$idPedidosEnProceso[$i]]['separado']+$sumatorias[$idPedidosEnProceso[$i]]['granel']+$sumatorias[$idPedidosEnProceso[$i]]['emplaquetado'];
   
   //vacio el arreglo de los rotulos de esa estación para que en el próximo comience de cero. 
            
            foreach($rotuloEstacion as $rotuloId){
                unset($rotuloId);
            }
   
}






//filtro correspondiente a la fecha de ingreso a la estación.

  $filtros = array();
  
  
  if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "rotuloestaciones2.`ingreso` BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    
    //var_dump($rotulosPedidoEstacion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ConsolidadoEstaciones</title>
</head>
<body>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    
    <?php
    //echo "movimientos de la estación" . $estacion;
    ?>
    
    <center>
        
        <H1>Consolidado de juegos por estación</H1>
         
        
        <div class="row">
            <form action="consolidadoEstaciones2.php" method="POST">
            
            <div class="mb-3">
                
                   
                 
                    
                    <label for="fechaDesde" class="form-label">Ingresado Desde</label>
                    <input type="Date" class="form-control" id="fechaDesde" name="fechaDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaHasta" name="fechaHasta" placeholder="Ingresa la fecha" >
                    
                    <br></br>
                    
                   
                   
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    
<br>

<p>Producción en las estaciones entre el <?php echo $fechaDesde. " y el ".$fechaHasta?></p>
        
        <table border="1">
            <tr>
                <td>Id</td>
                <td>CódigoPedido</td>
                <td>Moldeado</td>
                <td>Acabado</td>
                <td>Separado</td>
                <td>Granel</td>
                <td>Emplaquetado</td>
                <td>Total</td>
                
            </tr>
            <?php
             for ($i=0;$i<$cantidadDePedidosEnProceso;$i++){
            ?>
            <tr>
                
                <td><?php echo $idPedidosEnProceso[$i] ?></td>
                <td><?php echo $pedidosEnProceso[$i] ?></td>
                <td><?php echo $sumatorias[$idPedidosEnProceso[$i]]['moldeado'] ?></td>
                <td><?php echo $sumatorias[$idPedidosEnProceso[$i]]['acabado'] ?></td>
                <td><?php echo $sumatorias[$idPedidosEnProceso[$i]]['separado'] ?></td>
                <td><?php echo $sumatorias[$idPedidosEnProceso[$i]]['granel'] ?></td>
                <td><?php echo $sumatorias[$idPedidosEnProceso[$i]]['emplaquetado'] ?></td>
                <td><?php echo $totalPedido[$idPedidosEnProceso[$i]] ?></td>
                
                
            </tr>
            <?php
            }
            ?>
            
              </table>
        <br></br>
        
         <table border="1">
             
             <tr>
            <td colspan = "5"><center>TOTALES</center></td>
            </tr>
            
            <tr>
                
                <td>MOLDEADO</td>
                <td>ACABADO</td>
                <td>SEPARADO</td>
                <td>GRANEL</td>
                <td>EMPLAQUETADO</td>
                
                
            </tr>
           
            <?php
             
            ?>
            <tr>
                
                <td><?php echo $totalMoldeado ?></td>
                <td><?php echo $totalAcabado ?></td>
                <td><?php echo $totalSeparado ?></td>
                <td><?php echo $totalGranel ?></td>
                <td><?php echo $totalEmplaquetado ?></td>
                
               
            </tr>
           
            
              </table>
              
            <?php
            /*
            //método para evaluar los rótulos que quedan almacenados en el arreglo de cada pedido y estación. 
            echo "estos son los roótulos del pedido".$idPedidosEnProceso[10]."en la estación de". $estaciones[4]."= ";
            $numeroDeRotulos=count($rotulosPedidoEstacion[$idPedidosEnProceso[10]][$estaciones[4]]);
            for($i=0;$i<$numeroDeRotulos;$i++){
                echo $rotulosPedidoEstacion[$idPedidosEnProceso[10]][$estaciones[4]][$i];
                echo "-";
            }
            */
            ?>
            
            
            
             </center>
</body>
</html>    