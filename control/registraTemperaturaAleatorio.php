<?php 
require_once("herramienta_introducir_datos.php");

//Obtengo los datos del formulario_termperaturaPrensas
//$prensa= "1";

//$dia=1;
$minuto=30;
$segundo=17;
$horaAntes="17:";


//minuto y segundo serán aleatorios, día será en ciclo for. 

for($dia=1;$dia<=13;$dia++){
    
    

for($prensa=1;$prensa<=5;$prensa++){

$minuto=rand(29,59);
$segundo=rand(10,59);


$horaCompleta=$horaAntes.$minuto.":".$segundo;
$fechaAntesDia="2023-06-";
$fechaHoraCompleta=$fechaAntesDia.$dia." ".$horaCompleta;

$I1 =rand(116,123); $S1 =rand(116,119);      ; $P1=rand(116,123);  if($P1>123){$A1=rand(-2,0);}else{$A1=0;}                  $O1=$_GET ["01"];
$I2 =rand(116,123); $S2 =119                 ; $P2=rand(116,123);  $A2="0";                         $O2=$_GET ["02"];
$I3 =rand(116,123); $S3 =rand(116,119);      ; $P3=rand(116,123);  if($P3>123){$A3=rand(-2,0);}else{$A3=0;}                  $O3=$_GET ["03"];
$I4 =rand(116,123); $S4 =119                 ; $P4=rand(116,123);  $A4="0";                         $O4=$_GET ["04"];
$I5 =rand(116,123); $S5 =119                 ; $P5=rand(116,123);  $A5="0";                         $O5=$_GET ["05"];
$I6 =rand(116,123); $S6 =120                 ; $P6=rand(116,123);  $A6="0";                         $O6=$_GET ["06"];
$I7 =rand(116,123); $S7 =120                 ; $P7=rand(116,123);  $A7="0";                         $O7=$_GET ["07"];
$I8 =rand(116,123); $S8 =119                 ; $P8=rand(116,123);  $A8="0";                         $O8=$_GET ["08"];
$I9 =rand(116,123); $S9 =rand(116,119);      ; $P9=rand(116,123);  if($P9>123){$A9=rand(-2,0);}else{$A9=0;}                  $O9=$_GET ["09"];
$I10=rand(116,123); $S10=119                 ;$P10=rand(116,123); $A10="0";                        $O10=$_GET ["010"];
$I11=rand(116,123); $S11=rand(116,119);      ;$P11=rand(116,123); if($P11>123){$A11=rand(-2,0);}else{$A11=0;}                $O11=$_GET ["011"];

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
$ingresar_dato_tabla_temperaturaPrensas = $herramientaT->ingresar_datos_temperaturaPrensasAleatorio($prensa,$temperaturas,$fechaHoraCompleta);

/*
var_dump($temperaturas);
echo "//////////////////".'/n';
echo "fecha=".$fechaHoraCompleta; 
echo "/prensa=".$prensa;
*/
}


else{
    echo "Seleccione la prensa";
}
    
    /*

*/
}
}


?>