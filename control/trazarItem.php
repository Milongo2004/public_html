<?php
//$pedido=$_GET ["id"];
//echo "aquí podremos ver lo ítems del pedido". $pedido. "según su estado dentro del proceso.";

//////////////////////////////////////////////////////////////
//condenado por session start malo   session_start();
//condenado por session start malo     if(!isset ($_SESSION['Cedula']) or !isset($_SESSION['Contrasena'])){ 
//condenado por session start malo       $cedula=1993;
//condenado por session start malo     $contrasena=2050;
//condenado por session start malo       echo "<script>
//condenado por session start malo       alert('Zona  no autorizada,por favor inicia la seccion');
//condenado por session start malo       window.location='../index.php';
//condenado por session start malo     
//condenado por session start malo     
//condenado por session start malo       
//condenado por session start malo     </script>";
//condenado por session start malo     
//condenado por session start malo      
//condenado por session start malo     }
//condenado por session start malo     
//condenado por session start malo     else{
//condenado por session start malo       
//condenado por session start malo       
//condenado por session start malo       $cedula=$_SESSION['Cedula'];
//condenado por session start malo       $contrasena=$_SESSION['Contrasena']; 
//condenado por session start malo      $rol=$_SESSION['Rol'];
  




  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  $pedidoId=$_GET ['idP'];
  
            
            //consulto el nombre o código del pedido a partir del id
                
                 
            $sqlCod= "SELECT pedidos2.`codigoP` from pedidos2 WHERE idP ='".$pedidoId. "' ";
        $resultCod=mysqli_query($conexion,$sqlCod);

         

                while($mostrarCod=mysqli_fetch_array($resultCod)){
                    $pedido=$mostrarCod['codigoP'];
                }
 
  
    $referenciaId = isset( $_GET['referenciaId'] ) ? $_GET['referenciaId'] : '';
    
    
    $colorId = isset( $_GET['colorId'] ) ? $_GET['colorId'] : '';
    
     //variable para determinar las columnas a mostrar según área de la empresa
    
    $origenBusqueda=$_GET['origenBusqueda'];
    
    if ($origenBusqueda==NULL || $origenBusqueda==''){
    
    $origenBusqueda=$_POST['origenBusqueda'];
    
    }
     $origenBusqueda=trim($origenBusqueda," ");
    
    $granel=0;
    $programados=0;
    $producidos=0;    
    $pulidos=0;
    $separados=0;
    $emplaquetados=0;
    $revisados=0;
    $verificados=0;
    $empacados=0;
    
    // imprimo las variables 
   // echo "pedido= ".$pedido;
   // echo "pedidoId= ".$pedidoId;
   // echo "referencia= ".$referencia;
   // echo "color= ".$color;
    
     $filtros = array();
     
     if ($pedidoId != ''){
        $filtros[]= "pedidoDetalles.`pedidoId` = '$pedidoId'";
    }
    
     if ($referenciaId != ''){
        
         
            
            $filtros[]= "pedidoDetalles.`referenciaId` = '$referenciaId'";
            
                
    }
    if ($colorId != ''){
        
        
            
            $filtros[]= "pedidoDetalles.`colorId` = '$colorId'";
    }
    
    
    $consultaFiltros= 'SELECT * FROM pedidoDetalles WHERE ';
    
    $consultaSuma = 'select sum(juegos) as totales FROM pedidoDetalles WHERE ';
    
  //condenado por session start malo }
  
  //condenado por session start malo if($rol==1 OR $rol==3 ){
    
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
     <button onclick="location.href='https://trazabilidadmasterdent.online/control/trazarPedido.php?id=<?php echo $pedidoId; ?>&referenciaId=<?php echo $referenciaId; ?>&colorId=<?php echo $colorId; ?>&origenBusqueda=<?php echo $origenBusqueda?>&Crear=Enviar'">Atrás</button>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeguimientoPedidos</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
</head>

<head>
	<meta charset="UTF-8">
	<title>ItemPedido</title>
</head>
<body>
    <center>

   



        <h1>Historial movimientos del pedido <?php echo $pedido  ?>  </h1>
        
        <?php
        
   
        
         // busco el nombre de la referencia según su id en la tabla referencias2
                
                
