<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
   
   $moldesPrensada=null;
   $lote=null;
   
//obtengo los datos del formulario anterior
    
    $fecha=$_POST ["fecha"];
    $turno=$_POST ["turno"];
    $prensada=$_POST ["prensada"];
    $lote=$_POST ["lote"];
    $pedido=$_POST ["pedido"];
    $color=$_POST ["color"];
    
    //si la fecha obtenida por post es null los datos vienen de la herramienta por el método get
    
    if(is_null($fecha)){
        $fecha=$_GET ["fecha"];
        $turno=$_GET ["turno"];
        $prensada=$_GET ["prensada"];
        $lote=$_GET ["lote"];
        $pedido=$_GET ["pedido"];
        $color=$_GET ["color"];
    }
    
    
      
/*var_dump($fecha);
var_dump($turno);
var_dump($prensada);
var_dump($lote);
var_dump($pedido);*/

//limito el tamaño de los datos

$fecha = substr($fecha, int -12);
$turno = substr($turno, int -10);
$prensada = substr($prensada, int -2);
$lote = substr($lote, int -11);
$pedido = substr($pedido, int -11);
$color = substr($color, int -11);

//elimino los espacios en blanco del string turno.

$turno=trim($turno," ");

//echo "después de limitar el tamaño de los datos";

/*var_dump($fecha);
var_dump($turno);
var_dump($prensada);
var_dump($lote);
var_dump($pedido);*/

      
      
//consulto los datos del lote y del pedido a partir del id obtenido

	//consulto el id y el nombre del lote

		$sql3="SELECT * FROM lotes2  WHERE `colorId2` = '". $color. "' ORDER BY `id` DESC LIMIT 1";

$result3=mysqli_query($conexion,$sql3);

while($mostrar3=mysqli_fetch_array($result3)){
                    $nombreLote=$mostrar3['nombreL'];
                    $lote=$mostrar3['id'];
                    
                   }
//agrego estas líneas para cuando los colores son N,M u otros que no tengan lote
/*
if (is_null($lote)){
    $lote=0;
    $nombreLote="";
}
//no funcional
*/
//consulto el nombre del pedido

		$sql4="SELECT codigoP from pedidos2 WHERE idP = '". $pedido. "'";

$result4=mysqli_query($conexion,$sql4);

while($mostrar4=mysqli_fetch_array($result4)){
                    $nombrePedido=$mostrar4['codigoP'];   
                       
                   }
                   
                   //consulto el nombre del color

		$sql5="SELECT nombre from colores2 WHERE id = '". $color. "'";

$result5=mysqli_query($conexion,$sql5);

while($mostrar5=mysqli_fetch_array($result5)){
                    $nombreColor=$mostrar5['nombre'];
                       
                   }


           //a continuación consulto el total de moldes de la prensada actual.
           
           $sqlC="SELECT SUM(cantidadMoldes) AS total FROM rotulos2 WHERE rotulos2.`fecha` = '".$fecha."' AND rotulos2.`turno` LIKE '%".$turno."%' AND rotulos2.`prensada` = '".$prensada."' ";
            $resultC=mysqli_query($conexion,$sqlC);
            
            while($mostrarC=mysqli_fetch_array($resultC)){
            $moldesPrensada=$mostrarC['total'];
            }

?>

<!DOCTYPE html>
<html lang="en">
    
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

    
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/progProduccion2.php?fecha=<?php echo $fecha?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>'">Cambiar prensada/turno/fecha</button>
    	<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/cambiarPrensada.php?turno=<?php //echo $turno?>&fecha=<?php //echo $fecha?>">Cambiar prensada</button>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/cambiarTurno.php?prensada=<?php //echo $prensada?>&fecha=<?php //echo $fecha?> ">Cambiar Turno</button>-->
    	
			
			
			<html lang="en">
			    
			    <body>
			        
			        <div class="row">
            <form action="progProduccion3.php" method="GET" name="cambiarPedidoLote">

                <div class="mb-3">

                    
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha;  
                    ?>">
                      <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>Cambiar Pedido / Color </button>
                <br>
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('cambiarPedidoLote').submit();
    }
