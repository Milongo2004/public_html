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
  
  $pedido=$_GET ["pedido"];
    if(is_null($pedido)){
        $pedido=$_POST['pedido'] ;
        if(is_null($pedido)){
            $pedidoId=$_GET ["pedidoId"];
            if(is_null($pedidoId)){
                $pedidoId=$_POST ["pedidoId"];
                if(is_null($pedidoId)){
                    echo "error: no se encuentran datos suficientes";
            }
            else{
                 //consulto el nombre o código del pedido a partir del id
                 //echo "se encontró pedido en POST";
             $sqlCod= "SELECT pedidos2.`codigoP` from pedidos2 WHERE idP ='".$pedidoId. "' ";
        $resultCod=mysqli_query($conexion,$sqlCod);

         

                while($mostrarCod=mysqli_fetch_array($resultCod)){
                    $pedido=$mostrarCod['codigoP'];
                }
            }
        }
        else {
             //consulto el nombre o código del pedido a partir del id
             //echo "se encontró pedidoId en GET";
             $sqlCod= "SELECT pedidos2.`codigoP` from pedidos2 WHERE idP ='".$pedidoId. "' ";
        $resultCod=mysqli_query($conexion,$sqlCod);

         

                while($mostrarCod=mysqli_fetch_array($resultCod)){
                    $pedido=$mostrarCod['codigoP'];
                }
        }
    }
     else{
        //consulto el id del pedido a partir del nombre 
        
        //echo "se encontró pedido en POST";

        $sqlIdP= "SELECT pedidos2.`idP` from pedidos2 WHERE codigoP ='".$pedido. "' ORDER BY idP DESC LIMIT 1";
        $resultIdP=mysqli_query($conexion,$sqlIdP);

         

                while($mostrarIdP=mysqli_fetch_array($resultIdP)){
                    $pedidoId=$mostrarIdP['idP'];
                }
    }
    
    }
    else{
        //consulto el id del pedido a partir del nombre 
        //echo "se encontró pedido en GET";

        $sqlIdP= "SELECT pedidos2.`idP` from pedidos2 WHERE codigoP ='".$pedido. "' ORDER BY idP DESC LIMIT 1";
        $resultIdP=mysqli_query($conexion,$sqlIdP);

         

                while($mostrarIdP=mysqli_fetch_array($resultIdP)){
                    $pedidoId=$mostrarIdP['idP'];
                }
    }
    
   
  
    $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $uppLow = isset( $_POST['uppLow'] ) ? $_POST['uppLow'] : '';
    $tipo = isset( $_POST['tipo'] ) ? $_POST['tipo'] : '';
    
    
    // imprimo las variables 
   // echo "pedido= ".$pedido;
   // echo "pedidoId= ".$pedidoId;
   // echo "referencia= ".$referencia;
   // echo "color= ".$color;
    
     $filtros = array();
     
     if ($pedidoId != ''){
        $filtros[]= "pedidoDetalles.`pedidoId` = '$pedidoId'";
    }
    
     if ($referencia != ''){
        
         // busco el id de la referencia según su nombre en la tabla referencias2
                
                
$sqlRef= "SELECT `id` FROM `referencias2` WHERE nombre LIKE '%$referencia%'";
$resultRef=mysqli_query($conexion,$sqlRef);       

     
                while($mostrarRef=mysqli_fetch_array($resultRef)){
                    $referencia=$mostrarRef['id'];
                   
            }
            
            $filtros[]= "pedidoDetalles.`referenciaId` = '$referencia'";
            
                
    }
    if ($color != ''){
        
         // busco el id del color según su nombre 
                
                
$sqlCol= "SELECT `id` FROM `colores2` WHERE nombre = '$color'";
$resultCol=mysqli_query($conexion,$sqlCol);       

     
                while($mostrarCol=mysqli_fetch_array($resultCol)){
                    $color=$mostrarCol['id'];
                   
            }
            
            $filtros[]= "pedidoDetalles.`colorId` = '$color'";
    }
    
    if ($uppLow != ''){
            $filtros[]= "referencias2.`nombre` LIKE '%$uppLow'";
    }
    
    if ($tipo != ''){
            $filtros[]= "referencias2.`tipo` = '$tipo'";
    }
    
    
    $consultaFiltros= 'SELECT pedidoDetalles.*, referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, colores2.`nombre` AS Color FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE ';
    $consultaFiltrosAgrupada='SELECT pedidoDetalles.*, SUM(pedidoDetalles.juegos) as total, referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, colores2.`nombre` AS Color FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE ';
    $consultaSuma = 'select *, referencias2.`nombre` AS referencia, referencias2.`tipo` AS tipo, sum(pedidoDetalles.`juegos`) as totales FROM pedidoDetalles  INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` WHERE ';
    
  }
  
  if($rol==1 OR $rol==3 ){
    
  
  ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
     <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_seleccionPedido.php?destino=detalles&Crear=Enviar'">Atrás</button>
     <button onclick="location.href='https://trazabilidadmasterdent.online/control/empaque.php?pedidoId=<?php echo $pedidoId?>&Empacar=Enviar'">Lista de empaque</button>
     
     <!--https://trazabilidadmasterdent.online/control/empaque.php?pedidoId=693&Empacar=Enviar-->
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Pedidos</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
</head>

<head>
	<meta charset="UTF-8">
	<title>Empaque</title>
</head>
<body>
    <center>

   



        <h1>Detalles del pedido <?php echo $pedido    ?>  </h1>
        
        <?php
        
   
        
        //presento el nombre del cliente

        $sql3= "SELECT pedidos2.`idCliente`, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente` = clientes2.`id` WHERE idP ='".$pedidoId. "'";
        $result3=mysqli_query($conexion,$sql3);

            ?>



        <h3>Cliente: 

        
                 <?php

                while($mostrar3=mysqli_fetch_array($result3)){
                    $nombreCliente=$mostrar3['cliente'];
            ?>

            
                
                <td><?php //echo $mostrar3['cliente'] 
                echo $nombreCliente;
                ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h3>
            
            <?php
            
            //presento la línea

        $sql4= "SELECT linea FROM pedidos2 WHERE idP ='". $pedidoId. "'";
        $result4=mysqli_query($conexion,$sql4);

            ?>



        <h3>Línea: 

        
                 <?php

                while($mostrar4=mysqli_fetch_array($result4)){
                    $línea=$mostrar4['linea'];
                    
                    
            ?>

            
                
                <td><?php echo $línea; ?></td>
                
                
                
            
            <?php
            }
            
            $arregloColores= array();
            
            if ($línea=="STARPLUS"){
                $arregloColores[]=27;
                $arregloColores[]=28;
                $arregloColores[]=29;
                $arregloColores[]=30;
                $arregloColores[]=31;
                $arregloColores[]=32;
                $arregloColores[]=33;
                $arregloColores[]=34;
                $arregloColores[]=35;
                $arregloColores[]=36;
                $arregloColores[]=37;
                $arregloColores[]=38;
                $arregloColores[]=39;
                $arregloColores[]=40;
               
            }
            else if ($línea=="STARDENT"){
                $arregloColores[]=2;
                $arregloColores[]=3;
                $arregloColores[]=4;
                $arregloColores[]=79;
                $arregloColores[]=80;
                $arregloColores[]=5;
                $arregloColores[]=6;
                $arregloColores[]=7;
                $arregloColores[]=8;
                $arregloColores[]=9;
                $arregloColores[]=10;
                $arregloColores[]=11;
                $arregloColores[]=12;
                $arregloColores[]=18;
                $arregloColores[]=19;
                $arregloColores[]=20;
                $arregloColores[]=21;
                $arregloColores[]=22;
                $arregloColores[]=23;
                $arregloColores[]=24;
                $arregloColores[]=25;
                $arregloColores[]=26;
               
            }
            else if ($línea=="REVEAL"){
                $arregloColores[]=1;
                $arregloColores[]=2;
                $arregloColores[]=3;
                $arregloColores[]=4;
                $arregloColores[]=5;
                $arregloColores[]=6;
                $arregloColores[]=7;
                $arregloColores[]=8;
                $arregloColores[]=9;
                $arregloColores[]=10;
                $arregloColores[]=11;
                $arregloColores[]=12;
                $arregloColores[]=13;
                $arregloColores[]=14;
               
            }
             else if ($línea=="STARVIT"){
                $arregloColores[]=1;
                $arregloColores[]=2;
                $arregloColores[]=3;
                $arregloColores[]=15;
                $arregloColores[]=79;
                $arregloColores[]=4;
                $arregloColores[]=16;
                $arregloColores[]=80;
                $arregloColores[]=5;
                $arregloColores[]=6;
                $arregloColores[]=7;
                $arregloColores[]=8;
                $arregloColores[]=9;
                $arregloColores[]=10;
                $arregloColores[]=11;
                $arregloColores[]=12;
                $arregloColores[]=13;
                $arregloColores[]=14;
               
            }
            else if ($línea=="UHLERPLUS"){
                $arregloColores[]=27;
                $arregloColores[]=28;
                $arregloColores[]=29;
                $arregloColores[]=30;
                $arregloColores[]=31;
                $arregloColores[]=32;
                $arregloColores[]=33;
                $arregloColores[]=34;
                $arregloColores[]=35;
                $arregloColores[]=36;
                $arregloColores[]=37;
                $arregloColores[]=38;
                $arregloColores[]=39;
                $arregloColores[]=40;
               
            }
            else if ($línea=="ZENITH"){
                
                $arregloColores[]=42;
                $arregloColores[]=43;
                $arregloColores[]=41;
                $arregloColores[]=44;
                $arregloColores[]=45;
                $arregloColores[]=46;
                $arregloColores[]=47;
                $arregloColores[]=49;
                $arregloColores[]=50;
                $arregloColores[]=52;
                $arregloColores[]=53;
                $arregloColores[]=55;
               
               
            }
            else if ($línea=="RESISTAL"){
                $arregloColores[]=18;
                $arregloColores[]=19;
                $arregloColores[]=20;
                $arregloColores[]=21;
                $arregloColores[]=22;
                
               
            }
            
            ?>
            </h3>
            
            
             <div class="container mt-5">
        <h1>Ingresar ítems</h1>
        <div class="row">
            <form action="creaDetallesPedido.php" method="POST">
            
             <div class="mb-3">
                    <label for="referencia" class="form-label">REFERENCIA</label><font color="red">*</font></label>
                    <select class="form-select" autofocus id="referencia" name="referencia" aria-label="Default select example">
                        <option selected>Selecciona una referencia</option>
                    <?php
                        $sql1="SELECT * from referencias2 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>

        </div>
        <br>
        
        <!-- <div class="mb-3">
                    <label for="color" class="form-label">COLOR</label><font color="red">*</font></label>
                    <select class="form-select" id="color" name="color" aria-label="Default select example">
                        <option selected>Selecciona un color</option>
                    <?php
                    
                    //arreglo con los id y los nombres de los colores el id es la clave y el nombre el valor
                    $arregloIdNombre=array();
                    
                        $sql2="SELECT id, nombre FROM colores2";
                        
                        $result2=mysqli_query($conexion,$sql2);
                        
                        while($mostrar2=mysqli_fetch_array($result2)){
                            
                        
                        $arregloIdNombre[$mostrar2["id"]] = $mostrar2["nombre"];
                        
                        }
                        
                        var_dump($arregloColores);
                    ?>
                    
                    
                    </select>
                    </div>-->
                   
                    <?php 
                    //muestro variables y arreglos para entender su funcionamiento
                    //echo var_dump($arregloIdNombre);
                    //echo $línea;
                    //echo count($arregloIdNombre);
                    
                    $cantidadColores=count($arregloColores);
                    ?>
                    
                    
                    
                    <table border="1" ><tbody>
                        
            <!--            
             <tr>
                 <td colspan = "<?php //echo $cantidadColores ?>"><CENTER>COLOR/JUEGOS<font color="red">*</font></CENTER></td>
             </tr>           
                -->        
            <tr>
                <td><CENTER>COLORES<font color="red">*</font></CENTER></td>
                <?php
                for ($i=0; $i<=$cantidadColores-1; $i++){
                    
                
                ?>
                  
                <td><center><?php echo $arregloIdNombre[$arregloColores[$i]] ?></td>
                <?php
                
                
                }
                ?>
                 </td>
                
            </tr>            
                        
                        
                        
            <tr>
                <td><CENTER>JUEGOS<font color="red">*</font></CENTER></td>
                <?php
                for ($i=0; $i<=$cantidadColores-1; $i++){
                    
                
                ?>
                  
                <td ><label for="juegosColor<?php echo $i ?>" class="form-label"></label><input type="text" style="width : 40px"; class="form-control" id="juegosColor<?php echo $i ?>" name="juegosColor<?php echo $i ?>">
                <?php
                
                
                }
                ?>
                 </td>
                
            </tr>
            </tbody></table>
                    
                    <br>
                    <!--<div class="mb-3">
                    <label for="juegos" class="form-label">JUEGOS</label><font color="red">*</font></label>
                    <input type="text" class="form-control" id="juegos" name="juegos" placeholder="Digita cantidad de juegos">
                    
                    <label for="cajas" class="form-label">JUEGOS*</label>
                    <input type="text" class="form-control" id="cajas" name="cajas" placeholder="Digita cantidad de cajas">
                  </div>-->

                      <input name="pedido" type="hidden" value=" <?php
                        echo $pedidoId;  
                    ?>">
                      <input name="nombreUsuario" type="hidden" value=" <?php
                        echo $nombreUsuario; 
                    ?>">
                    <input name="cantidadColores" type="hidden" value=" <?php
                        echo $cantidadColores; 
                    ?>">
                    <input type="hidden" name="arregloColores" value="<?php echo  base64_encode(serialize($arregloColores));?>" >
                   
                   
                </div>
                <br>
                <input type="submit" name="Crear" >
            </form>
        </div>
        
            

    <h2>REGISTROS </h2>
    
    
<div class="row">
            <form action="pedidoDetalles.php" method="POST">
            
            <div class="mb-3">
                
                   
                    
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" size="15" class="form-control "  id="referencia" name="referencia">
                    
                    
                    <label for="color" class="form-label">Color</label>
                    <input type="text" size="15" class="form-control "  id="color" name="color">
                    
                    <label for="tipo" class="form-label">Muela/Diente</label>
                    <select class="form-select"  id="tipo" name="tipo" aria-label="Default select example">
                        <option selected></option>
                        <option value="Muela">MUELA</option>
                        <option value="Diente">DIENTE</option>
                    
                    </select>
                    
                     <label for="uppLow" class="form-label">Sup/Inf</label>
                    <select class="form-select" autofocus id="uppLow" name="uppLow" aria-label="Default select example">
                        <option selected></option>
                        <option value="-S">SUP</option>
                        <option value="-I">INF</option>
                    
                    </select>
         
                    
                    <input name="pedidoId" type="hidden" value=" <?php
                        echo $pedidoId;  
                    ?>">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    
<br></br>
    
        <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>Referencia</td>
                <td>Color</td>
                
                <td>Juegos</td>
               
                <td>acción</td>
                <td>acción</td>
                
                
            </tr>
            
            <?php
            
  
    
     if ($referencia != ''){
            echo "- REFERENCIA = ".$_POST['referencia'];
    }
    
    if ($color != ''){
            echo "- COLOR = ".$_POST['color'];
    }
    
    if ($tipo != ''){
            echo "- TIPO = $tipo";
    }
      if ($uppLow != ''){
            echo "- SUP/INF= $uppLow";
    }
            
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." AND pedidoDetalles.`juegos` != '0' ORDER BY pedidoDetalles.`id` DESC";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["juegos"] ?></td>
                <td><a    href="editar_detellePedido.php?id=<?php echo $mostrar['id'] ?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>&fecha=<?php echo $fecha?> ">Editar</a></td>
               <td><a href="../control/eliminar_detallePedido.php?id=<?php echo $mostrar['id'] ?>&pedidoId=<?php echo $pedidoId?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
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
                url: "https://trazabilidadmasterdent.online/control/eliminar_detallePedido.php",
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
                
                <td><?php echo $mostrarSuma['totales'] ?></td>
                
            </tr>
            
            
            
           
            <?php
            }
            ?>
        </table>
        
        <h2>Totales por referencia</h2>
        <table border="1">
            <tr>
             <td>Referencia</td>
             <td>Juegos</td>
            </tr>
        <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
             $sqlAgrupada= $consultaFiltrosAgrupada." ". implode(" AND ",$filtros) ." AND pedidoDetalles.`juegos` != '0' GROUP BY pedidoDetalles.referenciaId ORDER BY pedidoDetalles.`id` DESC";
            //echo $sql;
            $resultAgrupada=mysqli_query($conexion,$sqlAgrupada);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarAgrupada=mysqli_fetch_array($resultAgrupada)){
            ?>
            <tr>
                <td><?php echo $mostrarAgrupada['referencia'] ?></td>
                <td><?php echo $mostrarAgrupada['total'] ?></td>
                
            </tr>
            
            <?php
            }
            ?>
        </table>
        <br></br>
          <p>Nota: el filtro de búsqueda para superior e inferior sólo detecta las referencias cuyo nombre termine en "-S" o "-I"</p>
            

<?php




}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>