<?php
  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  $sumaJuegos=0;
  $diferenciaTotal=0;
  $sumaProducidos=0;

    
            //consulta para crear un arreglo con las referencias y sus id
            
            $arregloReferencias= array();
            $gramosJuego=array();
            $capas=array();
            $tipo=array();
            
            $sqlReferencias= "SELECT id, nombre, gramosJuego, tipo, capas FROM referencias2 WHERE 1";
            $resultReferencias= mysqli_query($conexion,$sqlReferencias);
            
            while($mostrarReferencias=mysqli_fetch_array($resultReferencias)){
                $arregloReferencias[$mostrarReferencias['id']]=$mostrarReferencias['nombre'];
                $gramosJuego[$mostrarReferencias['id']]=$mostrarReferencias['gramosJuego'];
                $capas[$mostrarReferencias['id']]=$mostrarReferencias['capas'];
                $tipo[$mostrarReferencias['id']]=$mostrarReferencias['tipo'];
            }
            
            //consulta para guardar los colores y sus id en un arreglo
            
             $arregloColores= array();
            
            $sqlColores= "SELECT id, nombre FROM colores2 WHERE 1";
            $resultColores= mysqli_query($conexion,$sqlColores);
            
            while($mostrarColores=mysqli_fetch_array($resultColores)){
                $arregloColores[$mostrarColores['id']]=$mostrarColores['nombre'];
            }
            
            //consulta para guardar los pedidos y sus id en un arreglo
            
             $arregloPedidos= array();
            
            $sqlPedidos= "SELECT idP, codigoP FROM pedidos2 WHERE 1";
            $resultPedidos= mysqli_query($conexion,$sqlPedidos);
            
            while($mostrarPedidos=mysqli_fetch_array($resultPedidos)){
                $arregloPedidos[$mostrarPedidos['idP']]=$mostrarPedidos['codigoP'];
            }
            
            
            //obtengo los datos del formulario de filtrado
            
            $rotuloId = isset( $_POST['rotuloId'] ) ? $_POST['rotuloId'] : '';
            $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
            $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
            $tipoDato = isset( $_POST['tipo'] ) ? $_POST['tipo'] : '';
            $capasDato = isset( $_POST['capas'] ) ? $_POST['capas'] : '';
            $codigoP = isset( $_POST['codigoP'] ) ? $_POST['codigoP'] : '';
            $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
            $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
            $fechaProduccionDesde = isset( $_POST['fechaProduccionDesde'] ) ? $_POST['fechaProduccionDesde'] : '';
            $fechaProduccionHasta = isset( $_POST['fechaProduccionHasta'] ) ? $_POST['fechaProduccionHasta'] : '';
            
            
            $filtros=array();
            
            if ($rotuloId != ''){
            $filtros[]= "rotuloId = '$rotuloId'";
    }
    
    if ($referencia != ''){
        $referenciaId= array_search($referencia, $arregloReferencias);
            $filtros[]= "rotulos2.referenciaId = '$referenciaId'";
    }
    if ($color != ''){
        $colorId= array_search($color, $arregloColores);
            $filtros[]= "rotulos2.colorId = '$colorId'";
    }
    if ($tipoDato != ''){
            $filtros[]= "referencias2.tipo = '$tipoDato'";
    }
    if ($capasDato != ''){
        
            $filtros[]= "referencias2.capas = '$capasDato'";
    }
    if ($codigoP != ''){
        $idP= array_search($codigoP, $arregloPedidos);
            $filtros[]= "rotulos2.pedido = '$idP'";
    }
    if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "productoGranel.`fechaHora` BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    if ($fechaProduccionDesde != '' && $fechaProduccionHasta != ''){
            $filtros[]= "rotulos2.`fecha` BETWEEN '$fechaProduccionDesde%' AND '$fechaProduccionHasta%'";
    }
    
    
    
    //si el formulario llega vacio el Where sera = 1
    
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    
    //consultas para filtrado
    
    $consultaFiltros="SELECT productoGranel.*, rotulos2.referenciaId AS referencia, rotulos2.colorId as color, rotulos2.total AS producidos, rotulos2.pedido AS pedido, rotulos2.fecha AS fechaProduccion, referencias2.tipo AS tipo, referencias2.capas AS capas FROM productoGranel INNER JOIN rotulos2 ON productoGranel.rotuloId = rotulos2.id INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id WHERE ";
    
    $consultaSuma = "select sum(gramos) as totalGramos, COUNT(productoGranel.id) AS totalRegistros, rotulos2.referenciaId AS referencia, rotulos2.colorId as color FROM productoGranel INNER JOIN rotulos2 ON productoGranel.rotuloId = rotulos2.id INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id WHERE ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Granel</title>
    
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
    <title>Granel</title>
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_rotulo_granel.php'">Nuevo Rotulo</button>
    <!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/eliminarGranelRepetidos.php'">eliminar registros repetidos</button>-->
    
    <center>

    <h1>Producto a granel</h1>
    
    
