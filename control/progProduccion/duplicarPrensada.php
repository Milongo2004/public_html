<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
   //require_once("herramienta_introducir_datos.php");
   $moldesPrensada=null;
   $ultimoId=0;
   
//obtengo los datos de la prensada a duplicar.


        $fecha1=$_POST ["fecha1"];
        $turno1=$_POST ["turno1"];
        $prensada1=$_POST ["prensada1"];
        
        
        //limito el tamaño de los datos

$fecha1 = substr($fecha1, int -12);
$turno1 = substr($turno1, int -10);
$prensada1 = substr($prensada1, int -2);


//elimino los espacios en blanco del string turno.

$turno1=trim($turno1," ");

//echo "después de limitar el tamaño de los datos";

/*var_dump($fecha1);
var_dump($turno1);
var_dump($prensada1);*/

/////////////////////////////////////////////////////////////////////////////

//obtengo los datos de la prensada nueva


    
    $ano=$_POST ["Ano2"];
    
    $mes=$_POST ["Mes2"];
    $dia=$_POST ["Dia2"];
    
    /*var_dump($ano);
var_dump($mes);
var_dump($dia);*/
    
    //si el mes o el día son menores que 10 agrego un cero a la izquierda al string para que en la búsqueda encuentre resultados.
    
    /*if($mes<10){
        $mes="0".$mes;
    }
    
    if($dia<10){
        $dia="0".$dia;
    }*/
    
    if (is_null($ano)){
        echo "Debe seleccionar todos los campos";
       /*$fecha2=$_POST ["fecha2"];
       
        if(is_null($fecha2)){
            //echo "la fecha post es nula";
        $fecha=$_GET ["fecha"];
        //echo $fecha;
        $turno=$_GET ["turno"];
        //echo $turno;
        $prensada=$_GET ["prensada"];
        //echo $prensada;
        
        //limito el tamaño de los datos

$fecha = substr($fecha, int -12);
$turno = substr($turno, int -10);
$prensada = substr($prensada, int -2);
        
        //elimino los espacios en blanco del string turno.
        
        $turno=trim($turno," ");
        //echo "fecha sin espacios en blanco".$fecha;
       
    }*/
    }
    else{
    //$fecha=$dia."/".$mes."/".$ano;
    $ano=$ano+2000;
    $fecha2=$ano."-".$mes."-".$dia;
    $turno2=$_POST ["turno2"];
    $prensada2=$_POST ["prensada2"];
   
    }
    //$turno=$_POST ["turno"];
    //$prensada=$_POST ["prensada"];
    

/*var_dump($fecha);
var_dump($turno);
var_dump($prensada);*/

//limito el tamaño de los datos

$fecha2 = substr($fecha2, int -12);
$turno2 = substr($turno2, int -10);
$prensada2 = substr($prensada2, int -2);

//elimino los espacios en blanco del string

$turno2=trim($turno2," ");

//echo "después de limitar los datos";

/*var_dump($fecha2);
var_dump($turno2);
var_dump($prensada2);*/

if($prensada2>0){

/////////////////////////////////////////////////

//function ingresar_datos_tabla_rotulos2_metodo3($fecha1, $turno1, $prensada1, $fecha2, $turno2, $prensada2){
    
    echo $fecha1. $turno1. $prensada1. $fecha2. $turno2. $prensada2;
    
    //obtengo id del ultimo registro.

        
        $sqlU= "SELECT id FROM rotulos2 ORDER BY id DESC LIMIT 1";

        $resultU=mysqli_query($conexion,$sqlU);         

     
                while($mostrarU=mysqli_fetch_array($resultU)){
                    $ultimoId=$mostrarU['id'];
   
            
            }
            echo "ultimo Id = ".$ultimoId;
            
            if ($ultimoId>0){
            
            //inserto los datos de la prensada original en la tabla rótulos
            
           $sqlC = "INSERT INTO rotulos2 (`cod_rotulo`,`fecha`,`prensada`,`referenciaId`,`loteId`, `colorId`, `pedido`,`cantidadMoldes`, `casillaId`,`turno`,`juegos`,`estacionId2`,`vuelta1`,`vuelta2`,`vuelta3`,`vuelta4`,`vuelta5`,`vuelta6`,`vuelta7`, `vuelta8`,`total`,`fechaCreacion`,`fechaActualizacion`,`estado`,`nota`)  SELECT `cod_rotulo`,`fecha`,`prensada`,`referenciaId`,`loteId`, `colorId`, `pedido`,`cantidadMoldes`, `casillaId`,`turno`,`juegos`,`estacionId2`,`vuelta1`,`vuelta2`,`vuelta3`,`vuelta4`,`vuelta5`,`vuelta6`,`vuelta7`, `vuelta8`,`total`,`fechaCreacion`,`fechaActualizacion`,`estado`,`nota` FROM rotulos2 WHERE rotulos2.`fecha` = '".$fecha1."' AND rotulos2.`turno` LIKE '%".$turno1."%' AND rotulos2.`prensada` = '".$prensada1."'";

$resultC=mysqli_query($conexion,$sqlC);       

if(!(empty($resultC))){
    echo "duplicado1  exitoso";


     //LUEGO ACTUALIZO LA FECHA, EL TURNO, EL ID Y LA PRENSADA DE ESTOS ÚLTIMOS X REGISTROS
     
     $sqlA = "UPDATE rotulos2 SET fecha = '".$fecha2."' , turno = '".$turno2."', prensada = '".$prensada2."', cod_rotulo = id WHERE id > '".$ultimoId."'";
     
     $resultA = mysqli_query($conexion,$sqlA);
		

		if(!(empty($resultA))){
		    
		    
			    echo "Ingreso Exitoso en tabla rotulos2,";
				//header("Location: https://trazabilidadmasterdent.online/control/public_html/control/formularioListas2.php");	
				?>
				<html lang="en">
			    <head>
          

			<br>
			    <meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/progProduccion/progProduccion3.php?fecha=<?php echo $fecha2?>&turno=<?php echo $turno2?>&prensada=<?php echo $prensada2?>">
			    </head>
			    <?php
			}

		
		else{
			echo "no se pudo registrar datos en tabla rotulos2,";
		}
		
}
else{ 
    echo "no se pudo duplicar por alguna extraña razón";
}

//////////////////////////////////////////////////////////

}
}
else {
    echo "ingrese el dato de la prensada";
}

?>