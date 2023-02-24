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
    }
    
    $pedidoId=$_GET ["pedidoId"];
    
   if(is_null($pedidoId)){
        //consulto el id del pedido

        $sqlIdP= "SELECT pedidos2.`idP` from pedidos2 WHERE codigoP ='".$pedido. "' ORDER BY idP DESC LIMIT 1";
        $resultIdP=mysqli_query($conexion,$sqlIdP);

         

                while($mostrarIdP=mysqli_fetch_array($resultIdP)){
                    $pedidoId=$mostrarIdP['idP'];
                }
    }
  }
  
  if($rol==1 OR $rol==3 ){
    
  
  ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
        
         <div class="mb-3">
                    <label for="color" class="form-label">COLOR</label><font color="red">*</font></label>
                    <select class="form-select" id="color" name="color" aria-label="Default select example">
                        <option selected>Selecciona un color</option>
                    <?php
                        $sql2="SELECT * FROM colores2 ORDER BY id ASC LIMIT 66";
                        //$sql2="SELECT lotes2.*, colores2.`nombre` AS 'color' from lotes2 INNER JOIN colores2 ON lotes2.`colorId2` = colores2.`id`  ORDER BY color DESC LIMIT 200";
                        $result=mysqli_query($conexion,$sql2);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        //echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreL"]. " / ".$mostrar["color"].'</option>';
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>
                    
                    <div class="mb-3">
                    <label for="juegos" class="form-label">JUEGOS</label><font color="red">*</font></label>
                    <input type="text" class="form-control" id="juegos" name="juegos" placeholder="Digita cantidad de juegos">
                    
                    <!--<label for="cajas" class="form-label">JUEGOS*</label>
                    <input type="text" class="form-control" id="cajas" name="cajas" placeholder="Digita cantidad de cajas">-->
                  </div>

                      <input name="pedido" type="hidden" value=" <?php
                        echo $pedidoId;  
                    ?>">
                      <input name="nombreUsuario" type="hidden" value=" <?php
                        echo $nombreUsuario; 
                    ?>">
                   
                   
                </div>
                <br>
                <input type="submit" name="Crear" >
            </form>
        </div>
        
        <br>    

    <h1>REGISTROS </h1>
    
    <br>

    
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
            $sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['Color'] ?></td>
                <td><?php echo $mostrar["juegos"] ?></td>
                <td><a    href="editar_detellePedido.php?id=<?php echo $mostrar['id'] ?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>&fecha=<?php echo $fecha?> ">Editar</a></td>
                <td><a href="#" data-href="eliminar_detallePedido.php?id=<?php echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
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
    
   
            
          
            

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>