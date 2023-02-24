<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    
    $moldesPrensada=null;

    //obtengo los datos del formulario anterior
    
    $ano=$_POST ["Ano"];
    
    $mes=$_POST ["Mes"];
    $dia=$_POST ["Dia"];
   
    
    if (is_null($ano)){
        
       $fecha=$_POST ["fecha"];
       
        if(is_null($fecha)){
            //echo "la fecha post es nula";
        $fecha=$_GET ["fecha"];
        //echo $fecha;
        $turno=$_GET ["turno"];
        //echo $turno;
        $prensada=$_GET ["prensada"];
        //echo $prensada;
        
        //limito el tamaño de los datos

$fecha = substr($fecha, int -12);
$turno = substr($turno, int -10);
$prensada = substr($prensada, int -2);
        
        //elimino los espacios en blanco del string turno.
        
        $turno=trim($turno," ");
        //echo "fecha sin espacios en blanco".$fecha;
       
    }
    }
    else{
    //$fecha=$dia."/".$mes."/".$ano;
    $ano=$ano+2000;
    $fecha=$ano."-".$mes."-".$dia;
    $turno=$_POST ["turno"];
    $prensada=$_POST ["prensada"];
   
    }
    //$turno=$_POST ["turno"];
    //$prensada=$_POST ["prensada"];
    

/*var_dump($fecha);
var_dump($turno);
var_dump($prensada);*/

//limito el tamaño de los datos

$fecha = substr($fecha, int -12);
$turno = substr($turno, int -10);
$prensada = substr($prensada, int -2);

//elimino los espacios en blanco del string

$turno=trim($turno," ");

//echo "después de limitar los datos";

/*var_dump($fecha);
var_dump($turno);
var_dump($prensada);*/

  //a continuación consulto el total de moldes de la prensada actual.
           
           $sqlC="SELECT SUM(cantidadMoldes) AS total FROM rotulos2 WHERE rotulos2.`fecha` = '".$fecha."' AND rotulos2.`turno` LIKE '%".$turno."%' AND rotulos2.`prensada` = '".$prensada."' ";
            $resultC=mysqli_query($conexion,$sqlC);
            
            while($mostrarC=mysqli_fetch_array($resultC)){
            $moldesPrensada=$mostrarC['total'];
            }

?>

<!DOCTYPE html>
<html lang="en">
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/progProduccion2.php?fecha=<?php echo $fecha?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>'">Cambiar Prensada/Turno/Fecha</button>
    <!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/cambiarPrensada.php?turno=<?php //echo $turno?>&fecha=<?php //echo $fecha?>">Cambiar prensada</button>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/cambiarTurno.php?prensada=<?php //echo $prensada?>&fecha=<?php //echo $fecha?> ">Cambiar Turno</button>-->
			
<head>
	<meta charset="UTF-8">
	<title>Programación</title>
	
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
    <center>

    <?php
        //presento detalles del pedido a empacar
        //1. presento el nombre del pedido

        $sql2= "SELECT codigoP from pedidos2 WHERE idP ='". $pedido. "'";
        $result2=mysqli_query($conexion,$sql2);

            ?>



       <h2>Programación del día: <?php echo $fecha ?> </h2>
        <h2>Turno:  <?php echo $turno ?></h2>
        
            
            
          
            
            <div class="container mt-5">
        <h1>Programar Prensada</h1>
        <div class="row">
            <form action="progProduccion4.php" method="POST">
            
            <div class="mb-3">
                    <label for="pedido" class="form-label">Seleccionar Pedido</label>
                    <select class="form-select" autofocus id="pedido" name="pedido" aria-label="Default select example">
                        <option selected>Selecciona un pedido</option>
                    <?php
                        $sql1="SELECT * from pedidos2 ORDER BY idP DESC LIMIT 200";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["idP"].'">'.$mostrar["codigoP"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>

        </div>
        <br>
        
         <div class="mb-3">
                    <label for="lote" class="form-label">Seleccionar Color/Lote</label>
                    <select class="form-select" id="lote" name="lote" aria-label="Default select example">
                        <option selected>Selecciona un lote</option>
                    <?php
                        $sql2="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY id DESC LIMIT 200";
                        //$sql2="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY color DESC LIMIT 200";
                        $result=mysqli_query($conexion,$sql2);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        //echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreL"]. " / ".$mostrar["color"].'</option>';
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["color"]. " / ".$mostrar["nombreL"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>

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
                <input type="submit" name="Crear" >
            </form>
        </div>
        
        <br>    

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
        
        
    </div>
    
    
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