<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
   
?>

<!DOCTYPE html>
<html lang="en">
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaGranel.php'">Regresar</button>
    
    <!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/cambiarPrensada.php?turno=<?php //echo $turno?>&fecha=<?php //echo $fecha?>">Cambiar prensada</button>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/cambiarTurno.php?prensada=<?php //echo $prensada?>&fecha=<?php //echo $fecha?> ">Cambiar Turno</button>-->
			
<head>
	<meta charset="UTF-8">
	<title>CreaRotulo</title>
	
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

    <div class="container mt-5">
        <h1>Produccion a granel sin ID</h1>
        <h1>Crear Rotulo </h1>
        
        <div class="row">
            <form action="creaRotuloGranel.php" method="POST">
            

         <div class="mb-3">
                    <label for="color" class="form-label">Seleccionar Color</label>
                    <select class="form-select" autofocus id="color" name="color" aria-label="Default select example">
                        <option selected>Selecciona un color</option>
                    <?php
                        $sql2="SELECT * FROM colores2 ORDER BY id";
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
                    <br></br>
                    
                    <div class="mb-3">
                    <label for="refs" class="form-label">Seleccionar referencia</label>
                    <select class="form-select"  id="refs" name="referencia" aria-label="Default select example">
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
        
             <label for="gramos" class="form-label">Gramos</label>
             <input type="text" class="form-control "  id="gramos" name="gramos" style="width: 100px">

                      
                   
                </div>
                <br>
                <input type="submit" name="Crear" >
            </form>
        </div>
        
        
         <br></br> 
        
        <table border="1"> 
        
        <tr>
                
                <td colspan="3">Últimos Rótulos creados</td>
                
                
                
            </tr>
            <tr>
                
               
                <td>Referencia</td>
                <td>Color</td>
                 <td><center>ID </center></td>
                
                
            </tr>
            
            <?php
        
            
            
           $sql= "SELECT rotulos2.*, referencias2.`nombre` AS referencia, colores2.`nombre` AS color FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId`= colores2.`id` ORDER BY id DESC limit 10";
            
            $result=mysqli_query($conexion,$sql);
            //echo $sql;
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                
                <td><?php echo $mostrar['referencia'] ?></td>
                <td><?php echo $mostrar['color'] ?></td>
                <td><?php echo $mostrar['id'] ?></td>
                
               
 <!--<td><a href="eliminar_lotes.php?id=<?php //echo $mostrar['id'];?>">Eliminar</a></td>
 <td><a href="editar_lotes.php?id=<?php //echo $mostrar['id'];?>">Editar</a></td>            -->
</tr>
<?php
}
?>
</table>
        
        <br>    