</script>
<head>
    <meta charset="UTF-8">
    <title>Programación</title>
    
    
    
    
</head>
<body>
    
    
    
    <center>
        
        <h2 style="color: blue ">Prensadas del día: <?php echo $fecha?> </h2>
        <h2>Turno:  <?php echo $turno ?></h2>
        
        <div class="container mt-5">
        <!--<h1>Datos generales</h1>-->
        <h2>Color/Lote:  <?php echo $nombreColor." / ".$nombreLote ?></h2>
        <h2>Pedido:  <?php echo $nombrePedido ?> </h2>
        
        <div class="row">
            
            <form action="https://trazabilidadmasterdent.online/control/creaRotulo2.php" method="POST">
        
         <div class="mb-3">
                    <label for="refs" class="form-label">Seleccionar referencia*</label>
                    <select class="form-select" autofocus id="refs" name="referencia" aria-label="Default select example">
                        <option selected>Selecciona una referencia</option>
                    <?php
                        $sql1="SELECT * from referencias2 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"]." / Moldes Totales: ".$mostrar["totalMoldes"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>

        </div>
        <br>
        <div class="mb-3">
                    <label for="num_moldes" class="form-label">Número de moldes*</label>
                    <input type="text" class="form-control" id="num_moldes" name="num_moldes" placeholder="Digita cantidad de moldes">
                </div>
                <br>
                <div class="mb-3">
                    <label for="nota" class="form-label">Nota</label>
                    <input type="text" class="form-control" id="nota" name="nota" placeholder="Dato para recordar">

                    
                     <input name="fecha" type="hidden" value=" <?php
                        echo $fecha;  
                    ?>">
                      <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                     <input name="lote" type="hidden" value=" <?php
                        echo $lote; 
                    ?>">
                     <input name="pedido" type="hidden" value=" <?php
                        echo $pedido; 
                    ?>">
                     </div>
                     <input name="color" type="hidden" value=" <?php
                        echo $color; 
                    ?>">
                     </div>
        <br>
        
        
                <br>
                <input type="submit" name="Crear" >
            </form>
        </div>
        
                
        <h1>Prensada:  <?php echo $prensada ?> Moldes:  <?php echo$moldesPrensada?> </h1>
    
    <br>

    
        <table border="1">
            <tr>
                <!--<td>id</td>-->
                <td>Fecha</td>
                <td>Prensada</td>
                <td>Pedido</td>
                <td>Referencia</td>
                <td>Color</td>
                <td>#MoldesDisponibles</td>
                <td>Juegos/Molde</td>
                <td>Tipo</td>
                <td>2C/4C</td>
                <td>#MoldesProgramados</td>
                <td>Turno</td>
                <td>CantidadProgramada</td>
                <td>Material(g)</td>
                <td>lote</td>
                <td>nota</td>
                <td>acción</td>
                <td>acción</td>
                
                
                
            </tr>
            
            <?php
            $sql="SELECT rotulos2.*,referencias2.`nombre` AS 'referencia', referencias2.`totalMoldes` AS 'totalMoldes', referencias2.`juegos` AS 'juegosR', referencias2.`tipo` AS 'tipo', referencias2.`capas` AS 'capas', colores2.`nombre` AS 'Color', pedidos2.`codigoP` AS Pedido, lotes2.`nombreL` AS Lote, estaciones2.`nombre` AS 'estacionActual' FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2  ON  rotulos2.`loteId`= lotes2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id`   WHERE rotulos2.`fecha` = '".$fecha."' AND rotulos2.`turno` LIKE '%".$turno."%' AND rotulos2.`prensada` = '".$prensada."'  ORDER BY rotulos2.`id` ASC";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['prensada'] ?></td>
                <td><?php echo $mostrar['Pedido'] ?></td>
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["totalMoldes"] ?></td>
                <td><?php echo $mostrar["juegosR"] ?></td>
                <td><?php echo $mostrar["tipo"] ?></td>
                <td><?php echo $mostrar["capas"] ?></td>
                <td><?php echo $mostrar['cantidadMoldes'] ?></td>
                <td><?php echo $turno ?></td>
                <td><?php echo $mostrar['total'] ?></td>
                <td></td>
                <td><?php echo $mostrar['Lote'] ?></td>
                <td><?php echo $mostrar['nota'] ?></td>
                 <td><a    href="editar_rotulo.php?id=<?php echo $mostrar['id'] ?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>&fecha=<?php echo $fecha?> ">Editar</a></td>
                <td><a href="#" data-href="eliminar_rotulo.php?id=<?php echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
                
                
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
                url: "https://trazabilidadmasterdent.online/control/eliminar_rotulo.php",
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
    
    <div class="row">
            <form action="datosParaDuplicar.php" method="GET" name="duplicar">

                <div class="mb-3">

                    
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha;  
                    ?>">
                      <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>Duplicar Prensada</button>
                <br>
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('duplicar').submit();
    }