$sqlRef= "SELECT `nombre` FROM `referencias2` WHERE id = '$referenciaId'";
$resultRef=mysqli_query($conexion,$sqlRef);       

     
                while($mostrarRef=mysqli_fetch_array($resultRef)){
                    $referencia=$mostrarRef['nombre'];
                   
            }
            ?>



        <h3>Referencia: 

        
               
            
                
                <td><?php //echo $mostrar3['cliente'] 
                echo $referencia;
                ?></td>
                
                
                
           
            </h3>
            
            <?php
            
          // busco el id del color según su nombre 
                
                
$sqlCol= "SELECT `nombre` FROM `colores2` WHERE id = '$colorId'";
$resultCol=mysqli_query($conexion,$sqlCol);       

     
                while($mostrarCol=mysqli_fetch_array($resultCol)){
                    $color=$mostrarCol['nombre'];
                   
            }

            ?>



        <h3>Color: 

                
                <td><?php echo $color; ?></td>
                
                
                
            
          
            </h3>
  

  
    <!--
    
<div class="row">
            <form action="trazarPedido.php" method="POST">
            
            <div class="mb-3">
                
                   
                    
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" size="15" class="form-control "  id="referencia" name="referencia">
         
                    <label for="color" class="form-label">Color</label>
                    <input type="text" size="15" class="form-control "  id="color" name="color">
                    
                    <input name="id" type="hidden" value=" <?php
                        echo $pedidoId;  
                    ?>">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    
<br></br>
-->
    
        <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>RotuloId</td>
                <td>Pedidos</td>
                <td>Granel</td>
                <td>Programados</td>
                <td>Producidos</td>
                <td>Pulidos</td>
                <td>EnSeparación</td>
                <td>Separados</td>
                <td>EnEmplaquetado</td>
                <td>Emplaquetados</td>
                <td>Revisión 1</td>
                <td>Asignados</td>
                <td>Empacados</td>
                <td>Calidad</td>
                <td>Colaborador</td>
                <td>Fecha</td>
                <td>Acción</td>
                
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            
            $iniciales=array();
            //consulto las iniciales de los emplaquetadores
             $sqlEmplaquetadores= "SELECT iniciales FROM emplaquetadores WHERE 1";
            //echo $sqlEmplaquetadores;
            $resultEmplaquetadores=mysqli_query($conexion,$sqlEmplaquetadores);
            
            while($mostrarEmplaquetadores=mysqli_fetch_array($resultEmplaquetadores)){
                $iniciales[]=$mostrarEmplaquetadores["iniciales"];
            }
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ."  ";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar["rotuloId"] ?></td>
                <td><?php echo $mostrar["juegos"] ?></td>
                <td><?php echo $mostrar["granel"]?></td>
                <td><?php echo $mostrar["programados"]?></td>
                <td><?php echo $mostrar["producidos"]?></td>
                <td><?php echo $mostrar["pulidos"]?></td>
                <td><?php echo $mostrar["enSeparacion"]?></td>
                <td><?php echo $mostrar["separado"]?></td>
                <td><?php echo $mostrar["enEmplaquetado"]?></td>
                <td><?php echo $mostrar["emplaquetados"]?></td>
                <td><?php echo $mostrar["revision1"]?></td>
                <td><?php echo $mostrar["revision2"]?></td>
                <td><?php echo $mostrar["empacados"]?></td>
                <td><?php echo $mostrar["calidad"]?></td>
                <td><?php 
                
                if(!(is_null($mostrar["colaborador"]))){
                
                echo $iniciales[$mostrar["colaborador"]-1];
                }
                else {
                    echo "";
                }
                ?></td>
                <td><?php echo $mostrar["fechaCreacion"]?></td>
                <td><a href="#" data-href="eliminaDetalle.php?id=<?php echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
                
                
                
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
                url: "https://trazabilidadmasterdent.online/control/eliminaDetalle.php",
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
        
         
    
   <table border="1">
            <tr>
               
                <td>TOTAL JUEGOS PEDIDOS</td>
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros)." ";
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                
                <td><?php echo $mostrarSuma['totales'] ?></td>
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>
            
          
            

<?php




//condenado por session start malo   }
//condenado por session start malo   
//condenado por session start malo   else {
//condenado por session start malo     echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
//condenado por session start malo   }
?>