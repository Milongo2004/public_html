<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    
    //defino el tiempo de autorefresh en segundos.
    
    $ActualizarDespuesDe = 30;
    
    // Envíe un encabezado Refresh al navegador preferido.
   header('Refresh: '.$ActualizarDespuesDe);
    
    //defino variables globales
    $ano=null;
    $mes=null;
    $dia=null;
    $hora=null;
    $desdeAno=null;
    $hastaAno=null;
    $desdeMes=null;
    $hastaMes=null;
    $desdeDia=null;
    $hastaDia=null;
    $desdeHora=null;
    $hastaHora=null;
    
    //obtengo el tipo de filtro.
    
    $filtro=$_GET ["filtro"];
    
    
    //obtengo el dato del turno
    
    $turno=$_GET ["turno"];
    
    
    switch ($filtro){
        case 1:
            //obtengo los datos del rango de fecha y hora que deseo visualizar y procesar.

    $desdeAno=$_GET ["desdeAno"];
    $hastaAno=$_GET ["hastaAno"];
     $desdeMes=$_GET ["desdeMes"];
    $hastaMes=$_GET ["hastaMes"];
     $desdeDia=$_GET ["desdeDia"];
    $hastaDia=$_GET ["hastaDia"];
     $desdeHora=$_GET ["desdeHora"];
    $hastaHora=$_GET ["hastaHora"];
    
            break;
            
            case 2:
            //obtengo los datos del rango de fecha y hora que deseo visualizar y procesar.

    $desdeAno=$_GET ["desdeAno"];
    $hastaAno=$desdeAno;
     $desdeMes=$_GET ["desdeMes"];
    $hastaMes=$desdeMes;
     $desdeDia=$_GET ["desdeDia"];
    $hastaDia=$desdeDia;
     $desdeHora="00";
    $hastaHora="23";
    
            break;
            
            case 3:
            //obtengo los datos del rango de fecha y hora que deseo visualizar y procesar.
            
            //primero consulto el valor de fecha y hora del último registro subido a la base en la tabla cuentaPrensadas2
           
           $sqlF="SELECT *, EXTRACT(YEAR FROM fechaCreacion) AS ano, EXTRACT(MONTH FROM fechaCreacion) AS mes, EXTRACT(DAY FROM fechaCreacion) AS dia, EXTRACT(HOUR FROM fechaCreacion) AS hora FROM cuentaPrensadas2 ORDER BY id DESC LIMIT 1";
           
            $resultF=mysqli_query($conexion,$sqlF);
            
            while($mostrarF=mysqli_fetch_array($resultF)){
            $ano=$mostrarF['ano'];
            $mes=$mostrarF['mes'];
            $dia=$mostrarF['dia'];
            $hora=$mostrarF['hora'];
           
            
            }
            $ano=intval($ano);
            $mes=intval($mes);
            $dia=intval($dia);
            $hora=intval($hora);
            
            
            
            
            
            if ($hora < 6){
                //echo"turno de la noche";
    $desdeAno=$ano;
    $hastaAno=$desdeAno;
     $desdeMes=$mes;
    $hastaMes=$desdeMes;
     $desdeDia=$dia-1;
    $hastaDia=$dia;
     $desdeHora=22;
    $hastaHora=6;
            }
           else if ($hora >= 6 and $hora < 14){
           //else if ( $hora=="16"){
              // echo"turno de la mañana";
    $desdeAno=$ano;
    $hastaAno=$desdeAno;
     $desdeMes=$mes;
    $hastaMes=$desdeMes;
     $desdeDia=$dia;
    $hastaDia=$dia;
     $desdeHora=6;
    $hastaHora=14;
            }
            else if ($hora >= 14 and $hora < 22){
                //echo"turno de la tarde";
    $desdeAno=$ano;
    $hastaAno=$desdeAno;
     $desdeMes=$mes;
    $hastaMes=$desdeMes;
     $desdeDia=$dia;
    $hastaDia=$dia;
     $desdeHora=14;
    $hastaHora=22;
            }
            else if ($hora >= 22){
                //echo"turno de la noche";
    $desdeAno=$ano;
    $hastaAno=$desdeAno;
     $desdeMes=$mes;
    $hastaMes=$desdeMes;
     $desdeDia=$dia;
    $hastaDia=$dia+1;
     $desdeHora=22;
    $hastaHora=6;
            }
else{
   
}
            break;
            
            case 4:
                
            //obtengo los datos del rango de fecha y hora que deseo visualizar y procesar en función del turno que quiera visualizar.
switch ($turno){
    
    case 1:
         $desdeAno=$_GET ["desdeAno"];
    $hastaAno=$desdeAno;
     $desdeMes=$_GET ["desdeMes"];
    $hastaMes=$desdeMes;
     $desdeDia=$_GET ["desdeDia"];
    $hastaDia=$desdeDia;
     $desdeHora="6";
    $hastaHora="14";
    
        break;
        
         case 2:
         $desdeAno=$_GET ["desdeAno"];
    $hastaAno=$desdeAno;
     $desdeMes=$_GET ["desdeMes"];
    $hastaMes=$desdeMes;
     $desdeDia=$_GET ["desdeDia"];
    $hastaDia=$desdeDia;
     $desdeHora="14";
    $hastaHora="22";
    
        break;
    
case 3:
    $desdeAno=$_GET ["desdeAno"];
    $hastaAno=$desdeAno;
     $desdeMes=$_GET ["desdeMes"];
    $hastaMes=$desdeMes;
     $desdeDia=$_GET ["desdeDia"];
    $hastaDia=$desdeDia+1;
     $desdeHora="22";
    $hastaHora="6";
    
    break;
    
}
    
            break;
            
    }
    
    
    
    //defino variables principales del rango
    
    $desde="";
    $hasta="";
    
   
    
    //concateno variables desde y hasta
    
    $desde = $desdeAno."-".$desdeMes."-".$desdeDia. " ".$desdeHora.":00";
    if ($filtro==1 || $filtro==3 || $filtro==4){
        if($hastaHora==24){
        $hasta = $hastaAno."-".$hastaMes."-".$hastaDia. " "."23".":59";
        }
        else{
    $hasta = $hastaAno."-".$hastaMes."-".$hastaDia. " ".$hastaHora.":00";
        }
    }
    else if ($filtro==2){
        $hasta = $hastaAno."-".$hastaMes."-".$hastaDia. " ".$hastaHora.":59";
    }
    
 //Calculo el total de registros en este rango para hallar el promedio y presentar la cuenta en el título
            
            $sqlR="SELECT COUNT(id) AS cuenta FROM cuentaPrensadas2  WHERE minutos >= '2' AND fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."'";
            $resultR=mysqli_query($conexion,$sqlR);
            
            while($mostrarR=mysqli_fetch_array($resultR)){
            $registros=$mostrarR['cuenta'];
            
            }
            
            //a continuación consulto el total de minutos productivos  sin tener en cuenta los datos ensayos de funcionamiento.
           
           $sqlC="SELECT SUM(minutos) AS minutos FROM cuentaPrensadas2  WHERE minutos>'2' AND fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."'";
            $resultC=mysqli_query($conexion,$sqlC);
            
            while($mostrarC=mysqli_fetch_array($resultC)){
            $tiempoSacado=$mostrarC['minutos'];
            $tiempoSacado = round($tiempoSacado, 2, $mode = PHP_ROUND_HALF_UP);
            }
            
            //a continuación consulto el primer registro del intervalo de tiempo para identificar el primer improductivo y no tenerlo en cuenta en la suma de improductivos.
           
           $sqlI="SELECT * FROM cuentaPrensadas2  WHERE fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."' ORDER BY id ASC LIMIT 1";
            $resultI=mysqli_query($conexion,$sqlI);
            
            while($mostrarI=mysqli_fetch_array($resultI)){
            $primerImproductivo=$mostrarI['improductivo'];
            $primerImproductivo = round($primerImproductivo, 2, $mode = PHP_ROUND_HALF_UP);
            }
            
             //a continuación consulto el total minutos improductivos de este turno.
           
           $sqlE="SELECT SUM(improductivo) AS improductivo FROM cuentaPrensadas2  WHERE fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."'";
            $resultE=mysqli_query($conexion,$sqlE);
            
            while($mostrarE=mysqli_fetch_array($resultE)){
            $tiempoOtros=$mostrarE['improductivo'];
            $tiempoOtros = round($tiempoOtros, 2, $mode = PHP_ROUND_HALF_UP);
            
            }
            $tiempoOtros=$tiempoOtros-$primerImproductivo;
            
            //consulto los valores mayor y menor de cada uno de los datos Sacado e improductivo.
            
            //mayor de sacado
            
            $sqlMS="SELECT * FROM cuentaPrensadas2  WHERE fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."' ORDER BY minutos DESC LIMIT 1";
            $resultMS=mysqli_query($conexion,$sqlMS);
            
            while($mostrarMS=mysqli_fetch_array($resultMS)){
            $mayorSacado=$mostrarMS['minutos'];
            $mayorSacado = round($mayorSacado, 2, $mode = PHP_ROUND_HALF_UP);
            }
            
            //menor de sacado
            
            $sqlmS="SELECT * FROM cuentaPrensadas2  WHERE minutos>'2' AND fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."' ORDER BY minutos ASC LIMIT 1";
            $resultmS=mysqli_query($conexion,$sqlmS);
            
            while($mostrarmS=mysqli_fetch_array($resultmS)){
            $menorSacado=$mostrarmS['minutos'];
            $menorSacado = round($menorSacado, 2, $mode = PHP_ROUND_HALF_UP);
            }
            
            //mayor de Otros
            
            $sqlMO="SELECT * FROM cuentaPrensadas2  WHERE fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."' ORDER BY improductivo DESC LIMIT 2";
            $resultMO=mysqli_query($conexion,$sqlMO);
            
            while($mostrarMO=mysqli_fetch_array($resultMO)){
            $mayorOtros=$mostrarMO['improductivo'];
            $mayorOtros = round($mayorOtros, 2, $mode = PHP_ROUND_HALF_UP);
            }
            
            //menor de Otros
            
            $sqlmO="SELECT * FROM cuentaPrensadas2  WHERE fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."' ORDER BY improductivo ASC LIMIT 1";
            $resultmO=mysqli_query($conexion,$sqlmO);
            
            while($mostrarmO=mysqli_fetch_array($resultmO)){
            $menorOtros=$mostrarmO['improductivo'];
            $menorOtros = round($menorOtros, 2, $mode = PHP_ROUND_HALF_UP);
            }
           
            //calculo los juegos que faltan por empacar de este pedido.
            
            $tiempoLaborado=$tiempoSacado+$tiempoOtros;
            
           
            //calculo los porcentajes de los totales de tiempo sobre el total general
            
            $porcentajeSacado=$tiempoSacado/$tiempoLaborado*100;
            $porcentajeSacado = round($porcentajeSacado, 2, $mode = PHP_ROUND_HALF_UP);
            $porcentajeOtros=$tiempoOtros/$tiempoLaborado*100;
            $porcentajeOtros = round($porcentajeOtros, 2, $mode = PHP_ROUND_HALF_UP);
            
            //calculo los promedios
            
            $promedioSacado=$tiempoSacado/$registros;
            $promedioSacado = round($promedioSacado, 2, $mode = PHP_ROUND_HALF_UP);
            $promedioOtros=$tiempoOtros/$registros;
            $promedioOtros = round($promedioOtros, 2, $mode = PHP_ROUND_HALF_UP);
            
        //calculo rendimiento prensadas por hora.
        
        $rendimiento=$registros/($tiempoLaborado/60);
        $rendimiento = round($rendimiento, 2, $mode = PHP_ROUND_HALF_UP);
        
        //calculo eficiencia del sacador con relación al estándar de 10,31 minutos por prensada.
        
        $estandar= 10.31;
        
        $eficienciaSacado=$estandar/$promedioSacado*100;
        $eficienciaSacado = round($eficienciaSacado, 2, $mode = PHP_ROUND_HALF_UP);
        
        //calculo la eficiciencia general basado en el estándar, las prensadas contadoas y el tiempo total laborado.
        
        $eficienciaGeneral=$registros*$estandar/$tiempoLaborado*100;
        $eficienciaGeneral = round($eficienciaGeneral, 2, $mode = PHP_ROUND_HALF_UP);
            