</script>
      
        
        <div class="row">
            <form action="formularioImprimirProg.php" method="GET" name="imprimir">

                <div class="mb-3">

                    
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha;  
                    ?>">
                      <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>Imprimir hoja de producción y etiquetas</button>
                <br>
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('imprimir').submit();
    }
</script>
        <br></br>
        
    </div>

    <br>
    
    <h1>Todas las prensadas del turno</h1>
    <table border="1">
            <tr>
                <!--<td>id</td>-->
               
                <td>Fecha</td>
                <td>Prensada</td>
                <td>Pedido</td>
                <td>Referencia</td>
                <td>Color</td>
                <td>#MoldesDisponibles</td>
                <td>Juegos/Molde</td>
                <td>Tipo</td>
                <td>2C/4C</td>
                <td>#MoldesProgramados</td>
                <td>Turno</td>
                <td>CantidadProgramada</td>
                <td>Material(g)</td>
                <td>lote</td>
                <td>nota</td>
                <td>acción</td>
                <td>acción</td>
                
                
            </tr>
            
            <?php
            $sql="SELECT rotulos2.*,referencias2.`nombre` AS 'referencia', referencias2.`totalMoldes` AS 'totalMoldes', referencias2.`juegos` AS 'juegosR', referencias2.`tipo` AS 'tipo', referencias2.`capas` AS 'capas', colores2.`nombre` AS 'Color', pedidos2.`codigoP` AS Pedido, lotes2.`nombreL` AS Lote, estaciones2.`nombre` AS 'estacionActual' FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2  ON  rotulos2.`loteId`= lotes2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id`   WHERE rotulos2.`fecha` = '".$fecha."' AND rotulos2.`turno` LIKE '%".$turno."%' ORDER BY rotulos2.`id` ASC";
            
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['prensada'] ?></td>
                <td><?php echo $mostrar['Pedido'] ?></td>
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["totalMoldes"] ?></td>
                <td><?php echo $mostrar["juegosR"] ?></td>
                <td><?php echo $mostrar["tipo"] ?></td>
                <td><?php echo $mostrar["capas"] ?></td>
                <td><?php echo $mostrar['cantidadMoldes'] ?></td>
                <td><?php echo $turno ?></td>
                <td><?php echo $mostrar['total'] ?></td>
                <td></td>
                <td><?php echo $mostrar['Lote'] ?></td>
                <td><?php echo $mostrar['nota'] ?></td>
                <td><a    href="editar_rotulo.php?id=<?php echo $mostrar['id'] ?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>&fecha=<?php echo $fecha?> ">Editar</a></td>
                <td><a href="#" data-href="eliminar_rotulo.php?id=<?php echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    
    <br></br>
        
        </center>
        
                  </body>
</html>
    
   
   
        
        