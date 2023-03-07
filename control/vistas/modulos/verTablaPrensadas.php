<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prensadas</title>
</head>
<body>
    
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>
    
<center>
            <?php
          //selecciono las cajas para ver su contenido y agregar ítems.
            ?>
            
            <div class="container mt-5">
        <h1>Filtros de búsqueda prensadas</h1>
    
        
        <div class="row">
            
          
            <form action="verTablaPrensadas2.php" method="get">
            
            <div class="mb-3">
    
                      <div class="mb-3">
                          
                          <label for="filtro" class="form-label">Tipo de filtro</label>
                    <select class="form-select" id="filtro" name="filtro" aria-label="Default select example">
                        <option value="">Seleccione Filtro</option>
                        <option value="1">Intervalo Fecha y hora</option>
                        <option value="2">Día específico</option>
                        <option value="3">Turno Automático</option>
                        <option value="4">Día y Turno</option>
                       
                        
                    </select>
                    </div>
                    
                     
                      
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
            
            

    <h1>Tabla Prensadas</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                <td>Tiempo Prensada</td>
                <td>Tiempo improductivo</td>
                <td>Fecha y hora</td>
                
            </tr>
            
            <?php
            //muestro sólo valores >1 que equivales a prensadas reales. los valores <1 casi siemre son ensayos.
            //limito a 100 registros
            //$sql="SELECT * FROM cuentaPrensadas2 WHERE minutos > '1' ORDER BY `id` DESC LIMIT 100";
            
            //muestro todos los registros con minutos>1
    
            $sql="SELECT * FROM cuentaPrensadas2 WHERE minutos > '2' ORDER BY `id` DESC LIMIT 100";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['minutos'] ?></td>
                <td><?php echo $mostrar['improductivo'] ?></td>
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                
            </tr>
            <?php
            }
            ?>
        </table>


    </center>
</body>
</html>