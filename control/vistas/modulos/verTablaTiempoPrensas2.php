<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

  $filtro=$_GET ["filtro"];
  
  $prensa=$_GET ["prensa"];
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiempo_Prensas</title>
</head>
<body>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>
    	
    	<center>
        <h2>Tiempos de la prensa <?php echo $prensa ?></h2>

            <?php
          // presento formulario en función de tipo de filtro a utilizar. 
          
          switch ($filtro){
              case 1:
                  ?>
                   <div class="container mt-5">
                       
                       
        <h2>Por fecha y hora</h2>
        <div class="row">
            <form action="filtraTiempoPrensas.php" method="get">
            
            <div class="mb-3">
    
                      <div class="mb-3">
                          
                    <label for="desdeAno" class="form-label">Desde</label>
                    <select class="form-select" id="desdeAno" name="desdeAno" aria-label="Default select example">
                        <option value="">Año</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2027</option>
                        <option value="27">2028</option>
                        <option value="28">2029</option>
                        <option value="29">2030</option>
                        <option value="30">2031</option>
                        <option value="31">2032</option>
                        
                    </select>
                    <label for="desdeMes" class="form-label"></label>
                    <select class="form-select" id="desdeMes" name="desdeMes" aria-label="Default select example">
                        <option value="">Mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        
                    </select>
                    
                     
                    <label for="desdeDia" class="form-label"></label>
                    <select class="form-select" id="desdeDia" name="desdeDia" aria-label="Default select example">
                        <option value="">Día</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10<option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        
                         </select>
                         
                         <label for="desdeHora" class="form-label"></label>
                    <select class="form-select" id="desdeHora" name="desdeHora" aria-label="Default select example">
                        <option value="">Hora</option>
                        <option value="0">0:00</option>
                        <option value="1">1:00</option>
                        <option value="2">2:00</option>
                        <option value="3">3:00</option>
                        <option value="4">4:00</option>
                        <option value="5">5:00</option>
                        <option value="6">6:00</option>
                        <option value="7">7:00</option>
                        <option value="8">8:00</option>
                        <option value="9">9:00</option>
                        <option value="10">10:00<option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                        <option value="24">23:59</option>
                        
                        
                         </select>
                         <input name="filtro" type="hidden" value=" <?php echo $filtro ?>">
                        
                        <input name="prensa" type="hidden" value=" <?php echo $prensa ?>">
                         
                       </div>
<br>
                      <div class="mb-3">
                          
                    <label for="hastaAno" class="form-label">Hasta</label>
                    <select class="form-select" id="hastaAno" name="hastaAno" aria-label="Default select example">
                        <option value="">Año</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2027</option>
                        <option value="27">2028</option>
                        <option value="28">2029</option>
                        <option value="29">2030</option>
                        <option value="30">2031</option>
                        <option value="31">2032</option>
                        
                    </select>
                    <label for="hastaMes" class="form-label"></label>
                    <select class="form-select" id="hastaMes" name="hastaMes" aria-label="Default select example">
                        <option value="">Mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        
                    </select>
                    
                     
                    <label for="hastaDia" class="form-label"></label>
                    <select class="form-select" id="hastaDia" name="hastaDia" aria-label="Default select example">
                        <option value="">Día</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10<option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        
                         </select>
                         
                         <label for="hastaHora" class="form-label"></label>
                    <select class="form-select" id="hastaHora" name="hastaHora" aria-label="Default select example">
                        <option value="">Hora</option>
                        <option value="0">0:00</option>
                        <option value="1">1:00</option>
                        <option value="2">2:00</option>
                        <option value="3">3:00</option>
                        <option value="4">4:00</option>
                        <option value="5">5:00</option>
                        <option value="6">6:00</option>
                        <option value="7">7:00</option>
                        <option value="8">8:00</option>
                        <option value="9">9:00</option>
                        <option value="10">10:00<option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                        <option value="24">23:59</option>
                        
                        
                         </select>
                         
                       </div>
                     
                     
                      
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
                  <?php
                  break;
                  
                   case 2:
                       
                       ?>
                   <div class="container mt-5">
        
    
        <h2>Día específico</h2>
        <div class="row">
            <form action="filtraTiempoPrensas.php" method="get">
            
            <div class="mb-3">
    
                      <div class="mb-3">
                          
                    <label for="desdeAno" class="form-label">Seleccione Fecha: </label>
                    <select class="form-select" id="desdeAno" name="desdeAno" aria-label="Default select example">
                        <option value="">Año</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2027</option>
                        <option value="27">2028</option>
                        <option value="28">2029</option>
                        <option value="29">2030</option>
                        <option value="30">2031</option>
                        <option value="31">2032</option>
                        
                    </select>
                    
                    <label for="desdeMes" class="form-label"></label>
                    <select class="form-select" id="desdeMes" name="desdeMes" aria-label="Default select example">
                        <option value="">Mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        
                    </select>
                    
                     
                    <label for="desdeDia" class="form-label"></label>
                    <select class="form-select" id="desdeDia" name="desdeDia" aria-label="Default select example">
                        <option value="">Día</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10<option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        
                         </select>
                         <input name="filtro" type="hidden" value=" <?php echo $filtro ?>">
                        
                        <input name="prensa" type="hidden" value=" <?php echo $prensa ?>">
                       </div>
<br>

                      
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
                  <?php
                  
                  break;
                  
                   case 3:
                  
                  ?>
                   <div class="container mt-5">
        
    
        <h2>Selección automática de turno </h2>
        <div class="row">
            <form action="filtraTiempoPrensas.php" method="get" name="turnoAutomatico">
            
            <div class="mb-3">
    
                      
                         <input name="filtro" type="hidden" value=" <?php echo $filtro ?>">
                        
                        <input name="prensa" type="hidden" value=" <?php echo $prensa ?>">
                       </div>


                      
                </div>
                     
                    <button onClick='submitForm()'>Activar Turno Automático</button>
                <!--<input type="submit" name="Crear" >-->
            </form>
            <script>
    function submitForm() {
        document.getElementById('turnoAutomatico').submit();
    }
</script>
                  <?php
                  
                  break;
                  
                  case 4:
                       
                       ?>
                   <div class="container mt-5">
        
    
        <h2>Día y turno específicos</h2>
        <div class="row">
            <form action="filtraTiempoPrensas.php" method="get">
            
            <div class="mb-3">
    
                      <div class="mb-3">
                          
                    <label for="desdeAno" class="form-label">Seleccione Fecha: </label>
                    <select class="form-select" id="desdeAno" name="desdeAno" aria-label="Default select example">
                        <!--<option value="">Año</option>-->
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2027</option>
                        <option value="27">2028</option>
                        <option value="28">2029</option>
                        <option value="29">2030</option>
                        <option value="30">2031</option>
                        <option value="31">2032</option>
                        
                    </select>
                    
                    <label for="desdeMes" class="form-label"></label>
                    <select class="form-select" id="desdeMes" name="desdeMes" aria-label="Default select example">
                        <option value="">Mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                        
                    </select>
                    
                     
                    <label for="desdeDia" class="form-label"></label>
                    <select class="form-select" id="desdeDia" name="desdeDia" aria-label="Default select example">
                        <option value="">Día</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10<option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        
                         </select>
                         <input name="filtro" type="hidden" value=" <?php echo $filtro ?>">
                        
                        <input name="prensa" type="hidden" value=" <?php echo $prensa ?>">
                        
                       </div>
<br>

<div class="mb-3">
    
                      <div class="mb-3">
                          
                    <label for="turno" class="form-label">Seleccione Turno </label>
                    <select class="form-select" id="turno" name="turno" aria-label="Default select example">
                        <option value="">Seleccione</option>
                        <option value="1">Mañana</option>
                        <option value="2">Tarde</option>
                        <option value="3">Noche</option>
                        
                        
                    </select>

                      
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
                  <?php
                  
                  break;
                  
                  
          }
            ?>
            
           <br></br>

    <h1>Tabla Prensadas</h1>
    
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
            $sql="SELECT * FROM tiempoPrensas WHERE `prensa`= '$prensa' ORDER BY `id` DESC LIMIT 100";
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