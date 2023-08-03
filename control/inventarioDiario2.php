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
            $filtros[]= "fechaCreacion LIKE '$fechaActual%'";
    }
    
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    $consultaFiltros='select sum(revision2) as total FROM pedidoDetalles WHERE revision2>=0 AND ';
    
    $consultaSuma = 'select sum(revision2) as total FROM pedidoDetalles WHERE ';
    
    $consultaGeneral = $consultaFiltros." ".implode(" AND ",$filtros);
    //echo $consultaGeneral;
    $resultGeneral=mysqli_query($conexion, $consultaGeneral);
            
            //echo $consultaSTARPLUS;
            //echo var_dump($filtros);
            
            while($mostrarGeneral=mysqli_fetch_array($resultGeneral)){
                $sumaGeneral=$mostrarGeneral['total'];
                $totalInventario=$totalInventario+$mostrarGeneral['total'];
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
          
       
