<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

  //$filtro=$_GET ["filtro"];
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProgramaciónDeProducción</title>
</head>
<body>
    	<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>

            
                   <div class="container mt-5">
        
    
        <h2>Programación Prensadas</h2>
        <div class="row">
            <form action="nuevaProgramacion2.php" method="get">
            
            <div class="mb-3">
    
                      <div class="mb-3">
                          
                    <label for="Ano" class="form-label">Fecha</label>
                    <select class="form-select" id="Ano" name="Ano" aria-label="Default select example">
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
                    <label for="Mes" class="form-label"></label>
                    <select class="form-select" id="Mes" name="Mes" aria-label="Default select example">
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
                    
                     
                    <label for="Dia" class="form-label"></label>
                    <select class="form-select" id="Dia" name="Dia" aria-label="Default select example">
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
                         
                         </div>
<br>

  <div class="mb-3">
                    <label for="turno" class="form-label">Turno</label>
                    <select class="form-select" id="turno" name="turno" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
                </div>
                <br>
                
                  <div class="mb-3">
                    <label for="prensada" class="form-label">Prensada</label>
                    <select class="form-select" id="prensada" name="prensada" aria-label="Default select example">
                        <option value="">Selecciona</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                        <option value="5">5°</option>
                        <option value="6">6°</option>
                        <option value="7">pequeña</option>
                        <option value="8">noche1</option>
                        <option value="9">noche2</option>
                    </select>
                </div>

                      
                </div>
                     
                     <br>
                <input type="submit" name="Crear" >
            </form>
                  </body>
</html>