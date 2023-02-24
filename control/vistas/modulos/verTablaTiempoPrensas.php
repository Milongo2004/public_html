<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiempo_Prensas</title>
</head>
<body>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>
    

            <?php
          //selecciono las el tipo de filtro para ver los registros de tiempo.
            ?>
            
            <div class="container mt-5"><center>
        <h1>Filtros de búsqueda Tiempo Prensas</h1>
    
        
        <div class="row">
            
          
            <form action="verTablaTiempoPrensas2.php" method="get">
            
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
                    <br></br>
                    
                    
                     
                     <div class="mb-3">
                          
                          <label for="prensa" class="form-label">Prensa</label>
                        <select class="form-select" id="prensa" name="prensa" aria-label="Default select example">
                        <option value="">Seleccione Prensa</option>
                        <option value="1">Prensa 1</option>
                        <option value="2">Prensa 2</option>
                        <option value="3">Prensa 3</option>
                        
                       
                        
                    </select>
                    </div>
                    <br>
                      
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>

    <h1>Tabla Tiempos Prensas</h1>
    
    <br>

    
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Prensa</td>
                <td>Tiempo Activa</td>
                <td>Tiempo inactiva</td>
                <td>Fecha y hora</td>
                
            </tr>
            
            <?php
            
            
            //muestro todos los registros
    
            $sql="SELECT * FROM tiempoPrensas ORDER BY `id` DESC LIMIT 100";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['prensa'] ?></td>
                <td><?php echo $mostrar['tiempoActiva'] ?></td>
                <td><?php echo $mostrar['tiempoInactiva'] ?></td>
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                
            </tr>
            <?php
            }
            ?>
        </table>
        </center>


    
</body>
</html>