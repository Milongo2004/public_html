<?php
    
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    
    //reviso si me han llegado datos por el método get
    
        $fecha=$_GET ["fecha"];
        //echo $fecha;
        $turno=$_GET ["turno"];
        //echo $turno;
        $prensada=$_GET ["prensada"];
        
         //limito el tamaño de los datos

$fecha = substr($fecha, int -12);
$turno = substr($turno, int -10);
$prensada = substr($prensada, int -2);
        
        //elimino los espacios en blanco del string turno.
        
        $turno=trim($turno," ");
        //echo "fecha sin espacios en blanco".$fecha;
        
        
//exploto la fecha para presentar los valores como predeterminados y así evitar la movimientos innecesarior

$date = explode ("-",$fecha);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Programación</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
</head>
<body>
    
    <center><h1>Ingrese los datos de la prensada</h1>
    <div class="container mt-5">
        <div class="row">
            <form action="progProduccion3.php" method="POST">
                
               
               <div class="mb-3">
    
                      <div class="mb-3">
                          
                    <label for="Ano" class="form-label">Fecha*</label>
                    <select class="form-select" id="Ano" name="Ano" aria-label="Default select example">
                        <?php   if($fecha==0){?>
                        <option value="">Año</option>
                        <!--<option value="22">2022</option>-->
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2027</option>
                        <option value="27">2028</option>
                        <option value="28">2029</option>
                        <option value="29">2030</option>
                        <option value="30">2031</option>
                        <option value="31">2032</option>
                        <?php
                        }
                        else{
                            ?>
                            <option value="<?php echo (intval($date[0])-2000);  ?>"><?php echo $date[0];  ?></option>
                        <option value="">Año</option>
                        <!--<option value="22">2022</option> -->
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2027</option>
                        <option value="27">2028</option>
                        <option value="28">2029</option>
                        <option value="29">2030</option>
                        <option value="30">2031</option>
                        <option value="31">2032</option>
                        <?php
                        }
                        ?>
                        
                    </select>
                    <label for="Mes" class="form-label"></label>
                    <select class="form-select" id="Mes" name="Mes" aria-label="Default select example">
                        <?php   if($fecha==0){?>
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
                        
                         <?php
                        }
                        else{
                            ?>
                            <option value="<?php echo $date[1];  ?>"><?php switch ($date[1]) {
   
    case 1:
        echo "Enero";
        break;
    case 2:
        echo "Febrero";
        break;
        case 3:
        echo "Marzo";
        break;
        case 4:
        echo "Abril";
        break;
        case 5:
        echo "Mayo";
        break;
        case 6:
        echo "Junio";
        break;
        case 7:
        echo "Julio";
        break;
        case 8:
        echo "Agosto";
        break;
        case 9:
        echo "Septiembre";
        break;
        case 10:
        echo "Octubre";
        break;
        case 11:
        echo "Noviembre";
        break;
        case 12:
        echo "Diciembre";
        break;
}  ?></option>
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
                        
                         <?php
                        }
                        ?>
                        
                    </select>
                    
                     
                    <label for="Dia" class="form-label"></label>
                    <select class="form-select" id="Dia" name="Dia" aria-label="Default select example">
                        <?php   if($fecha==0){?>
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
                         <?php
                        }
                        else{
                            ?>
                        <option value="<?php echo $date[2];  ?>"><?php echo $date[2];  ?></option>
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
                         <?php
                        }
                        ?>
                         </select>
                         
                         </div>
<br>

  <div class="mb-3">
                    <label for="turno" class="form-label">Turno*</label>
                    <select class="form-select" id="turno" name="turno" aria-label="Default select example">
                        <?php   if($fecha==0){?>
                        <option value="">Selecciona</option>
                        <option value="mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                         <?php
                        }
                        else{
                            ?>
                        <option value="<?php echo $turno;  ?>"><?php echo $turno;  ?></option>
                        <option value="">Selecciona</option>
                        <option value="mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                         <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                
                  <div class="mb-3">
                    <label for="prensada" class="form-label">Prensada*</label>
                    <select class="form-select" id="prensada" name="prensada" aria-label="Default select example">
                        <?php   if($fecha==0){?>
                        <option value="">Selecciona</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                        <option value="5">5°</option>
                        <option value="6">6°</option>
                        <option value="7">7°</option>
                        
                         <?php
                        }
                        else{
                            ?>
                        <option value="<?php echo $prensada;  ?>"><?php echo $prensada."°";  ?></option>
                        <option value="">Selecciona</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                        <option value="5">5°</option>
                        <option value="6">6°</option>
                        <option value="7">7°</option>
                        
                         <?php
                        }
                        ?>
                    </select>
                </div>

                      
                </div>
                     
                     <br>
                
                <input type="submit" name="Programar" >
            </form>
            </center>
        </div>
        
    </div>
</body>
</html>