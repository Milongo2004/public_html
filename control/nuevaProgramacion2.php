<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

//defino las variables que se obtienen del formulario anterior.

    $ano=null;
    $mes=null;
    $dia=null;
    $turno=null;
    $prensada=null;
  
 //obtengo los datos del formulario anterior
    
    $ano=$_GET ["Ano"];
    $ano=$ano+2000;
    $mes=$_GET ["Mes"];
    $dia=$_GET ["Dia"];
    
    //$fecha=$dia."/".$mes."/".$ano;
    $fecha=$ano."-".$mes."-".$dia;
   
    $turno=$_GET ["turno"];
    $prensada=$_GET ["prensada"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProgramaciónDeProducción2</title>
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
    
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/nuevaProgramacion.php'">Cambiar Fecha/Turno/prensada</button>

            <center>
                   <div class="container mt-5">
        
    
        <!--<h2>Programación </h2>-->
        <h2>Prensadas del día: <?php echo $fecha ?> </h2>
        <h2>Turno:  <?php echo $turno ?></h2>
        
        
        
   <div class="container mt-5">
        <h1>Datos generales</h1>
        <div class="row">
            <form action="nuevaProgramacion3.php" method="get">
        
        <div class="mb-3">
                    <label for="pedido" class="form-label">Seleccionar Pedido</label>
                    <select class="form-select" id="pedido" name="pedido" aria-label="Default select example">
                        <option selected>Selecciona un pedido</option>
                    <?php
                        $sql1="SELECT * from pedidos2 ORDER BY idP DESC LIMIT 50";
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
                        $sql1="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY id DESC LIMIT 200";
                        //$sql1="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY color DESC LIMIT 200";
                        $result=mysqli_query($conexion,$sql1);
                        
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
        
    <h1>Prensada:  <?php echo $prensada ?> </h1>
    
    <br>

    
        <table border="1">
            <tr>
                <!--<td>id</td>-->
                <td>id</td><!--presento el código del rótulo con el nombre de id-->
                <td>fecha</td>
                <td>prensada</td>
                <td>pedido</td>
                <td>referencia</td>
                <td>color</td>
                <td>lote</td>
                <td>#Moldes</td> 
                <td>casillaId</td>               
                <td>juegos</td>
                <td>estacionActual</td>
                <td>vuelta1</td>
                <td>vuelta2</td>
                <td>vuelta3</td>
                <td>vuelta4</td>
                <td>vuelta5</td>
                <td>vuelta6</td>
                <td>vuelta7</td>
                <td>vuelta8</td>                
                <td>total</td>
                <td>acción</td>
                
            </tr>
            
            <?php
            $sql="SELECT rotulos2.*,referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color', pedidos2.`codigoP` AS Pedido, lotes2.`nombreL` AS Lote, estaciones2.`nombre` AS 'estacionActual' FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2  ON  rotulos2.`loteId`= lotes2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id` WHERE rotulos2.`fecha` LIKE '%".$fecha."%' AND rotulos2.`turno` LIKE '%".$turno."%' AND rotulos2.`prensada` LIKE '%".$prensada."%' ORDER BY rotulos2.`id` DESC LIMIT 120";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                <td><?php echo $mostrar['cod_rotulo'] ?></td>
                <td><?php ?></td>
                <td><?php ?></td>
                <td><?php echo $mostrar['Pedido'] ?></td>
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar['Lote'] ?></td>
                <td><?php echo $mostrar['cantidadMoldes'] ?></td>
                <td><?php echo $mostrar['casillaId'] ?></td>
                <td><?php echo $mostrar['juegos'] ?></td>
                <td><?php echo $mostrar['estacionActual'] ?></td>
                <td><?php echo $mostrar['vuelta1'] ?></td>
                <td><?php echo $mostrar['vuelta2'] ?></td>
                <td><?php echo $mostrar['vuelta3'] ?></td>
                <td><?php echo $mostrar['vuelta4'] ?></td>
                <td><?php echo $mostrar['vuelta5'] ?></td>
                <td><?php echo $mostrar['vuelta6'] ?></td>
                <td><?php echo $mostrar['vuelta7'] ?></td>
                <td><?php echo $mostrar['vuelta8'] ?></td>            
                <td><?php echo $mostrar['total'] ?></td>
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
    
    <br></br>
        
        </center>
        
                  </body>
</html>