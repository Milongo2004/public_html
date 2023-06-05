<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
 //$ActualizarDespuesDe = 60;
 
 $totalInventario=0;
    
    // Envíe un encabezado Refresh al navegador preferido.
   //header('Refresh: '.$ActualizarDespuesDe);
    $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
    
    $filtros = array();
    
    if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "Fecha BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    $consultaFiltros='select sum(juegos) as total FROM listaEmpaque WHERE ';
    
    $consultaSuma = 'select sum(juegos) as total FROM listaEmpaque WHERE ';
    
    $consultaSTARPLUS = $consultaFiltros." ".implode(" AND ",$filtros) ." AND codigoQR LIKE '107%' AND pedidoId = '831'";
    $resultSTARPLUS=mysqli_query($conexion, $consultaSTARPLUS);
            
            //echo $consultaSTARPLUS;
            //echo var_dump($filtros);
            
            while($mostrarSTARPLUS=mysqli_fetch_array($resultSTARPLUS)){
                $sumaSTARPLUS=$mostrarSTARPLUS['total'];
                $totalInventario=$totalInventario+$mostrarSTARPLUS['total'];
            }
            
    ////////////////
    
    $consultaRESISTAL = $consultaFiltros." ".implode(" AND ",$filtros) ." codigoQR LIKE '10%' AND codigoQR  NOT LIKE '107%' AND pedidoId = '831'";
    $resultRESISTAL=mysqli_query($conexion, $consultaRESISTAL);
            
            //echo $consultaRESISTAL;
            //echo var_dump($filtros);
            
            while($mostrarRESISTAL=mysqli_fetch_array($resultRESISTAL)){
                $sumaRESISTAL=$mostrarRESISTAL['total'];
                $totalInventario=$totalInventario+$mostrarRESISTAL['total'];
            }
            
    ////////////
    
    $consultaUHLERPLUS = $consultaFiltros." ".implode(" AND ",$filtros) ." AND codigoQR LIKE '9%' AND pedidoId = '831'";
    $resultUHLERPLUS=mysqli_query($conexion, $consultaUHLERPLUS);
            
            //echo $consultaUHLERPLUS;
            //echo var_dump($filtros);
            
            while($mostrarUHLERPLUS=mysqli_fetch_array($resultUHLERPLUS)){
                $sumaUHLERPLUS=$mostrarUHLERPLUS['total'];
                $totalInventario=$totalInventario+$mostrarUHLERPLUS['total'];
            }
            
    /////////////
    $consultaREVEAL = $consultaFiltros." ".implode(" AND ",$filtros) ." AND codigoQR LIKE '8%' AND pedidoId = '831'";
    $resultREVEAL=mysqli_query($conexion, $consultaREVEAL);
            
            //echo $consultaREVEAL;
            //echo var_dump($filtros);
            
            while($mostrarREVEAL=mysqli_fetch_array($resultREVEAL)){
                $sumaREVEAL=$mostrarREVEAL['total'];
                $totalInventario=$totalInventario+$mostrarREVEAL['total'];
            }
            
    /////////////////////
    
    $consultaSTARDENT = $consultaFiltros." ".implode(" AND ",$filtros) ." AND codigoQR LIKE '7%' AND pedidoId = '831'";
    $resultSTARDENT=mysqli_query($conexion, $consultaSTARDENT);
            
            //echo $consultaSTARDENT;
            //echo var_dump($filtros);
            
            while($mostrarSTARDENT=mysqli_fetch_array($resultSTARDENT)){
                $sumaSTARDENT=$mostrarSTARDENT['total'];
                $totalInventario=$totalInventario+$mostrarSTARDENT['total'];
            }
            
    $consultaSTARVIT = $consultaFiltros." ".implode(" AND ",$filtros) ." AND codigoQR LIKE '5%' AND pedidoId = '831'";
    $resultSTARVIT=mysqli_query($conexion, $consultaSTARVIT);
            
            //echo $consultaSTARVIT;
            //echo var_dump($filtros);
            
            while($mostrarSTARVIT=mysqli_fetch_array($resultSTARVIT)){
                $sumaSTARVIT=$mostrarSTARVIT['total'];
                $totalInventario=$totalInventario+$mostrarSTARVIT['total'];
            }
            
    ///////////////////
    
    $consultaZENITH = $consultaFiltros." ".implode(" AND ",$filtros) ." AND codigoQR LIKE '6%' AND pedidoId = '831'";
    $resultZENITH=mysqli_query($conexion, $consultaZENITH);
            
            //echo $consultaZENITH;
            //echo var_dump($filtros);
            
            while($mostrarZENITH=mysqli_fetch_array($resultZENITH)){
                $sumaZENITH=$mostrarZENITH['total'];
                $totalInventario=$totalInventario+$mostrarZENITH['total'];
            }
            
    ////////////////
    
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BodegaConsolidado</title>
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>

<center>
    <!--<h3><BASEFONT SIZE="20"><?php //echo $fechaActual = date ( 'Y-m-d' );?></h3>-->
    <h1>Inventario Bodega Consolidado</h1>
    
    
    
<div class="row">
            <form action="consolidadoBodega.php" method="POST">
            
            <div class="mb-3">
           
                    
                    <label for="fechaDesde" class="form-label">Desde</label>
                    <input type="Date" class="form-control" id="fechaDesde" name="fechaDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaHasta" name="fechaHasta" placeholder="Ingresa la fecha" >
                    
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
    <br></br>
    <?php
    if($fechaDesde != ''){
    echo "Ingreso a Bodega desde $fechaDesde hasta $fechaHasta";
    }
    ?>
    
        <table border="1">
            <tr>
                
                <td><H2>LÍNEA</H2></td>
                <td><H2>JUEGOS</H2></td>
                
               
                
            </tr>
            
            <?php
            
           
            
          
            
           
            ?>
            <tr>
                <td>STARPLUS</td>
                <td><?php echo $sumaSTARPLUS ?></td>
                
                      
            </tr>
            
            <tr>
                <td>RESISTAL</td>
                <td><?php echo $sumaRESISTAL ?></td>
                
                      
            </tr>
            
            <tr>
                <td>UHLERPLUS</td>
                <td><?php echo $sumaUHLERPLUS ?></td>
                
                      
            </tr>
            
            <tr>
                <td>REVEAL</td>
                <td><?php echo $sumaREVEAL ?></td>
                
                      
            </tr>
            
            <tr>
                <td>STARDENT</td>
                <td><?php echo $sumaSTARDENT ?></td>
                
                      
            </tr>
            
            <tr>
                <td>STARVIT</td>
                <td><?php echo $sumaSTARVIT ?></td>
                
                      
            </tr>
            
            <tr>
                <td>ZENITH</td>
                <td><?php echo $sumaZENITH ?></td>
                
                      
            </tr>

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
 

         <br>
<table border="1">
            <tr>
               
              
                <td>TOTAL JUEGOS</td>
                
            </tr>
            
         
            <tr>
                
                
                <td><CENTER><?php echo $totalInventario ?></CENTER></td>
                
            </tr>
           
        </table>
        <br></br>
 </center>
</body>
</html>

          
       
