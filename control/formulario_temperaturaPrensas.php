
<?php
  
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Temperatura Prensas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        
        <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
        <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaTemperaturaPlanchas.php'">Ver registros de temperatura</button>
			
        <div class="row">
            <form action="registraTemperatura.php" method="get">
                
            <center>
                
                <div class="mb-3">
                    <label for="prensa" class="form-label">Seleccionar Prensa</label>
                    <select class="form-select" id="prensa" name="prensa" aria-label="Default select example" required>
                        <option value="0">Seleccione</option>
                        <option value="1">Prensa 1</option>
                        <option value="2">Prensa 2</option>
                        <option value="3">Prensa 3</option>
                        <option value="4">Prensa Pequeña1</option>
                        <option value="5">Prensa Pequeña2</option>
                  
                    </select>
                </div>
                </center>
                
                
                 <table border="0">
            <tr>
                <td><center>Zona</td>
                <td><center>Indicador</td>
                <td><center>Set Point</td>
                <td><center>Patrón</td>           
                <td><center>Acción SP</td> 
                <td><center>Corriente</td>               
                
                
                
            </tr>
            
            <tr>
    <td>1</td>
    <td><label for="I1" class="form-label"></label><input type="text" class="form-control" id="I1" name="I1" ></td>
    <td><label for="S1" class="form-label"></label><input type="text" class="form-control" id="S1" name="S1" ></td>
    <td><label for="P1" class="form-label"></label><input type="text" class="form-control" id="P1" name="P1" ></td> 
    <td><label for="A1" class="form-label"></label><input type="text" class="form-control" id="A1" name="A1"></td> 
    <td><label for="01" class="form-label"></label><input type="text" class="form-control" id="01" name="01"></td>  
              
                
            </tr>
            
            <tr>
    <td>2</td>
    <td><label for="I2" class="form-label"></label><input type="text" class="form-control" id="I2" name="I2" ></td>
    <td><label for="S2" class="form-label"></label><input type="text" class="form-control" id="S2" name="S2" ></td>
    <td><label for="P2" class="form-label"></label><input type="text" class="form-control" id="P2" name="P2" ></td> 
    <td><label for="A2" class="form-label"></label><input type="text" class="form-control" id="A2" name="A2"></td> 
    <td><label for="02" class="form-label"></label><input type="text" class="form-control" id="02" name="02"></td>  
              
                
            </tr>
            
            <tr>
    <td>3</td>
    <td><label for="I3" class="form-label"></label><input type="text" class="form-control" id="I3" name="I3" ></td>
    <td><label for="S3" class="form-label"></label><input type="text" class="form-control" id="S3" name="S3" ></td>
    <td><label for="P3" class="form-label"></label><input type="text" class="form-control" id="P3" name="P3" ></td> 
    <td><label for="A3" class="form-label"></label><input type="text" class="form-control" id="A3" name="A3"></td> 
    <td><label for="03" class="form-label"></label><input type="text" class="form-control" id="03" name="03"></td>  
              
                
            </tr>
            
            
            <tr>
    <td>4</td>
    <td><label for="I4" class="form-label"></label><input type="text" class="form-control" id="I4" name="I4" ></td>
    <td><label for="S4" class="form-label"></label><input type="text" class="form-control" id="S4" name="S4" ></td>
    <td><label for="P4" class="form-label"></label><input type="text" class="form-control" id="P4" name="P4" ></td> 
    <td><label for="A4" class="form-label"></label><input type="text" class="form-control" id="A4" name="A4"></td> 
    <td><label for="04" class="form-label"></label><input type="text" class="form-control" id="04" name="04"></td>  
              
                
            </tr>
            <tr>
    <td>5</td>
    <td><label for="I5" class="form-label"></label><input type="text" class="form-control" id="I5" name="I5" ></td>
    <td><label for="S5" class="form-label"></label><input type="text" class="form-control" id="S5" name="S5" ></td>
    <td><label for="P5" class="form-label"></label><input type="text" class="form-control" id="P5" name="P5" ></td> 
    <td><label for="A5" class="form-label"></label><input type="text" class="form-control" id="A5" name="A5"></td> 
    <td><label for="05" class="form-label"></label><input type="text" class="form-control" id="05" name="05"></td>  
              
                
            </tr>
            <tr>
    <td>6</td>
    <td><label for="I6" class="form-label"></label><input type="text" class="form-control" id="I6" name="I6" ></td>
    <td><label for="S6" class="form-label"></label><input type="text" class="form-control" id="S6" name="S6" ></td>
    <td><label for="P6" class="form-label"></label><input type="text" class="form-control" id="P6" name="P6" ></td> 
    <td><label for="A6" class="form-label"></label><input type="text" class="form-control" id="A6" name="A6"></td> 
    <td><label for="06" class="form-label"></label><input type="text" class="form-control" id="06" name="06"></td>  
              
                
            </tr>
            <tr>
    <td>7</td>
    <td><label for="I7" class="form-label"></label><input type="text" class="form-control" id="I7" name="I7" ></td>
    <td><label for="S7" class="form-label"></label><input type="text" class="form-control" id="S7" name="S7" ></td>
    <td><label for="P7" class="form-label"></label><input type="text" class="form-control" id="P7" name="P7" ></td> 
    <td><label for="A7" class="form-label"></label><input type="text" class="form-control" id="A7" name="A7"></td> 
    <td><label for="07" class="form-label"></label><input type="text" class="form-control" id="07" name="07"></td>  
              
                
            </tr>
            <tr>
    <td>8</td>
    <td><label for="I8" class="form-label"></label><input type="text" class="form-control" id="I8" name="I8" ></td>
    <td><label for="S8" class="form-label"></label><input type="text" class="form-control" id="S8" name="S8" ></td>
    <td><label for="P8" class="form-label"></label><input type="text" class="form-control" id="P8" name="P8" ></td> 
    <td><label for="A8" class="form-label"></label><input type="text" class="form-control" id="A8" name="A8"></td> 
    <td><label for="08" class="form-label"></label><input type="text" class="form-control" id="08" name="08"></td>  
              
                
            </tr>
            <tr>
    <td>9</td>
    <td><label for="I9" class="form-label"></label><input type="text" class="form-control" id="I9" name="I9" ></td>
    <td><label for="S9" class="form-label"></label><input type="text" class="form-control" id="S9" name="S9" ></td>
    <td><label for="P9" class="form-label"></label><input type="text" class="form-control" id="P9" name="P9" ></td> 
    <td><label for="A9" class="form-label"></label><input type="text" class="form-control" id="A9" name="A9"></td> 
    <td><label for="09" class="form-label"></label><input type="text" class="form-control" id="09" name="09"></td>  
              
                
            </tr>
           
            <tr>
    <td>10</td>
    <td><label for="I10" class="form-label"></label><input type="text" class="form-control" id="I10" name="I10" ></td>
    <td><label for="S10" class="form-label"></label><input type="text" class="form-control" id="S10" name="S10" ></td>
    <td><label for="P10" class="form-label"></label><input type="text" class="form-control" id="P10" name="P10" ></td> 
    <td><label for="A10" class="form-label"></label><input type="text" class="form-control" id="A10" name="A10"></td> 
    <td><label for="010" class="form-label"></label><input type="text" class="form-control" id="010" name="010"></td>  
              
            </tr>
            
             <tr>
    <td>11</td>
    <td><label for="I11" class="form-label"></label><input type="text" class="form-control" id="I11" name="I11" ></td>
    <td><label for="S11" class="form-label"></label><input type="text" class="form-control" id="S11" name="S11" ></td>
    <td><label for="P11" class="form-label"></label><input type="text" class="form-control" id="P11" name="P11" ></td> 
    <td><label for="A11" class="form-label"></label><input type="text" class="form-control" id="A11" name="A11"></td> 
    <td><label for="011" class="form-label"></label><input type="text" class="form-control" id="011" name="011"></td>  
              
                
            </tr>
                </table>
                <input type="submit" name="Crear" >
            </form>
            <br></br>
            <br></br>
            
            <h6>Nota: separar los decimales con punto</h6>
        </div>
        
    </div>
    <br>
    </br>
</body>
</html>