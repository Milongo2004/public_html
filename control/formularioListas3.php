<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
//$cajas=null;

?>

<!DOCTYPE html>
<html lang="en">
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaListaEmpaque2.php'">Listas General</button>
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
        <h2>Ingreso uno a uno</h2>
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
                    <label for="codigoQR" class="form-label">Código QR</label>
                    <input type="text" class="form-control" id="codigoQR" name="codigoQR" placeholder="Digita numero de lote">
                    <input name="cajas" type="hidden" value="null">
                </div>        
                <br>

   
                

                <input type="submit" name="Crear" >
            </form>
        </div>
        
    </div>
    
    <br>    

    
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
            $sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque GROUP BY mold, shade, lote ORDER BY mold;";
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
            ?>
        </table>
        <br></br>
        <table border="1">
            <tr>
                <td>Total Juegos</td>
                
                
            </tr>
            
            <?php
            $sql="SELECT SUM(juegos) AS total FROM listaEmpaque;";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['total'] ?></td>
                
                
            </tr>
            <?php
            }
            ?>
        </table>
</center>
    
</body>
</html>