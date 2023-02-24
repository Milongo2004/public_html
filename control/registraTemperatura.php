<?php 
require_once("herramienta_introducir_datos.php");

//Obtengo los datos del formulario_termperaturaPrensas
$prensa= $_GET ["prensa"];



$I1 =$_GET ["I1"]; $S1 =$_GET ["S1"]; $P1=$_GET ["P1"];  $A1=$_GET ["A1"];  $O1=$_GET ["01"];
$I2 =$_GET ["I2"]; $S2 =$_GET ["S2"]; $P2=$_GET ["P2"];  $A2=$_GET ["A2"];  $O2=$_GET ["02"];
$I3 =$_GET ["I3"]; $S3 =$_GET ["S3"]; $P3=$_GET ["P3"];  $A3=$_GET ["A3"];  $O3=$_GET ["03"];
$I4 =$_GET ["I4"]; $S4 =$_GET ["S4"]; $P4=$_GET ["P4"];  $A4=$_GET ["A4"];  $O4=$_GET ["04"];
$I5 =$_GET ["I5"]; $S5 =$_GET ["S5"]; $P5=$_GET ["P5"];  $A5=$_GET ["A5"];  $O5=$_GET ["05"];
$I6 =$_GET ["I6"]; $S6 =$_GET ["S6"]; $P6=$_GET ["P6"];  $A6=$_GET ["A6"];  $O6=$_GET ["06"];
$I7 =$_GET ["I7"]; $S7 =$_GET ["S7"]; $P7=$_GET ["P7"];  $A7=$_GET ["A7"];  $O7=$_GET ["07"];
$I8 =$_GET ["I8"]; $S8 =$_GET ["S8"]; $P8=$_GET ["P8"];  $A8=$_GET ["A8"];  $O8=$_GET ["08"];
$I9 =$_GET ["I9"]; $S9 =$_GET ["S9"]; $P9=$_GET ["P9"];  $A9=$_GET ["A9"];  $O9=$_GET ["09"];
$I10=$_GET ["I10"];$S10=$_GET ["S10"];$P10=$_GET ["P10"];$A10=$_GET ["A10"];$O10=$_GET ["010"];
$I11=$_GET ["I11"];$S11=$_GET ["S11"];$P11=$_GET ["P11"];$A11=$_GET ["A11"];$O11=$_GET ["011"];

//convierto los valores obtenidos en int

$prensa=intval($prensa);

if ($prensa>0){

$I1=intval($I1 );
$I2=intval($I2 );
$I3=intval($I3 );
$I4=intval($I4 );
$I5=intval($I5 );
$I6=intval($I6 );
$I7=intval($I7 );
$I8=intval($I8 );
$I9=intval($I9 );
$I10=intval($I10);
$I11=intval($I11);
$S1=intval($S1 );
$S2=intval($S2 );
$S3=intval($S3 );
$S4=intval($S4 );
$S5=intval($S5 );
$S6=intval($S6 );
$S7=intval($S7 );
$S8=intval($S8 );
$S9=intval($S9 );
$S10=intval($S10);
$S11=intval($S11);
$P1=intval($P1 );
$P2=intval($P2 );
$P3=intval($P3 );
$P4=intval($P4 );
$P5=intval($P5 );
$P6=intval($P6 );
$P7=intval($P7 );
$P8=intval($P8 );
$P9=intval($P9 );
$P10=intval($P10);
$P11=intval($P11);
$A1=intval($A1 );
$A2=intval($A2 );
$A3=intval($A3 );
$A4=intval($A4 );
$A5=intval($A5 );
$A6=intval($A6 );
$A7=intval($A7 );
$A8=intval($A8 );
$A9=intval($A9 );
$A10=intval($A10);
$A11=intval($A11);
//$O1= floatval($O1 );
//$O2= floatval($O2 );
//$O3= floatval($O3 );
//$O4= floatval($O4 );
//$O5= floatval($O5 );
//$O6= floatval($O6 );
//$O7= floatval($O7 );
//$O8= floatval($O8 );
//$O9= floatval($O9 );
//$O10=floatval($O10);
//$O11=floatval($O11);

//organizo los datos recibidos en un arreglo

$temperaturas=array(array($I1,$S1,$P1,$A1,$O1),
                    array($I2,$S2,$P2,$A2,$O2),
                    array($I3,$S3,$P3,$A3,$O3),
                    array($I4,$S4,$P4,$A4,$O4),
                    array($I5,$S5,$P5,$A5,$O5),
                    array($I6,$S6,$P6,$A6,$O6),
                    array($I7,$S7,$P7,$A7,$O7),
                    array($I8,$S8,$P8,$A8,$O8),
                    array($I9,$S9,$P9,$A9,$O9),
                    array($I10,$S10,$P10,$A10,$O10),
                    array($I11,$S11,$P11,$A11,$O11));


$herramientaT = new Herramienta();
$ingresar_dato_tabla_temperaturaPrensas = $herramientaT->ingresar_datos_temperaturaPrensas
($prensa,$temperaturas);

}

else{
    echo "Seleccione la prensa";
}
    
    /*

*/



?>