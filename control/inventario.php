<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    $pedido=$_GET ["pedidoId"];
    if(is_null($pedido)){
        $pedido=$_GET['pedido'] ;
        if(is_null($pedido)){
        $pedido=$_POST['pedido'] ;
    }
    }
    $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $antPos = isset( $_POST['antPos'] ) ? $_POST['antPos'] : '';
    $uppLow = isset( $_POST['uppLow'] ) ? $_POST['uppLow'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $lote = isset( $_POST['lote'] ) ? $_POST['lote'] : '';
    $caja = isset( $_POST['caja'] ) ? $_POST['caja'] : '';
    $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
    
    
    
    
   $filtros = array();
   if ($pedido != ''){
            $filtros[]= "pedidoId = '$pedido'";
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
    if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "Fecha BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    if (is_null($filtros[0])){
        $filtros[]="1";
    }
    
    $consultaFiltros='select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE ';
    
    $consultaSuma = 'select sum(juegos) as total FROM listaEmpaque WHERE ';
    
    $juegosPedido="";
    $juegosEmpacados="";
    
   
        
   


// si los valores de referencia y color son diferentes de '' modifico las consultas.

    //echo "recibo valores de referencia, color y pedido";
    //echo $referencia.",";
    //echo $color.",";
    //echo $pedido;
    
    ?>
    
    <!DOCTYPE html>
<html lang="en">
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_seleccionPedido.php?destino=inventario&Crear=Enviar'">Seleccion de Inventario</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
<head>
	<meta charset="UTF-8">
	<title>Inventario</title>
</head>
<body>
    <center>

    <?php
        //presento detalles del pedido a empacar
        //1. presento el nombre del pedido

        $sql2= "SELECT codigoP from pedidos2 WHERE idP ='". $pedido."'";
        $result2=mysqli_query($conexion,$sql2);

            ?>



        <h1>Inventario de 

        
                 <?php

                while($mostrar2=mysqli_fetch_array($result2)){
            ?>

            
                
                <td><?php echo $mostrar2['codigoP'] ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h1>
            
            
            
            
            <?php
            
            //presento la cantidad de juegos de inventario de la línea.

        $sql5= "SELECT SUM(juegos) AS totalEmpacado FROM listaEmpaque WHERE pedidoId ='". $pedido. "'";
        $result5=mysqli_query($conexion,$sql5);

            ?>



        <h3>Total juegos inventario: 

        
                 <?php

                while($mostrar5=mysqli_fetch_array($result5)){
                    $juegosEmpacados=$mostrar5['totalEmpacado'];
            ?>

            
                
                <td><?php echo $juegosEmpacados; ?></td>
                
                
                
            
            <?php
            // a continuación presento los juegos que faltan por empacar
            }
            ?>
            </h3>
            
             
            
            <br></br>
            <?php
          //selecciono las cajas para ver su contenido y agregar ítems.
            ?>
            
                    <div class="container mt-5">
        <h1>Empacar pedido</h1>
        <div class="row">
            <form action="formularioListas_digitaLote.php" method="get">
            
            <div class="mb-3">
                    <label for="caja" class="form-label">Seleccione una caja para ver su contenido o agregar ítems</label>
                    <select class="form-select" id="caja" name="caja" autofocus aria-label="Default select example">
                        <option selected>Selecciona una caja</option>
                    <?php
                        $sql1="SELECT COUNT(id),id, pedidoId, caja FROM listaEmpaque WHERE pedidoId ='". $pedido. "'"." GROUP BY caja";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                       
                          echo '<option value="'.$mostrar["caja"].'">'.$mostrar["caja"].'</option>';
                    ?>
                    <?php
                    //abajo del </select> envío la variable de pedido oculta en el formulario 
                        }
                    ?>
                    <option value="0">NuevaCaja</option>
                    </select>
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;?>">
                        
                    
                     </div>
                     <br>
                     
                      <div class="mb-3">
                    <label for="metodo" class="form-label">Seleccionar Método de ingreso</label>
                    <select class="form-select" id="metodo" name="metodo" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="5">Uno a uno</option>
                        <option value="6">Grupal</option>
                        
                        
                        
                    </select>
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
            
        </div>
        
        <br>    
        
           

    <h2>Lista General del inventario</h2>
    
    <!--inserto los filtros de búsqueda por referencia y color-->
    
    <div class="row">
            <form action="inventario.php" method="POST">
            
            <div class="mb-3">
                    <label for="referencia" class="form-label">Referencia</label>
                    
                    <input type="text" class="form-control "  id="referencia" name="referencia" style="width: 100px">
                    
                    
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
                    <input type="text" class="form-control "  id="color" name="color" style="width: 80px">
                    
                    
                    <label for="lote" class="form-label">Lote</label>
                    <input type="text" class="form-control "  id="lote" name="lote" style="width: 100px">
                    
                    <label for="caja" class="form-label">Caja</label>
                    <input type="text" class="form-control "  id="caja" name="caja" style="width: 50px">
                    
                     <br></br>
                    
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
                    <br>
    
    <table border="1">
            <tr>
                <!--<td>id</td>-->
                <td>QR</td>
                <td>MOLD</td>
                <td>ANT/POS</td>
                <td>UPP/LOW</td>
                <td>SHADE</td>
                <td>LOTE</td>
                <td>BOX</td>
                <td>TOTAL</td>
                <!--<td>FECHA</td>-->
                
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow ORDER BY mold;";
            
            $encabezados="Fecha del Documento;Tipo Transacción;Número del Documento;Cliente Acreedor;Bodega;Referencia;Código del Concept0;Documento Destino;Concepto de Pago;Tipo Iva;Cantidad;Precio;Total Descuento;Centro de Costo";
            $var="";
            $sql=$consultaFiltros." ". implode(" AND ",$filtros) ." GROUP BY mold, shade, lote, uppLow ORDER BY mold;";
            $result=mysqli_query($conexion,$sql);
            
            //echo $sql;
            //echo var_dump($filtros);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['codigoQR'] ?></td>
                <td><?php echo $mostrar['mold'] ?></td>
                <td><?php echo $mostrar['antPos'] ?></td>
                <td><?php echo $mostrar['uppLow'] ?></td>
                <td><?php echo $mostrar['shade'] ?></td>
                <td><?php echo $mostrar['lote'] ?></td>
                <td><?php echo $mostrar['caja'] ?></td>
                <td><?php echo $mostrar['total'] ?></td>
                <!--<td><?php //echo $mostrar['Fecha'] ?></td>-->
                
            </tr>
            <?php
            
            $var .= $mostrar['codigoQR'].”;”.$mostrar['mold'].”;”. $mostrar['uppLow']."\n";
            
            }
            ?>
        </table>
        <br></br>
         <table border="1">
            <tr>
               
                <td>TOTAL JUEGOS</td>
                
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
                
                <td><?php echo $mostrarSuma['total'] ;
                //$juegosEmpacados=$mostrarSuma['total']?></td>
                
            </tr>
            <?php
            }
            
            
            ?>
        </table>
        <br></br>
        
        
    </div>
    
    <?php
    
  function accion(){
header("Content-Description: File Transfer");
header("Content-Typ: application/force-download");
//header("Content-Disposition: attachment; filename=archivo.csv");
echo $encabezados." ".$var;
  }
  /*
  function acciondos(){
    echo 19;
  }
  */
?>

<input type="submit" name="" value="Exportar" id="boton1" onclick = "funcion();">
<script>
  function funcion(){
    //alert('<?php echo accion(); ?>');
    //alert(<?php //echo acciondos(); ?>);
    /* Escribir en el Documento*/
    document.write('<?php echo accion(); ?>');
    //document.write(<?php echo acciondos(); ?>);
  }
</script>

    <br>
    
    
    
    </center>
    
</body>
</html>
<?php
    
?>