<div class="row">
            <form action="../modulos/verTablaGranel.php" method="POST">
            
            <div class="mb-3">
                    <label for="rotuloId" class="form-label">ID Rotulo</label>
                    <input type="text" class="form-control "  id="rotuloId" name="rotuloId" autofocus style="width: 100px">
                    
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" class="form-control "  id="referencia" name="referencia" style="width: 100px">
                    
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control "  id="color" name="color" style="width: 100px">
                    
                    <label for="uppLow" class="form-label">Tipo</label>
                    <select class="form-select" autofocus id="tipo" name="tipo" aria-label="Default select example">
                        <option selected></option>
                        <option value="Diente">Diente</option>
                        <option value="Muela">Muela</option>
                    
                    </select>
                    
                    <label for="uppLow" class="form-label">Capas</label>
                    <select class="form-select" autofocus id="capas" name="capas" aria-label="Default select example">
                        <option selected></option>
                        <option value="2C">2C</option>
                        <option value="4C">4C</option>
                    
                    </select>
                    
                    <label for="codigoP" class="form-label">Pedido</label>
                    <input type="text" class="form-control "  id="codigoP" name="codigoP" style="width: 100px">
                    
                     <br></br>
                    <p>Fecha Producción</p>
                    <label for="fechaProduccionDesde" class="form-label">Desde</label>
                    <input type="Date" class="form-control" id="fechaProduccionDesde" name="fechaProduccionDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaProduccionHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaProduccionHasta" name="fechaProduccionHasta" placeholder="Ingresa la fecha" >
                
                    
                    <br></br>
                    <p>Fecha Ingreso Granel</p>
                    <label for="fechaDesde" class="form-label">Desde</label>
                    <input type="Date" class="form-control" id="fechaDesde" name="fechaDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaHasta" name="fechaHasta" placeholder="Ingresa la fecha" >
                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
    
    <br>
    
        <table border="1"> 
            <tr>
                <td>id</td>
                <td>ID Rotulo</td>
                <td>Referencia</td>
                <td>Color</td>
                <td>Tipo</td>
                <td>Capas</td>
                <td>Pedido</td>
                <td>GramosGranel</td>
                <td>JuegosGranel</td>
                <td>JuegosProducidos</td>
                <td>Diferencia</td>
                <td>FechaProducción</td>
                <td>fechaIngreso</td>
                
            </tr>
            
            <?php
             if ($referencia != ''){
       echo "Referencia = $referencia, ";
    }
    if ($color != ''){
         echo "Color = $color, ";
    }
    if ($tipoDato != ''){
             echo "Tipo = $tipoDato, ";
    }
    if ($capasDato != ''){
        
             echo "Capas = $capasDato, ";
    }
    if ($codigoP != ''){
         echo "Pedido = $codigoP, ";
    }
             
            if ($fechaDesde != '' && $fechaHasta != ''){
            echo "Poducción ingresada a Granel";
            echo " entre $fechaDesde y $fechaHasta, ";
            }
            if ($fechaProduccionDesde != '' && $fechaProduccionHasta != ''){
            echo "Producido";
            echo " entre $fechaProduccionDesde y $fechaProduccionHasta, ";
            }
            
           $sql= $consultaFiltros." ". implode(" AND ",$filtros) . " ORDER BY productoGranel.id DESC";
            
            $result=mysqli_query($conexion,$sql);
            //echo $sql;
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['rotuloId'] ?></td>
                <td><?php echo $arregloReferencias[$mostrar['referencia']] ?></td>
                <td><?php echo $arregloColores[$mostrar['color']] ?></td>
                <td><?php echo $tipo[$mostrar['referencia']] ?></td>
                <td><?php echo $capas[$mostrar['referencia']] ?></td>
                <td><?php echo $arregloPedidos[$mostrar['pedido']] ?></td>
                <td><?php echo $mostrar['gramos'] ?></td>
                
                <td><?php echo round($mostrar['gramos']/$gramosJuego[$mostrar['referencia']],1);
                
                if($mostrar['gramos']/$gramosJuego[$mostrar['referencia']]!=0 and !(is_null($gramosJuego[$mostrar['referencia']]))){
                $sumaJuegos=$sumaJuegos+round($mostrar['gramos']/$gramosJuego[$mostrar['referencia']]);
                    
                }
                else{
                echo "";
                }
                ?></td>
                <td><?php 
                $sumaProducidos=$sumaProducidos+$mostrar['producidos'];
                echo $mostrar['producidos'] ?></td>
                <td><?php 
                $diferencia=$mostrar['producidos']-(round($mostrar['gramos']/$gramosJuego[$mostrar['referencia']],1));
                $diferenciaTotal=$diferenciaTotal+$diferencia;
                echo round($diferencia,1) ?></td>
                <td><?php echo $mostrar['fechaProduccion'] ?></td>
                <td><?php echo $mostrar['fechaHora'] ?></td>
               
 <!--<td><a href="eliminar_lotes.php?id=<?php //echo $mostrar['id'];?>">Eliminar</a></td>
 <td><a href="editar_lotes.php?id=<?php //echo $mostrar['id'];?>">Editar</a></td>            -->
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
 
 
 <br></br>
 
 <table border="1">
            
            
            
            <tr>
                <td>TOTAL REGISTROS</td>
                <td>GRAMOS GRANEL</td>
                <td>JUEGOS GRANEL</td>
                <td>JUEGOS PRODUCIDOS</td>
                <td>DIFERENCIA TOTAL</td>
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros);
            //echo $sqlSuma;
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            //echo var_dump($sumaJuegos);
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                <td><?php echo $mostrarSuma['totalRegistros'] ?></td>
                <td><?php echo $mostrarSuma['totalGramos'] ?></td>
                <td><?php echo $sumaJuegos ?></td>
                <td><?php echo $sumaProducidos ?></td>
                <td><?php echo $diferenciaTotal ?></td>
               
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
 </center>
</body>
</html>

          
       