?>

<!DOCTYPE html>
<html lang="en">
    
			<button onclick="location.href='https://trazabilidadmasterdent.online/control/'">Inicio</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaPrensadas.php'">Prensadas Gerneral</button>
			
		
			<!--    botón de ir atrás.
            <form action="verTablaPrensadas2.php" method="get" name="FiltroPrensadas2">
                  
                    <input name="filtro" type="hidden" value=" <?php
                        echo $filtro; 
                    ?>">

                <button onClick='submitForm()'>Atrás</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('FiltroPrensadas2').submit();
    }
</script>
		-->	
<head>
	<meta charset="UTF-8">
	<title>PrensadasFiltradas</title>
</head>
<body>
    <center>

 <h2>Prensadas del 
        
                 <?php
                 echo " ".$desde." ";

            ?>

                al

            <?php
             echo " ".$hasta;
             
            ?>
            </h2>
            <br>
             <?php
            /*
            
 //muestro datos generales en forma de lista
 
        <h2>Prensadas =  
         <?php
                 echo " ".$registros." ";

                
            ?>
        </h2>
           
            
            <h2>Rendimiento: 
             <?php
                 echo " ".$rendimiento." ";

                
            ?>
            prensadas/hora
            </h2>
            
             <h2>Eficiencia Sacado: 
             <?php
                 echo " ".$eficienciaSacado." ";

                
            ?>
            %
            </h2>
             <h2>Eficiencia General: 
             <?php
                 echo " ".$eficienciaGeneral." ";

                
            ?>
            %
            </h2>
            
            
            //muestro datos generales en forma de tabla
            ?>
            <table ALIGN="left" border="1">
            <tr>
                <TD ROWSPAN="2"><h3>Prensadas</td>
                <TD ROWSPAN="2"><h3>prensadas/hora </td>
                <TH COLSPAN="2"><h3>Eficiencia (%)</th>
                
                
            </tr>
            <tr>
                
                
                <td><h3>Sacado</td>
                <td><h3>General</td>
                
            </tr>
             <tr>
                <td><center><?php echo $registros ?></td>
                <td><center><?php echo $rendimiento ?></td>
                <td><center><?php echo $eficienciaSacado ?></td>
                <td><center><?php echo $eficienciaGeneral ?></td>
                
            </tr>
            </table>
        <br>
        
        </table>
        <?php
            */
        ?>
        

    
        
         <?php
        //muestro  la tabla del intervalo de tiemop seleccionado con los datos filtrados.
         ?>

        <table ALIGN="left" border="1">
            <tr>
                <TH COLSPAN="4" bgcolor="FEC972" ><h3>PRENSADAS</th>
            </tr>
            <tr>
                <td bgcolor="FFFA93"><h3>id</td>
                <td bgcolor="FFFA93"><h3>Sacado (minutos)</td>
                <td bgcolor="FFFA93"><h3>Otras tareas (minutos)</td>
                <td bgcolor="FFFA93"><h3>Fecha y hora</td>
                
            </tr>
            
            <?php
            $sql="SELECT * FROM cuentaPrensadas2 WHERE fechaCreacion BETWEEN '" .$desde."' AND '".$hasta."' ORDER BY id DESC";

            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><center><?php echo $mostrar['minutos'] ?></td>
                <td><center><?php echo $mostrar['improductivo'] ?></td>
                <td><center><?php echo $mostrar['fechaCreacion'] ?></td>
                
            </tr>
            <?php
            }

            ?>
              </table>
    </div>
    <table ALIGN="center" border="1">
            
            <tr>
                <TH COLSPAN="4" bgcolor="FEC972"><h3>MARCADOR</th>
            </tr>
            <tr>
                <td></td>
                <td bgcolor="FFFA93"><h3>Sacado (minutos)</td>
                <td bgcolor="FFFA93"><h3>Otras tareas (minutos)</td>
                <td bgcolor="FFFA93"><h3>Total</td>
                
                
            </tr>
            
          
            <tr>
                <td>Suma</td>
                <td><center><?php echo $tiempoSacado ?></td>
                <td><center><?php echo $tiempoOtros ?></td>
                <td><center><?php echo $tiempoLaborado ?></td>
                
                
            </tr>
            
            <tr>
                <td>% Tiempo</td>
                <td><center><?php echo $porcentajeSacado ?></td>
                <td><center><?php echo $porcentajeOtros ?></td>
                <td></td>
                
                
            </tr>
            
            <tr>
                <td bgcolor="FFFA93">Promedio</td>
                <td bgcolor="C4CFFF"><center><?php echo $promedioSacado ?></td>
                <td bgcolor="C4CFFF"><center><?php echo $promedioOtros ?></td>
                <td></td>
                
                
            </tr>
             <tr>
                <td>Mayor Valor</td>
                <td><center><?php echo $mayorSacado ?></td>
                <td><center><?php echo $mayorOtros ?></td>
                <td></td>
                
                
            </tr>
            <tr>
                <td>Menor Valor</td>
                <td><center><?php echo $menorSacado ?></td>
                <td><center><?php echo $menorOtros ?></td>
                <td></td>
                
                
            </tr>
            <tr>
                <TD ROWSPAN="2" bgcolor="FFFA93"><h3>Prensadas</td>
                <TD ROWSPAN="2" bgcolor="FFFA93"><h3><center>prensadas/hora </td>
                <TH COLSPAN="2" bgcolor="FEC972"><h3>Eficiencia (%)</th>
                
                
            </tr>
            <tr>
                
                
                <td bgcolor="FFFA93"><h3><center>Sacado</td>
                <td bgcolor="FFFA93"><h3><center>General</td>
                
            </tr>
             <tr>
                <td bgcolor="ADFF95"><h3><center><?php echo $registros ?></td>
                <td bgcolor="C4CFFF"><h3><center><?php echo $rendimiento ?></td>
                <td bgcolor="<?php if($eficienciaSacado<85){
                echo "red";
                }
                else if ($eficienciaSacado>=85 and $eficienciaSacado<95){
                    echo "yellow";
                }
                else{
                    echo "green";
                }
                
                ?>"><h3><center><?php echo $eficienciaSacado ?></td>
                
                <td bgcolor="<?php if($eficienciaGeneral<85){
                echo "red";
                }
                else if ($eficienciaGeneral>=85 and $eficienciaGeneral<95){
                    echo "yellow";
                }
                else{
                    echo "green";
                }
                
                ?>"><h3><center><?php echo $eficienciaGeneral ?></td>
                
            </tr>
           
        </table>
    </div>
    </center>
    <BR CLEAR="all">
            
   <h3>Estándar:  
             <?php
                 echo " ".$estandar." minutos/prensada ";

                
            ?>
            </h3>
            <h4>NOTA: Los ensayos de funcionamiento se muestran en tabla pero no se suman en el marcador</h4>
            <br></br>
    
    
</body>
</html>