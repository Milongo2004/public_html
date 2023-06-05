<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
 //$ActualizarDespuesDe = 60;
 
  $totalInventario=0;
    
    // Envíe un encabezado Refresh al navegador preferido.
   //header('Refresh: '.$ActualizarDespuesDe);
    $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
    $fechaActual = date ( 'Y-m-d' );
    
    $filtros = array();
    
    /*if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "Fecha BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }*/
    if ($fechaActual != ''){
            $filtros[]= "Fecha LIKE '$fechaActual%'";
    }
    
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    $consultaFiltros='select sum(juegos) as total FROM listaEmpaque WHERE ';
    
    $consultaSuma = 'select sum(juegos) as total FROM listaEmpaque WHERE ';
    
    $consultaSTARPLUS = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '643'";
    $resultSTARPLUS=mysqli_query($conexion, $consultaSTARPLUS);
            
            //echo $consultaSTARPLUS;
            //echo var_dump($filtros);
            
            while($mostrarSTARPLUS=mysqli_fetch_array($resultSTARPLUS)){
                $sumaSTARPLUS=$mostrarSTARPLUS['total'];
                $totalInventario=$totalInventario+$mostrarSTARPLUS['total'];
            }
            
    ////////////////
    
    $consultaRESISTAL = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '651'";
    $resultRESISTAL=mysqli_query($conexion, $consultaRESISTAL);
            
            //echo $consultaRESISTAL;
            //echo var_dump($filtros);
            
            while($mostrarRESISTAL=mysqli_fetch_array($resultRESISTAL)){
                $sumaRESISTAL=$mostrarRESISTAL['total'];
                $totalInventario=$totalInventario+$mostrarRESISTAL['total'];
            }
            
    ////////////
    
    $consultaUHLERPLUS = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '653'";
    $resultUHLERPLUS=mysqli_query($conexion, $consultaUHLERPLUS);
            
            //echo $consultaUHLERPLUS;
            //echo var_dump($filtros);
            
            while($mostrarUHLERPLUS=mysqli_fetch_array($resultUHLERPLUS)){
                $sumaUHLERPLUS=$mostrarUHLERPLUS['total'];
                $totalInventario=$totalInventario+$mostrarUHLERPLUS['total'];
            }
            
    /////////////
    $consultaREVEAL = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '652'";
    $resultREVEAL=mysqli_query($conexion, $consultaREVEAL);
            
            //echo $consultaREVEAL;
            //echo var_dump($filtros);
            
            while($mostrarREVEAL=mysqli_fetch_array($resultREVEAL)){
                $sumaREVEAL=$mostrarREVEAL['total'];
                $totalInventario=$totalInventario+$mostrarREVEAL['total'];
            }
            
    /////////////////////
    
    $consultaSTARDENT = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '641'";
    $resultSTARDENT=mysqli_query($conexion, $consultaSTARDENT);
            
            //echo $consultaSTARDENT;
            //echo var_dump($filtros);
            
            while($mostrarSTARDENT=mysqli_fetch_array($resultSTARDENT)){
                $sumaSTARDENT=$mostrarSTARDENT['total'];
                $totalInventario=$totalInventario+$mostrarSTARDENT['total'];
            }
            
    $consultaSTARVIT = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '642'";
    $resultSTARVIT=mysqli_query($conexion, $consultaSTARVIT);
            
            //echo $consultaSTARVIT;
            //echo var_dump($filtros);
            
            while($mostrarSTARVIT=mysqli_fetch_array($resultSTARVIT)){
                $sumaSTARVIT=$mostrarSTARVIT['total'];
                $totalInventario=$totalInventario+$mostrarSTARVIT['total'];
            }
            
    ///////////////////
    
    $consultaZENITH = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '654'";
    $resultZENITH=mysqli_query($conexion, $consultaZENITH);
            
            //echo $consultaZENITH;
            //echo var_dump($filtros);
            
            while($mostrarZENITH=mysqli_fetch_array($resultZENITH)){
                $sumaZENITH=$mostrarZENITH['total'];
                $totalInventario=$totalInventario+$mostrarZENITH['total'];
            }
            
    ////////////////
    
    $consultaNACIONAL = $consultaFiltros." ".implode(" AND ",$filtros) ." AND pedidoId = '682'";
    $resultNACIONAL=mysqli_query($conexion, $consultaNACIONAL);
            
            //echo $consultaZENITH;
            //echo var_dump($filtros);
            
            while($mostrarNACIONAL=mysqli_fetch_array($resultZENITH)){
                $sumaNACIONAL=$mostrarNACIONAL['total'];
                $totalInventario=$totalInventario+$mostrarNACIONAL['total'];
            }
            
    ////////////////
    
  echo $totalInventario

?>


<!DOCTYPE html>
<!--
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>inventarioDiario</title>
</head>
<body>

<table border="1">
            <tr>
               
              
                <td>INGRESADOS AL ALMACÉN</td>
                
            </tr>
            
         
            <tr>
                
                
                <td><CENTER><?php //echo $totalInventario ?></CENTER></td>
                
            </tr>
           
        </table>
        <br></br>
 </center>
</body>
</html>
-->
          
       
