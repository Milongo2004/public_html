
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
      
      $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $antPos = isset( $_POST['antPos'] ) ? $_POST['antPos'] : '';
    $uppLow = isset( $_POST['uppLow'] ) ? $_POST['uppLow'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $lote = isset( $_POST['lote'] ) ? $_POST['lote'] : '';
    $caja = isset( $_POST['caja'] ) ? $_POST['caja'] : '';
    $pedido = isset( $_POST['pedido'] ) ? $_POST['pedido'] : '';
    
    
    $filtros = array();
   if ($pedido != ''){
            $filtros[]= "pedido = '$pedido'";
    }
    if ($referencia != ''){
            $filtros[]= "mold = '$referencia'";
    }
    if ($antPos != ''){
            $filtros[]= "antPos = '$antPos'";
    }
    if ($uppLow != ''){
            $filtros[]= "uppLow = '$uppLow'";
    }
    if ($color != ''){
            $filtros[]= "shade LIKE '%$color%'";
    }
    if ($lote != ''){
            $filtros[]= "lote = '$lote'";
    }
    if ($caja != ''){
            $filtros[]= "caja = '$caja'";
    }
    
    if($filtros[0]=='' || is_null($filtros)){
        $filtros[0]="1 ";
    }
    
    $consultaFiltros='select listaEmpaque.*, pedidos2.`codigoP` AS pedido, clientes2.nombreCliente AS cliente FROM listaEmpaque INNER JOIN pedidos2 ON listaEmpaque.`pedidoId` = pedidos2.`idP` INNER JOIN clientes2 ON pedidos2.idCliente = clientes2.id WHERE ';
    
    
    
  
  ?>
 










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ListaGlobal</title>
    
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
        
        

    <h2>Lista de empaque global</h2>
    
    
      <div class="row">
            <form action="verTablaListasGeneral.php" method="POST">
            
            <div class="mb-3">
                    <label for="referencia" class="form-label">Referencia</label>
                    
                    <input type="text" class="form-control "  id="referencia" name="referencia" size="10">
                    
                    
                <label for="antPos" class="form-label">Ant/Pos</label>
                    <select class="form-select"  id="antPos" name="antPos" aria-label="Default select example">
                        <option selected></option>
                        <option value="ANT">ANT</option>
                        <option value="POS">POS</option>
                    
                    </select>
                    
                     <label for="uppLow" class="form-label">Sup/Inf</label>
                    <select class="form-select"  id="uppLow" name="uppLow" aria-label="Default select example">
                        <option selected></option>
                        <option value="SUP">SUP</option>
                        <option value="INF">INF</option>
                    
                    </select>
         
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control "  id="color" name="color" size="10">
                    
                    <label for="lote" class="form-label">Lote</label>
                    <input type="text" class="form-control "  id="lote" name="lote" size="10">
                    
                    <!--<label for="caja" class="form-label">Caja</label>
                    <input type="text" class="form-control "  id="caja" name="caja" size="10">-->
                    
                   <label for="pedido" class="form-label">Pedido</label>
                    <input type="text" class="form-control "  id="pedido" name="pedido" size="10">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    <br>
    
    <table border="1">
            <tr>
                <td>id</td>
                <td>MOLD</td>
                <td>ANT/POS</td>
                <td>UPP/LOW</td>
                <td>SHADE</td>
                <td>LOTE</td>
                <td>JUEGOS</td>
                <td>PEDIDO</td>
                <td>CLIENTE</td>
                <td>FECHA</td>
                <td>ACCIÓN</td>
                
            </tr>
            
             <?php
             
             if ($pedido != ''){
            echo "-pedido = '$pedido'";
    }
    if ($referencia != ''){
            echo "-mold = '$referencia'";
    }
    if ($antPos != ''){
            echo "-antPos = '$antPos'";
    }
    if ($uppLow != ''){
            echo "-uppLow = '$uppLow'";
    }
    if ($color != ''){
            echo "-shade = $color";
    }
    if ($lote != ''){
            echo "-lote = '$lote'";
    }
    if ($caja != ''){
            echo "-caja = '$caja'";
    }
             
             
            $sql=$consultaFiltros." ".implode(" AND ",$filtros) ." ORDER BY `id` DESC LIMIT 1000";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['mold'] ?></td>
                <td><?php echo $mostrar['antPos'] ?></td>
                <td><?php echo $mostrar['uppLow'] ?></td>
                <td><?php echo $mostrar['shade'] ?></td>
                <td><?php echo $mostrar['lote'] ?></td>
                <td><?php echo $mostrar['juegos'] ?></td>
                <td><?php echo $mostrar['pedido'] ?></td>
                <td><?php echo $mostrar['cliente'] ?></td>
                <td><?php echo $mostrar['Fecha'] ?></td>
                <td><a href="#" data-href="https://trazabilidadmasterdent.online/control/eliminar_pedido.php?id=<?php echo $mostrar['idP']; ?>" data-rg="<?= $mostrar['idP'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
                
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
                url: "https://trazabilidadmasterdent.online/control/eliminar_pedido.php",
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

<p>Cuando no se filtra se listan los ultimos 1000 registros de lista de empaque.</p>
    </center>
</body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>