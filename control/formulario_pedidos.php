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
<body>
    <center><h1>Nuevo Pedido</h1></center>
    <div class="container mt-5">
        <h1>Datos generales del pedido</h1>
        <div class="row">
            <form action="creaPedido.php" method="get">
                
                <div class="mb-3">
                    <label for="pedido" class="form-label">Código de Pedido</label><font color="red">*</font>
                    <input type="text" class="form-control" autofocus id="pedido" name="pedido" placeholder="Digita número de pedido">
                </div>
                
                <div class="mb-3">
                    <label for="cliente" class="form-label">Seleccionar cliente</label>
                    <select class="form-select" id="cliente" name="cliente" aria-label="Default select example">
                        <option selected value="1153">Selecciona un cliente</option>
                    <?php
                        $sql1="SELECT * from clientes2 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreCliente"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                   
                </div>
                
                 <!--<div class="mb-3">
                    <label for="linea" class="form-label">Línea</label>
                    <input type="text" class="form-control" autofocus id="linea" name="linea" placeholder="Digita la línea">
                </div>-->
                <div class="mb-3">
                <label for="linea" class="form-label">Seleccionar línea</label>
                 <select class="form-select" id="linea" name="linea" aria-label="Default select example">
                        <option selected value=null>Línea de producto</option>
                        <option value="RESISTAL">RESISTAL</option>
                        <option value="STARPLUS">STARPLUS</option>
                        <option value="REVEAL">REVEAL</option>
                        <option value="STARVIT">STARVIT</option>
                        <option value="UHLERPLUS">UHLERPLUS</option>
                        <option value="STARDENT">STARDENT</option>
                        <option value="ZENITH">ZENITH</option>
                        
                 
                    </select>
                    </div>
                 <div class="mb-3">
                    <label for="vendedor" class="form-label">Vendedor</label>
                    <input type="text" class="form-control" autofocus id="vendedor" name="vendedor" placeholder="Digita nombre del vendodor">
                </div>
                
                <div class="mb-3">
                    <label for="juegosTotales" class="form-label">Juegos Totales del pedido</label>
                    <input type="text" class="form-control" id="juegosTotales" name="juegosTotales" placeholder="Digita número de juegos del pedido">
                </div>

                
                <div class="mb-3">
                    <label for="nota" class="form-label">Nota</label>
                    <input type="text" class="form-control" id="nota" name="nota" placeholder="NOTA aclaratoria sobre el pedido o cliente para el Emplaquetado">
                    
                </div>
                <label for="prioridad" class="form-label">¿Tiene prioridad?</label>
                <select class="form-select" id="prioridad" name="prioridad" aria-label="Default select example">
                        <option selected value="0"></option>
                        <option value="1">SÍ</option>
                        <option value="0">NO</option>
                        
                 
                    </select>
                    <BR>
                
                <input type="submit" name="Crear" >
            </form>
            <br>
            <h6><font color="red">*</font> campo obligatorio</h6>
        </div>
        
        <!--
        
        <h1>Tabla Pedidos</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <!--<td>id</td>
                <td>Código Pedido</td>
                <td>Cliente</td>
                <td>Juegos totales</td>
                <td>fechaCreacion</td>
                <!--<td>fechaActualizacion</td>
                <td>Estado</td>
                <td>Acción</td>
                <td>Acción</td>
            </tr>
            
            <?php
            //$sql="SELECT pedidos2.*, clientes2.`nombreCliente` AS cliente from pedidos2 INNER JOIN clientes2 ON pedidos2.`idCliente`= clientes2.`id` ORDER BY `idP` DESC LIMIT 200";
            //$result=mysqli_query($conexion,$sql);
            
            //while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['idP'] ?></td>
                <td><?php //echo $mostrar['codigoP'] ?></td>
                <td><?php //echo $mostrar['cliente'] ?></td>
                <td><?php //echo $mostrar['juegosTotales'] ?></td>
                <td><?php //echo $mostrar['fechaCreacion'] ?></td>
                <!--<td><?php //echo $mostrar['fechaActualizacion'] ?></td>
                <td><?php //echo $mostrar['estado'] ?></td>
                <td><a href="eliminar_pedido.php?id=<?php //echo $mostrar['idP']; ?> ">Eliminar</a></td>
                <td><a href="editar_pedido.php?id=<?php //echo $mostrar['idP']; ?> "  >Editar</a></td>
            </tr>
            <?php
            //}
            ?>
        </table>
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


</table>

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

    <br></br>
        
    </div>-->
</body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>