<?php
  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
 $ActualizarDespuesDe = 60;
 
    
    // Envíe un encabezado Refresh al navegador preferido.
   header('Refresh: '.$ActualizarDespuesDe);

$meta=860;
$puntos=0;//asigno un valor en puntos a los juegos especialmente a los de starplus para igualar las cargas de trabajo. 
$metaStarPlus=720;
$metaGeneral=6020;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terminación</title>
    
    <!---->
    <!--<link rel="stylesheet" href="cssProyecto/estilosTablas.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <link href="cssProyecto/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="cssProyecto/slide.css">
    <!--bootstrap-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../resources/estilos.css">
    <!--Fin-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TableroTerminación</title>
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>

<center>
    <h2>RENDIMIENTO TERMINACIÓN</h2>
    <h3><BASEFONT SIZE="20"><?php echo $fechaActual = date ( 'Y-m-d' );?></h3>
    
    

    
        <table border="1">
            <tr>
                
                <td><H2>NOMBRE</H2></td>
                <td><H2>EMPLAQUETADOS</H2></td>
                <td><H2>CUMPLIMIENTO (%)</H2></td>
               
                
            </tr>
            
            <?php
            
           
            
            $sql="SELECT emplaquetadores.*, (SELECT SUM(seguimientoEmplaquetado.puntos) FROM seguimientoEmplaquetado WHERE seguimientoEmplaquetado.emplaquetador = emplaquetadores.id AND seguimientoEmplaquetado.fechaHora LIKE '".$fechaActual."%') AS puntosTotales, (SELECT SUM(seguimientoEmplaquetado.juegos) FROM seguimientoEmplaquetado WHERE seguimientoEmplaquetado.emplaquetador = emplaquetadores.id AND seguimientoEmplaquetado.fechaHora LIKE '".$fechaActual."%') AS juegosTotales FROM emplaquetadores INNER JOIN seguimientoEmplaquetado ON emplaquetadores.id = seguimientoEmplaquetado.emplaquetador where categoria='INTERNO' AND seguimientoEmplaquetado.fechaHora LIKE '".$fechaActual."%' group by emplaquetadores.nombre order by juegosTotales desc ";
            //echo $sql;
            $result=mysqli_query($conexion,$sql); 
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['nombre'] ?></td>
                <td><center><?php echo $mostrar['juegosTotales'] ?></center></td>
                <td><center><?php 
                
                if ($mostrar['nombre']=='MILEIDY MONTOYA'){
                    echo round(($mostrar['puntosTotales']/672)*100);
                }
                else{
                
                echo round($mostrar['puntosTotales']/$meta*100);
                }
                
                ?></center></td>
                      
</tr>
<?php

}
?>
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
                <td>CUMPLIMIENTO GENERAL (%)</td>
                <td>INGRESADOS AL ALMACÉN</td>
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma="SELECT emplaquetadores.*, SUM(juegos) AS total FROM seguimientoEmplaquetado INNER JOIN emplaquetadores ON emplaquetadores.id = seguimientoEmplaquetado.emplaquetador where categoria='INTERNO' AND seguimientoEmplaquetado.fechaHora LIKE '".$fechaActual."%'";
            //echo $sqlSuma;
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                
                <td><CENTER><?php echo $mostrarSuma['total'] ?></CENTER></td>
                <td><CENTER><?php echo round($mostrarSuma['total']/$metaGeneral*100) ?></CENTER></td>
                <td><CENTER><?php require_once("inventarioDiario.php"); ?></CENTER></td>
                
            </tr>
            <?php
            
            }
            ?>
        </table>
        <br></br>
 </center>
</body>
</html>

          
       
