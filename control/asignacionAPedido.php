<?php
//echo " en el presente programa se asignarán los ítems a un pedido específico, mostrando los juegos pedidos de cada referencia ingresada y comparando lo pedido con lo asignado para advertir con colores que si se pasa, si está ok o si falta todavía."

?>

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
    $juegosAsignados="";
    
   
        
   


// si los valores de referencia y color son diferentes de '' modifico las consultas.

    //echo "recibo valores de referencia, color y pedido";
    //echo $referencia.",";
    //echo $color.",";
    //echo $pedido;
    
    ?>
    
    <!DOCTYPE html>
<html lang="en">
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_seleccionPedido.php?destino=asignacion&Crear=Enviar'">Seleccion de pedido para asignación</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
<head>
	<meta charset="UTF-8">
	<title>AsignacionAPedido</title>
</head>
<body>
    <center>

    <?php
        //presento detalles del pedido a empacar
        //1. presento el nombre del pedido

        $sql2= "SELECT codigoP from pedidos2 WHERE idP ='". $pedido."'";
        $result2=mysqli_query($conexion,$sql2);

            ?>



        <h1>Producto terminado para asignar a pedido 

        
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

        $sql5= "SELECT SUM(revision2) AS totalAsignado FROM pedidoDetalles WHERE pedidoId ='". $pedido. "'";
        $result5=mysqli_query($conexion,$sql5);

            ?>



        <h3>Total juegos asignados al pedido: 

        
                 <?php

                while($mostrar5=mysqli_fetch_array($result5)){
                    $juegosAsignados=$mostrar5['totalAsignado'];
            ?>

            
                
                <td><?php echo $juegosAsignados; ?></td>
                
                
                
            
            <?php
            
            }
            ?>
            </h3>
            
             
            
            <br></br>
            <?php
          //selecciono las cajas para ver su contenido y agregar ítems.
            ?>
            
                    <div class="container mt-5">
        <h1>Asignar a Pedido</h1>
        <div class="row">
            <form action="formularioListas_digitaLote.php" method="get">
            
            
                     
                      <div class="mb-3">
                    <label for="metodo" class="form-label">Seleccionar Método de ingreso</label>
                    <select class="form-select" id="metodo" name="metodo" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="7">Uno a uno</option>
                        <option value="8">Grupal</option>
                        
                        
                        
                    </select>
                    <input name="caja" type="hidden" value="1">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;?>">
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
            
        </div>
        
        <br>    
        
           

    
                    <br>
    
    
        <br></br>
       
        <br>
        
        
    </div>
    
   

