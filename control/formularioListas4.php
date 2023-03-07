<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
$pedido=$_GET ["pedido"];
$caja=$_GET ["caja"];
$metodo=$_GET ["metodo"];
$cajaMayor="";

//consulto el valor máximo de las cajas para asignar el dicho valor más uno en caso de que el valor GET de caja sea==0

$sqlCaja="SELECT * FROM `listaEmpaque` WHERE pedidoId='". $pedido. "' ORDER BY caja DESC LIMIT 1;";
$resultCaja=mysqli_query($conexion,$sqlCaja);

 while($mostrarCaja=mysqli_fetch_array($resultCaja)){
                    $cajaMayor=$mostrarCaja['caja'];   //valor máximo de caja para  este pedido       
   
            
            }
            
            //pregunto por el valor de la caja GET y si es == 0, pregunto cuál es el valor de la caja mayor, si este es null $caja=1, si es otro, entonces caja=cajaMayor+1
            if ($caja==0){
                
                if(is_null($cajaMayor)){
                    
                    $caja=1;
                    
                }
                else{
                    $cajaM=intval($cajaMayor);
                    $caja = $cajaM + 1;
                }
            }


$sql2= "SELECT codigoP from pedidos2 WHERE idP ='". $pedido. "'";
        $result2=mysqli_query($conexion,$sql2);
?>

<!DOCTYPE html>
<html lang="en">
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_seleccionPedido.php'">Selección de pedido</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
<head>
    <meta charset="UTF-8">
    <title>listaEmpaque</title>
</head>
<body>
    <center>

<html lang="en">


    <div class="container mt-5">
        <h1>Creación de lista de Empaque</h1>
        <h2>Pedido:
        <?php

                while($mostrar2=mysqli_fetch_array($result2)){
            ?>

            
                
                <td><?php echo $mostrar2['codigoP'] ?></td>
                
                
                
            
            <?php
            }
            ?>
        </h2>
        
        <?php
         //si la selección fue ingreso uno a uno 
            if ($metodo=="1"){
                
            //presento el  número de la caja
            ?>
            <h2>Ingreso uno a uno </h2>
        
        <h2>Caja: 
                
                <td><?php echo $caja ?></td>
            
           </h2>
         <br>

   
        <div class="row">
            <form action="creaLista.php" method="get" name="ingresoLista">

                <div class="mb-3">

                    <label for="lote" class="form-label">Seleccionar lote</label>
                    <select class="form-select" id="lote" name="lote" aria-label="Default select example">
                        <option selected>Selecciona un lote</option>
                    <?php
                        $sql1="SELECT * from lotes2 ORDER BY id DESC LIMIT 50";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreL"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>


                </div>
 <br>


                <div class="mb-3">
                    <label for="codigoQR" class="form-label">Código QR</label>
                    <input type="text" class="form-control" id="codigoQR" name="codigoQR" placeholder="Digita numero de lote">
                    <input name="cajas" type="hidden" value="null">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="caja" type="hidden" value=" <?php
                        echo $caja; 
                    ?>">
                    <input name="metodo" type="hidden" value=" <?php
                        echo $metodo; 
                    ?>">
                </div>        
                <br>

   
                

                <input type="submit" name="Crear" >
                
            </form>
            
     




            
        </div>
        
    </div>
    
    <br>    

     <?php
    presentar_tabla_segun_caja($caja, $pedido);
    ?>
        
        <?php
            }
            
            //si la selección fue ingreso grupal
            
            else if($metodo=="2"){?>
                <h2>Ingreso grupal</h2>
                <h2>Caja: 
                
                <td><?php echo $caja ?></td>
            
           </h2>
         <br>

   
        <div class="row">
            <form action="creaLista.php" method="get">

                <div class="mb-3">

                    <label for="lote" class="form-label">Seleccionar lote</label>
                    <select class="form-select" id="lote" name="lote" aria-label="Default select example">
                        <option selected>Selecciona un lote</option>
                    <?php
                        $sql1="SELECT * from lotes2 ORDER BY id DESC LIMIT 50";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                            
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombreL"].'</option>';
                        
                    ?>


                    <?php

                        }

                    ?>
                    </select>


                </div>
 <br>

    
                
 <div class="mb-3">
                    <label for="cajas" class="form-label">Número de cajas</label>
                    <input type="text" class="form-control" id="cajas" name="cajas" placeholder="Digita cantidad cajas">
                </div>
 <br>

  
                <div class="mb-3">
                    <label for="codigoQR" class="form-label">Código QR</label>
                    <input type="text" class="form-control" id="codigoQR" name="codigoQR" placeholder="Digita numero de lote">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;
                    ?>">
                    <input name="caja" type="hidden" value=" <?php
                        echo $caja; 
                    ?>">
                    <input name="metodo" type="hidden" value=" <?php
                        echo $metodo; 
                    ?>">
                </div>        
                <br>

   
                
                <input type="submit" name="Crear" >
            </form>
        </div>
        
    </div>
    
    <br>    

        
        

<?php
    presentar_tabla_segun_caja($caja,$pedido);
    ?>

 <?php
            }
            function presentar_tabla_segun_caja($numCaja, $numPedido){
                $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
                ?>
                <table border="1">
            <tr>
                <td>id</td>
                <td>MOLD</td>
                <td>ANT/POS</td>
                <td>UPP/LOW</td>
                <td>SHADE</td>
                <td>LOTE</td>
                <td>TOTAL</td>
                
            </tr>
            
            <?php
            $sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE caja ='". $numCaja. "'"." AND pedidoId = '". $numPedido. "'"." GROUP BY mold, shade, lote ORDER BY mold;";
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
                <td><?php echo $mostrar['total'] ?></td>
                
            </tr>
            <?php
            }
                //a continuación consulto el total de juegos empacados por caja.
           
           $sqlC="SELECT SUM(juegos) AS total FROM listaEmpaque WHERE caja ='". $numCaja. "' AND pedidoId = '". $numPedido. "'";
            $resultC=mysqli_query($conexion,$sqlC);
            
            while($mostrarC=mysqli_fetch_array($resultC)){
            $juegosCaja=$mostrarC['total'];
            }
            
             //a continuación consulto el total de juegos empacados de todo el pedido
           
           $sqlE="SELECT SUM(juegos) AS total FROM listaEmpaque WHERE pedidoId = '". $numPedido. "'";
            $resultE=mysqli_query($conexion,$sqlE);
            
            while($mostrarE=mysqli_fetch_array($resultE)){
            $juegosTotEmpacados=$mostrarE['total'];
            }
            
            //a continuación consulto el total de juegos del pedido
           
           $sqlP="SELECT juegosTotales AS total FROM pedidos2 WHERE idP ='". $numPedido. "'";
            $resultP=mysqli_query($conexion,$sqlP);
            
            while($mostrarP=mysqli_fetch_array($resultP)){
            $juegosPedido=$mostrarP['total'];
            }
            //calculo los juegos que faltan por empacar de este pedido.
            
            $juegosFaltan=$juegosPedido-$juegosTotEmpacados;
            
           
            ?>
        </table>
        
        <br></br>
        <table border="1">
            <tr>
                <td>Caja</td>
                <td>Van</td>
                <td>Pedido</td>
                <td>Faltan</td>
                
                
            </tr>
            
          
            <tr>
                <td><?php echo $juegosCaja ?></td>
                <td><?php echo $juegosTotEmpacados ?></td>
                <td><?php echo $juegosPedido ?></td>
                <td><?php echo $juegosFaltan ?></td>
                
                
            </tr>
           
        </table>
        </center>
    
</body>
</html>
        <?php
            }
            ?>
            