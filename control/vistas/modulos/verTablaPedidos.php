
<?php
  
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
  
  }
  
  if($rol==1 OR $rol==3 ){
    
    $idP = isset( $_POST['idP'] ) ? $_POST['idP'] : '';
    $codigoP = isset( $_POST['codigoP'] ) ? $_POST['codigoP'] : '';
    $nota = isset( $_POST['nota'] ) ? $_POST['nota'] : '';
    $cliente = isset( $_POST['cliente'] ) ? $_POST['cliente'] : '';
    $linea = isset( $_POST['linea'] ) ? $_POST['linea'] : '';
    $categoria = isset( $_POST['categoria'] ) ? $_POST['categoria'] : '';
    $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
  
  $filtros = array();
   if ($idP != ''){
            $filtros[]= "idP = '$idP'";
    }
    if ($codigoP != ''){
            $filtros[]= "codigoP = '$codigoP'";
    }
    if ($nota != ''){
            $filtros[]= "nota LIKE '$nota%'";
    }
    if ($cliente != ''){
            $filtros[]= "clientes2.`nombreCliente` LIKE '%$cliente%'";
    }
    if ($linea != ''){
        if ($linea=="NULL"){
            $filtros[]="1";
        }
        else{
        
            $filtros[]= "linea = '$linea'";
        }
    }
    
    if ($categoria != ''){
        if ($categoria=="NAL"){
            $filtros[]= "codigoP LIKE 'ATC%'";
        }
        else{
        $filtros[]= "codigoP NOT LIKE 'ATC%'";
        }
    }
    if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "pedidos2.`fechaCreacion` BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    $consultaFiltros="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE";
    
    $consultaSuma = 'select sum(juegosTotales) as total, clientes2.`nombreCliente` AS cliente FROM pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` WHERE ';
    
    
  
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    
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
    
    
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
<center>
    <h1>Pedidos</h1>
    
    <br>
    
    <div class="row">
            <form action="../modulos/verTablaPedidos.php" method="POST">
            
            <div class="mb-3">
                    <label for="idP" class="form-label">id</label>
                    <input type="text" class="form-control "  id="idP" name="idP" style="width: 50px">
                    
                    <label for="codigoP" class="form-label">CódigoP</label>
                    <input type="text" class="form-control "  id="codigoP" name="codigoP" style="width: 100px">
                    
                    <label for="nota" class="form-label">Alias</label>
                    <input type="text" class="form-control "  id="nota" name="nota" style="width: 100px">
                    
                    <label for="cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control "  id="cliente" name="cliente" style="width: 100px">
                    
                    
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
                   
                    
                    
                <label for="categoria" class="form-label">NAL/INT</label>
                    <select class="form-select" autofocus id="categoria" name="categoria" aria-label="Default select example">
                        <option selected></option>
                        <option value="NAL">NACIONAL</option>
                        <option value="INT">INTERNACIONAL</option>
                    
                    </select>
                    
                    <br></br>
                    
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
                <td>Código Pedido</td>
                <td>Alias</td>
                <td>Cliente</td>
                <td>Línea</td>
                <td>J. Pedidos</td>
                <td>J. Programados</td>
                <td>J. Empacados</td>
                <td>fechaCreacion</td>
                <!--<td>fechaActualizacion</td>-->
                <td>Acción</td>
                <td>Acción</td>
                <td>Ítems</td>
            </tr>
            
            <?php
            
            echo "Pedidos realizados";
            if ($fechaDesde != '' && $fechaHasta != ''){
            echo " entre $fechaDesde y $fechaHasta";
            }
            //consulto la suma de los juegos programados de la tabla pedidoDetalles
            
            $sumaProgramados=array();
            
            $sqlProgramados= "SELECT pedidoId, SUM(programados) AS programados from pedidoDetalles GROUP by pedidoId order by pedidoId DESC";
            $resultProgramados=mysqli_query($conexion,$sqlProgramados);
            
            while($mostrarProgramados=mysqli_fetch_array($resultProgramados)){
                $sumaProgramados[$mostrarProgramados['pedidoId']]=$mostrarProgramados['programados'];
            }
            
            $totalProgramados=0;
            
            //consulto la suma de los juegos programados de la tabla pedidoDetalles
            
            $sumaEmpacados=array();
            
            $sqlEmpacados= "SELECT pedidoId, SUM(juegos) AS empacados from listaEmpaque GROUP by pedidoId order by pedidoId DESC";
            $resultEmpacados=mysqli_query($conexion,$sqlEmpacados);
            
            while($mostrarEmpacados=mysqli_fetch_array($resultEmpacados)){
                $sumaEmpacados[$mostrarEmpacados['pedidoId']]=$mostrarEmpacados['empacados'];
            }
            
            $totalEmpacados=0;
            
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." ORDER BY `idP` DESC LIMIT 200";
            $result=mysqli_query($conexion,$sql);
            //echo $sql;
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['idP'] ?></td>
                <td><?php echo $mostrar['codigoP'] ?></td>
                <td><?php echo $mostrar['nota'] ?></td>
                <td><?php echo substr ($mostrar['cliente'],0,30) ?></td>
                <td><?php echo $mostrar['linea'] ?></td>
                
                <td><?php echo $mostrar['juegosTotales'] ?></td>
                <td bgcolor= "<?php if($sumaProgramados[$mostrar['idP']]>$mostrar["juegosTotales"]*1.25){
                echo "B6FF8A";
                }?>"><?php 
                if(is_null ($sumaProgramados[$mostrar['idP']])){
                    echo "0";
                }
                else{
                    echo $sumaProgramados[$mostrar['idP']];
                    $totalProgramados=$totalProgramados+$sumaProgramados[$mostrar['idP']];
                }
                
                
                ?></td>
                
                
                <td bgcolor= "<?php if($sumaEmpacados[$mostrar['idP']]>=$mostrar["juegosTotales"]){
                echo "B6FF8A";
                }?>"><?php 
                if(is_null ($sumaEmpacados[$mostrar['idP']])){
                    echo "0";
                }
                else{
                    echo $sumaEmpacados[$mostrar['idP']];
                    $totalEmpacados=$totalEmpacados+$sumaEmpacados[$mostrar['idP']];
                }
                
                
                ?></td>
                
                
                
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                <!--<td><?php //echo $mostrar['fechaActualizacion'] ?></td>-->
                
                <td><a href="../../editar_pedido.php?id=<?php echo $mostrar['idP']; ?> ">Editar</a></td>
                <td><a href="../../eliminar_pedido.php?id=<?php echo $mostrar['idP']; ?> ">Eliminar</a></td>
                <td><a href="../../trazarPedido.php?id=<?php echo $mostrar['idP']; ?> "  >Ver Ítems</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
        <table border="1">
            
            <tr>
            <td colspan = "3"><center>JUEGOS TOTALES</center></td>
            </tr>
            
            <tr>
                
                <td>PEDIDOS</td>
                <td>PROGRAMADOS</td>
                <td>EMPACADOS</td>
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros);
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                
                <td><?php echo $mostrarSuma['total'] ?></td>
                <td><?php echo $totalProgramados ?></td>
                <td><?php echo $totalEmpacados ?></td>
                
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
                url: "../control/editar_pedido.php",
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

        
        <script type="text/javascript">
        $(document).on("click", "#delRg", function(event) {
            event.preventDefault();

            let ifRegistro = $(this).attr('data-rg');

            $.ajax({
                url: "../control/eliminar_pedido.php",
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




        <script type="text/javascript">
        $(document).on("click", "#delRg", function(event) {
            event.preventDefault();

            let ifRegistro = $(this).attr('data-rg');

            $.ajax({
                url: "../control/trazarPedido.php",
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

    <br></br>
    </center>
</body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>