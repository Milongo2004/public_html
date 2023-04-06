<?php

//require_once("enviarDatos.php");
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

require_once("herramienta_introducir_datos.php");

//obtengo variables enviadas desde el arduino.

$proceso=$_GET["proceso_php"];
$menorRotulo=$GET["menorRotulo_php"];
$mayorRotulo=$GET["mayorRotulo_php"];
$cuentaLecturas=$_GET["cuentaLecturas_php"];
$estacion=$_GET["hum_php"];
$juegos=$_GET["temp_php"];
$idMolde=$_GET["pre_php"];//id digitado con el teclado del módulo RFID, corresponde a la cantidad de juegos malos enviados desde el emplaquetado
$cod_molde=$_GET["dist_php"];//en el proceso 15 el cod_Molde es el id del emplaquetador. 
$cod_rotulo=$_GET["rotulo_php"];//esta código de rótulo es el que se lee en las estaciones  y en el momento de la ubicación en su casilla.

//variables obtenidas desde la base de datos

$creaRotulo=null;//este código de rótulo corresponde al último creado para guardarlo en el tag
$moldeId=null;
$colorId=null;//en el proceso 11 lo solicito a partir del nombre del color leído del tag
$loteId=null;//en el proceso 11 lo consulto a partir de su color
$moldeNuevo=null;//este dato corresponde al molde solicitado a la base con su id digitado en el módulo.
$rotuloId=null;
$casillaId=null;
$cantidadMoldes=null;
$asignado=null; //variable que verifica la existencia de un molde leído en proceso en la tabla asignaciones2
$rotuloMolde=null;//id de rótulo correspondiente al molde prensado leído obtenido de la tabla asignaciones2
$refRotulo=null;
$refMolde=null;//referencias de molde y rotulo leídos para la asignación.
$libre=null;//estado del molde leído para asignaciones.
$moldesTotales=null;//total de moldes existentes de una referencia.
$moldesUsados=null;

$totalPedidos=0;
$totalEmplaquetados=0;
$faltan=0;

$sqlSufijoDetalles="";

$codRotulo;
$k=0;
$refId;
$arregloNombres;
$arregloId;
$nombreRef;
$respuesta9="";

$creado=null;
$vuelta1=null; 
$vuelta2=null; 
$vuelta3=null; 
$vuelta4=null; 
$vuelta5=null; 
$vuelta6=null; 
$vuelta7=null; 
$vuelta8=null; 

//variables para actualizar el número de moldes disponible para

$moldesEnUso=null;
$moldesDisponibles=null;

//variable global de arreglo  que recibe los rótulos masivos

$rotulos;

$masaCalidad;//nombre del arreglo donde recibo los datos de masa de problemas de calidad.

//$molde=$_GET ["molde"]; donde se use $molde remplazar por $moldeId

//consulto el id del rótulo leído 

//LA SIGUIENTE NO ES NECESARIA PORQUE SE ASUME QUE EL ID Y EL CODIGO SON IGUALES. TRABAJAREMOS CON EL ID

/*

$sql0="SELECT id FROM rotulos2 WHERE cod_rotulo = '".$cod_rotulo. "'";

$result0=mysqli_query($conexion,$sql0);

while($mostrar0=mysqli_fetch_array($result0)){
                    $rotuloId=$mostrar0['id'];    
                   }
                   
                   */

	//consulto el id del molde leído  en la tabla moldes2

		$sql3="SELECT idM FROM moldes2 WHERE nombreM = '".$cod_molde. "'";

$result3=mysqli_query($conexion,$sql3);

while($mostrar3=mysqli_fetch_array($result3)){
                    $moldeId=$mostrar3['idM'];    
                   }

//condición de proceso
                   //el módulo RFID lanza unos datos por el método GET entre ellos la variable de proceso que 
                   //sirve para identificar una tarea precisa.

switch ($proceso){

case '1':

//pregunto en la base de datos cuál es el ultimo codigo de rótulo creado.

		$sql1="SELECT id FROM rotulos2 ORDER BY id DESC LIMIT 1";

$result1=mysqli_query($conexion,$sql1);

while($mostrar1=mysqli_fetch_array($result1)){
                    $creaRotulo=$mostrar1['id'];    
                    echo "este es el último rótulo creado,".$creaRotulo;      
   
            
            }

		break;

		case '2':
		//consulto la casilla correspondiente al código de rótulo leído.

		$sql2="SELECT casillaId FROM rotulos2 WHERE id = '".$cod_rotulo. "'";

$result2=mysqli_query($conexion,$sql2);

while($mostrar2=mysqli_fetch_array($result2)){
                    $casillaId=$mostrar2['casillaId'];    
                         
   
            
            }

            $sql21="SELECT cantidadMoldes FROM rotulos2 WHERE id = '".$cod_rotulo. "'";

$result21=mysqli_query($conexion,$sql21);

while($mostrar21=mysqli_fetch_array($result21)){
                    $cantidadMoldes=$mostrar21['cantidadMoldes'];   
                    }

                     echo "esta es la casilla del rótulo leído,".$casillaId. ",y esta es la cantidad de moldes que serán asignados a este rótulo,".$cantidadMoldes;

		break;

		case '3':
		    //primero verifico que el molde leído esté libre.
		    
		    	$sql35="SELECT idM FROM moldes2 WHERE idM = '".$moldeId. "'"."AND estado = 'libre'";

$result35=mysqli_query($conexion,$sql35);

while($mostrar35=mysqli_fetch_array($result35)){
                    $libre=$mostrar35['idM']; 
}
if(is_null($libre)==false){
		    
		    // verifico si el molde y el rótulo son de la misma referencia.
		    
		    //consulto referencia del molde
		    
		    	$sql33="SELECT referenciaId3 FROM moldes2 WHERE idM = '".$moldeId. "'";

$result33=mysqli_query($conexion,$sql33);

while($mostrar33=mysqli_fetch_array($result33)){
                    $refMolde=$mostrar33['referenciaId3']; 
}
                    
                    //consulto referencia del rotulo
                    
                    	$sql34="SELECT referenciaId FROM rotulos2 WHERE id = '".$rotuloId. "'";

$result34=mysqli_query($conexion,$sql34);

while($mostrar34=mysqli_fetch_array($result34)){
                    $refRotulo=$mostrar34['referenciaId']; 
}

//pregunto si la referencia coinside

if($refMolde==$refRotulo){

		//consulto si el molde leído ya se encuentra en la tabla asignaciones con el estado "enProceso"

		$sql31="SELECT * FROM asignaciones2 WHERE moldeId = '".$moldeId. "'"."AND estado ='enProceso'";

$result31=mysqli_query($conexion,$sql31);

while($mostrar31=mysqli_fetch_array($result31)){
                    $asignado=$mostrar31['moldeId'];                         
            
            }

            //si no hay dato en la tabla asignacines se insertan el id de molde y rótulo con la herramienta
            //cambiando el estado de la asignacion a en proceso.

            if (is_null($asignado)){           	

$herramienta10 = new Herramienta();
$ingresar_dato_tabla_Moldes = $herramienta10->ingresar_datos_tabla_asignaciones2($rotuloId, $moldeId);

//luego de ingresar los datos en la tabla asignaciones el estado del molde en moldes2 se cambia a asignado.

 $sql32="UPDATE moldes2 SET estado = 'asignado' WHERE idM = '". $moldeId."'";

            $result32=mysqli_query($conexion,$sql32);

            }
           

            else{
            	 echo "E3:enProceso!";
            }
           
}
else{
    echo "E2:Ref=!!!!!!";
}
}
else{
    echo"E1:NoEsLibre";
}
		break;

		case '4':
		//consulto la casilla correspondiente al id de molde leído.

		$sql4="SELECT rotulos2.`casillaId`, asignaciones2.* FROM rotulos2 INNER JOIN asignaciones2 ON rotulos2.`id` = asignaciones2.`rotuloId` WHERE asignaciones2.`moldeId` = '".$moldeId. "'";

$result4=mysqli_query($conexion,$sql4);

while($mostrar4=mysqli_fetch_array($result4)){
                    $casillaId=$mostrar4['casillaId'];
            }
            echo "esta es la casilla para el molde leído:, ".$casillaId;

		break;

case '5':
	//consulto el rótulo correspondiente al molde leído, en la tabla asignaciones que se encuentre en proceso.

$sql5= "SELECT rotuloId FROM asignaciones2 WHERE moldeId = '". $moldeId. "'"."AND estado = 'enProceso'";

        $result5=mysqli_query($conexion,$sql5);         

     
                while($mostrar5=mysqli_fetch_array($result5)){
                    $rotuloMolde=$mostrar5['rotuloId']; 
                }
                
                //si el resultado es null significa que no hay asignación para este molde o que si la hay ya está terminada.
                
                if (is_null($rotuloMolde)){
                    echo "ya dio 8 vueltas";
                }
                else{


//consulto  si existe un registro para este molde en la tabla prensados que también esté enProceso.

$sql51 = "SELECT * FROM prensados2 WHERE moldeId = '". $moldeId."'"."AND estado = 'enProceso'";

         $result51=mysqli_query($conexion,$sql51);
         while($mostrar51=mysqli_fetch_array($result51)){
                    $creado=$mostrar51['moldeId']; 
                    $vuelta1=$mostrar51['vuelta1']; 
                    $vuelta2=$mostrar51['vuelta2']; 
                    $vuelta3=$mostrar51['vuelta3']; 
                    $vuelta4=$mostrar51['vuelta4']; 
                    $vuelta5=$mostrar51['vuelta5']; 
                    $vuelta6=$mostrar51['vuelta6']; 
                    $vuelta7=$mostrar51['vuelta7']; 
                    $vuelta8=$mostrar51['vuelta8']; 
                }

                if(is_null($creado)==true){

                	$herramienta11 = new Herramienta();
$ingresar_dato_tabla_prensados = $herramienta11->ingresar_datos_tabla_prensados2($rotuloMolde, $moldeId);

//actualizo el estado del molde prensado a "enProceso" desde la herramienta.

//$sql2="UPDATE prensados2 SET estado = 'enProceso' WHERE moldeId = '". $moldeId."'";

//$result2=mysqli_query($conexion,$sql2);
$herramienta12 = new Herramienta();
$ingresar_juegos = $herramienta12->ingresar_juegos_vueltas($juegos,$moldeId,$rotuloMolde,$vuelta1,$vuelta2,$vuelta3,$vuelta4,$vuelta5,$vuelta6,$vuelta7,$vuelta8);
echo "ingreso exitoso de juegos";

                }

                else{ 
                	$herramienta13 = new Herramienta();
$ingresar_juegos = $herramienta13->ingresar_juegos_vueltas($juegos,$moldeId,$rotuloMolde,$vuelta1,$vuelta2,$vuelta3,$vuelta4,$vuelta5,$vuelta6,$vuelta7,$vuelta8);
                	echo "ingreso exitoso de juegos";

                	}

}

		break;


	case '6':
	    //modifica  el dato de la estación actual  del rótulo leído idividual

		$sql6="UPDATE rotulos2 SET estacionId2 = '".$estacion. "'"." WHERE id = '". $cod_rotulo."'";

$result6=mysqli_query($conexion,$sql6);
echo "ingreso exitoso!,1,2,3,rotuloOK,";


//obtengo el dato del id de la referencia para actualizar sus moldes 
 
 //consulto referencia y el total de moldes utilizados del rotulo
                    
                    	$sqlR="SELECT referenciaId, cantidadMoldes FROM rotulos2 WHERE id = '".$rotulos[$i]. "'";

$resultR=mysqli_query($conexion,$sqlR);

while($mostrarR=mysqli_fetch_array($resultR)){
                    $moldesUsados=$mostrarR['cantidadMoldes']; 
                    $refRotulo=$mostrarR['referenciaId']; 
}
 
 //cuando el rótulo pasa a la estación de acabado, actualizo el valor de los moldes disponibles de la referencia


    
//1. obtengo el valor de los moldes totales y los moldes en uso.

/*$sqlM= "SELECT totalMoldes FROM referencias2 WHERE id = '". $refRotulo. "'";

        $resultM=mysqli_query($conexion,$sqlM);

     
                while($mostrarM=mysqli_fetch_array($resultM)){
                    $moldesEnUso=$mostrarM['moldesEnUso'];
                    $moldesTotales=$mostrarM['totalMoldes'];
            }
            
            
            //2. a los moldes en uso se le restan los moldes que acaban de quedar disponibles
            
            $moldesEnUso=$moldesEnUso-$moldesUsados;
            $moldesDisponibles=$moldesTotales-$moldesEnUso;
           
            
            //3. actualizo el valor de los moldes en uso y los moldes disponibles en la tabla referencias.
            //4. actualizo la cantidad de moldes disponibles para presentar en el select
            
            $sqlU= "UPDATE referencias2 SET moldesEnUso = '".$moldesEnUso."', moldesDisponibles = '". $moldesDisponibles. "'  WHERE id = ' ".$refRotulo. "'";

        $resultU=mysqli_query($conexion,$sqlU);
        */


		break;
		
		case '7':

//pregunto en la base de datos cuál es el codigo de molde del id ingresado con el  teclado del módulo.

		$sql7="SELECT nombreM FROM moldes2 WHERE idM = '". $idMolde."'";

$result7=mysqli_query($conexion,$sql7);

while($mostrar7=mysqli_fetch_array($result7)){
                    $moldeNuevo=$mostrar7['nombreM'];    
                    echo "este es el último rótulo creado,".$moldeNuevo;      
   
            
            }

		break;
		
		case '8': //recibe el dato de una lectura de uno o varios rótulos y realiza el registro en base de datos en las tablas de rotulo estaciones, rótulos y pedidoDetalles.
		    //Descompone el dato de rótulo leído y luego uno por uno modifica  el dato de la estación actual  cada rótulo
	    
	    //convierto el string enviado por el ESP32 en un arreglo de strings
	    $rotulos = explode (",",$cod_rotulo);
	    //$cuentaLecturas=$GET["cuentaLecturas_php"];
	    //echo "cuenta lecturas:".$cuentaLecturas;
	    //echo "valor recibido de rotulo:".$cuentaLecturas;
	    $cuentaLecturas = intval($cuentaLecturas);
	    
	    for($i = 0; $i < $cuentaLecturas; $i++){
	        
	        
	        //actualizo la estación actual y la fecha de actualización.

		$sql8="UPDATE rotulos2 SET estacionId2='" .$estacion. "', fechaActualizacion = (select DATE_SUB(NOW(),INTERVAL 5 HOUR)) WHERE id = '". $rotulos[$i]."';";

$result8=mysqli_query($conexion,$sql8);


// consulta para registrar la hora de entrada en cada estación

	$sql81="INSERT INTO `rotuloestaciones2` (`id`, `rotuloId2`, `estacionId`, `ingreso`, `estado`) VALUES (NULL, '". $rotulos[$i]."', '".$estacion. "', (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), NULL) ";

$result81=mysqli_query($conexion,$sql81);



 //echo " rótulo" . $rotulos[$i];
 
 
 //obtengo el dato del id de la referencia para actualizar sus moldes 
 
 //consulto referencia y otros detalles del rotulo
 

                    
$sqlR="SELECT referenciaId, colorId, pedido,total, referencias2.gramosJuego AS gramosJuego, referencias2.tipo AS tipo, pedidos2.linea AS linea FROM rotulos2 INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id INNER JOIN pedidos2 ON rotulos2.pedido = pedidos2.idP WHERE rotulos2.id = '".$rotulos[$i]. "';";

$resultR=mysqli_query($conexion,$sqlR);

while($mostrarR=mysqli_fetch_array($resultR)){
                    
                    $referenciaId=$mostrarR['referenciaId']; 
                    $pedidoId=$mostrarR['pedido']; 
                    $colorId=$mostrarR['colorId']; 
                    $juegosIngresan=$mostrarR['total'];
                    $gramosJuego=$mostrarR['gramosJuego'];
                    $tipo=$mostrarR['tipo'];
                    $linea=$mostrarR['linea'];
                    //$gramosGranel=$mostrarR['gramosGranel'];
                    //$juegosGranel=$gramosGranel/$gramosJuego;
                    //$juegosGranel=round($juegosGranel);
                    
}


 switch ($estacion){
     case 1:
     case 2:
          $sqlSufijoDetalles= "'0', NULL, NULL, '$juegosIngresan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))";
          
          
          $condicionArray=[
              "juegos"=>"0",
              "granel"=>" IS NULL",
              "programados"=>" IS NULL",
              "producidos"=>" = '".strval($juegosIngresan)."'",
              "pulidos"=>" IS NULL",
              "enSeparacion"=>" IS NULL",
              "separado"=>" IS NULL",
              "enEmplaquetado"=>" IS NULL",
              "emplaquetados"=>" IS NULL",
              "revision1"=>" IS NULL",
              "revision2"=>" IS NULL",
              "empacados"=>" IS NULL",
              "calidad"=>" IS NULL",
              "colaborador"=>" IS NULL"
              ];
              
          break;
          
    case 3: 
         $sqlSufijoDetalles= "'0', NULL, NULL, NULL, '$juegosIngresan',  NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))";
         $condicionArray=[
              "juegos"=>"0",
              "granel"=>" IS NULL",
              "programados"=>" IS NULL",
              "producidos"=>" IS NULL",
              "pulidos"=>" = '".strval($juegosIngresan)."'",
              "enSeparacion"=>" IS NULL",
              "separado"=>" IS NULL",
              "enEmplaquetado"=>" IS NULL",
              "emplaquetados"=>" IS NULL",
              "revision1"=>" IS NULL",
              "revision2"=>" IS NULL",
              "empacados"=>" IS NULL",
              "calidad"=>" IS NULL",
              "colaborador"=>" IS NULL"
              ];
         break;
    case 4:
        //consulto los juegos a granel de ese rótulo en la tabla de producto granel antes de eliminar el registro. 
        $sqlUltimoPesoRegistrado="SELECT * FROM `productoGranel` WHERE rotuloId ='".$rotulos[$i]."'";
       $resultUltimoPesoRegistrado= mysqli_query($conexion,$sqlUltimoPesoRegistrado);  
        while($mostrarUltimoPesoRegistrado=mysqli_fetch_array($resultUltimoPesoRegistrado)){
                    $gramosGranel=$mostrarUltimoPesoRegistrado['gramos'];
            }
        if(is_null($gramosGranel)){
        }
        else{
        $juegosGranel = $gramosGranel/$gramosJuego;
        $juegosGranel=round($juegosGranel);
        
        $sqlSufijoDetalles= "'0', NULL, NULL, NULL, NULL, NULL, NULL, '$juegosGranel',  NULL, NULL, NULL, NULL, NULL, '1', (select DATE_SUB(NOW(),INTERVAL 5 HOUR))";
       
         
         $condicionArray=[
              "juegos"=>"0",
              "granel"=>" IS NULL",
              "programados"=>" IS NULL",
              "producidos"=>" IS NULL",
              "pulidos"=>"IS NULL",
              "enSeparacion"=>" IS NULL",
              "separado"=>" IS NULL",
              "enEmplaquetado"=>" = '".$juegosGranel."'",
              "emplaquetados"=>" IS NULL",
              "revision1"=>" IS NULL",
              "revision2"=>" IS NULL",
              "empacados"=>" IS NULL",
              "calidad"=>" IS NULL",
              "colaborador"=>" IS NULL"
              ];
              
              //Saco la produccion del producto a granel
                 //consulta para eliminar los datos de la tabla producto a granel. 

$sqlEliminaGranel="DELETE FROM productoGranel WHERE rotuloId='".$rotulos[$i]."'";
$resultEliminarGranel=mysqli_query($conexion,$sqlEliminaGranel);
        }  
        
         break;
    case 5: 
        
        //consulto los juegos a granel de ese rótulo en la tabla de producto granel antes de eliminar el registro. 
        
        $sqlUltimoPesoRegistrado="SELECT * FROM `productoGranel` WHERE rotuloId ='".$rotulos[$i]."'";
       $resultUltimoPesoRegistrado= mysqli_query($conexion,$sqlUltimoPesoRegistrado);  
       
        while($mostrarUltimoPesoRegistrado=mysqli_fetch_array($resultUltimoPesoRegistrado)){
                    $gramosGranel=$mostrarUltimoPesoRegistrado['gramos'];
            }
       
        if(is_null($gramosGranel)){
            
        }
        else{
        $juegosGranel = ($gramosGranel/$gramosJuego);
        $juegosGranel=round($juegosGranel);
        
//idea: en vez de eliminar el registro de granel creo uno nuevo con la misma cantidad de gramos pero en negativo. //no ejecutada porque puede entrar en conflicto con la creación y actualización de registros. 

        $sqlSufijoDetalles= "'0', NULL, NULL, NULL, NULL, NULL, NULL, '".$juegosGranel."',  NULL, NULL, NULL, NULL, NULL, '2', (select DATE_SUB(NOW(),INTERVAL 5 HOUR))";
        
        $condicionArray=[
              "juegos"=>"0",
              "granel"=>" IS NULL",
              "programados"=>" IS NULL",
              "producidos"=>" IS NULL",
              "pulidos"=>" IS NULL",
              "enSeparacion"=>" IS NULL",
              "separado"=>" IS NULL",
              "enEmplaquetado"=>" = '".$juegosGranel."'",
              "emplaquetados"=>" IS NULL",
              "revision1"=>" IS NULL",
              "revision2"=>" IS NULL",
              "empacados"=>" IS NULL",
              "calidad"=>" IS NULL",
              "colaborador"=>"IS NULL"
              ];
              
              //consulta para eliminar los datos de la tabla producto a granel. 

$sqlEliminaGranel="DELETE FROM productoGranel WHERE rotuloId='".$rotulos[$i]."'";
$resultEliminarGranel=mysqli_query($conexion,$sqlEliminaGranel);

//echo "eliminGranel";
//echo "</br>";

        }
         break;
         
         case 6: // dato enviado desde la estación de emplaquetado
         //los juegos serán en relación a la línea y el tipo de producto (diente/muela): juegos/caja
         
         
        
             
         if ($linea=='RESISTAL' || $linea=='ZENITH'){
                    
                    if ($tipo=='Diente'){
                        $juegosIngresan=16;
                    }
                    else if ($tipo=='Muela'){
                        $juegosIngresan=14;
                    }
                }
                else if ($linea=='REVEAL' || $linea=='STARDENT' || $linea=='STARVIT'){
                    $juegosIngresan=20;
                }
                else if ($linea=='UHLERPLUS' || $linea=='STARPLUS'){
                    $juegosIngresan=12;
                   
                }
                
                if(is_null($idMolde)||$idMolde==""){//si la cantidad de juegos malos es nula 
                
                //consulto la cantidad de juegos pedidos, le resto los juegos emplaquetados + los juegosIngresan que voy a registrar a continuación.
                
                $sqlPedidosEmplaquetados="SELECT  sum(`juegos`) as totalPedidos, sum(`emplaquetados`) as totalEmplaquetados from pedidoDetalles WHERE referenciaId ='".$referenciaId."' AND colorId= '".$colorId."' AND pedidoId='".$pedidoId."'";
       $resultPedidosEmplaquetados= mysqli_query($conexion,$sqlPedidosEmplaquetados);  
       
        while($mostrarPedidosEmplaquetados=mysqli_fetch_array($resultPedidosEmplaquetados)){
                    $totalPedidos=$mostrarPedidosEmplaquetados['totalPedidos'];
                    $totalEmplaquetados=$mostrarPedidosEmplaquetados['totalEmplaquetados'];
            }
            
            $faltan = $totalPedidos-$totalEmplaquetados-$juegosIngresan;
            $faltan = $faltan/$juegosIngresan;
            
             
         
         $sqlSufijoDetalles= "'0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$juegosIngresan', NULL, NULL, NULL, NULL, '$cod_molde', (select DATE_SUB(NOW(),INTERVAL 5 HOUR))";
         $condicionArray=[
              "juegos"=>"0",
              "granel"=>" IS NULL",
              "programados"=>" IS NULL",
              "producidos"=>" IS NULL",
              "pulidos"=>" = '".strval($juegosIngresan)."'",
              "enSeparacion"=>" IS NULL",
              "separado"=>" IS NULL",
              "enEmplaquetado"=>" IS NULL",
              "emplaquetados"=>" IS NULL",
              "revision1"=>" IS NULL",
              "revision2"=>" IS NULL",
              "empacados"=>" IS NULL",
              "calidad"=>" IS NULL",
              "colaborador"=>" IS NULL"
              ];
              
         }
         
         else{
             $idMolde=-$idMolde;
             $sqlSufijoDetalles= "'0', NULL, NULL, NULL, NULL, NULL, NULL, NULL,  NULL,'$idMolde', NULL, NULL, NULL, '$cod_molde', (select DATE_SUB(NOW(),INTERVAL 5 HOUR))";
         $condicionArray=[
              "juegos"=>"0",
              "granel"=>" IS NULL",
              "programados"=>" IS NULL",
              "producidos"=>" IS NULL",
              "pulidos"=>" = '".strval($juegosIngresan)."'",
              "enSeparacion"=>" IS NULL",
              "separado"=>" IS NULL",
              "enEmplaquetado"=>" IS NULL",
              "emplaquetados"=>" IS NULL",
              "revision1"=>" IS NULL",
              "revision2"=>" IS NULL",
              "empacados"=>" IS NULL",
              "calidad"=>" IS NULL",
              "colaborador"=>" IS NULL"
              ];
         }
         break;
        
         
              
 }
 //echo $condicionArray[juegos]; 

 //realizo un registro en la tabla de detalles con los datos obtenidos anteriormente. 
 $sqlDetalles = "INSERT INTO `pedidoDetalles` (`pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) SELECT '".$pedidoId."', '".$referenciaId."', '".$colorId."', '".$rotulos[$i]."', ". $sqlSufijoDetalles. " WHERE NOT EXISTS (SELECT `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador` FROM `pedidoDetalles` WHERE `pedidoId`='".$pedidoId."' AND `referenciaId`='".$referenciaId."' AND `colorId`= '".$colorId."' AND `rotuloId` = ".$rotulos[$i]." AND `juegos`= '". $condicionArray[juegos]."' AND `granel`".$condicionArray[granel]." AND `programados`".$condicionArray[programados]." AND `producidos`".$condicionArray[producidos]." AND `pulidos`".$condicionArray[pulidos]." AND `enSeparacion`".$condicionArray[enSeparacion]." AND `separado`".$condicionArray[separado]." AND `enEmplaquetado`".$condicionArray[enEmplaquetado]." AND `emplaquetados`".$condicionArray[emplaquetados]." AND `revision1`".$condicionArray[revision1]." AND `revision2`".$condicionArray[revision2]." AND `empacados`".$condicionArray[empacados]." AND `calidad`".$condicionArray[calidad]." AND `colaborador`".$condicionArray[colaborador]." );";
 
 $resultDetalles=mysqli_query($conexion,$sqlDetalles);



}
//echo $referenciaId."/";
//echo $pedidoId."/";
//echo $colorId."/";
//echo $juegosIngresan."/";
//echo $gramosJuego."/";
//echo $gramosGranel."/";
//echo $juegosGranel."/";
echo "ingreso exitoso!,$faltan,2,3,rotuloOK,";

//echo "</br>";
//echo $sqlDetalles;
//echo "</br>";
//var_dump($sqlSufijoDetalles);
//echo $sqlSufijoDetalles;
		break;

	
	
		
		case '9': //para consultar los rótulos y su referencia a la base de datos

//pregunto en la base de datos los codigos de rótulo y los id de referencias dentro del rango solicitado y los guardo en un arreglo

//$menorRotulo=intval($menorRotulo);
//$mayorRotulo=intval($mayorRotulo);

//obtengo el dato del rótulo y lo convierto a entero. 

$cod_rotulo=intval($cod_rotulo);

//echo "primer id = ".$cod_rotulo;

 /*//obtengo id del ultimo registro.

        
        $sqlU= "SELECT id FROM rotulos2 ORDER BY id DESC LIMIT 1";

        $resultU=mysqli_query($conexion,$sqlU);         

     
                while($mostrarU=mysqli_fetch_array($resultU)){
                    $ultimoId=$mostrarU['id'];
   
            
            }
            
             //convierto el valor a entero en caso de necesitarse
            
            $ultimoId=intval($ultimoId);
            
            echo "ultimo Id = ".$ultimoId;
            */
            
            //cuento los rótulos existentes desde el rotulo ingresado con el teclado.
            
             $sqlU= "SELECT COUNT(id) AS cuantosRotulos FROM rotulos2 WHERE id >= '$cod_rotulo'";

        $resultU=mysqli_query($conexion,$sqlU);         

     
                while($mostrarU=mysqli_fetch_array($resultU)){
                    $cuantosRotulos=$mostrarU['cuantosRotulos'];
            
            }
            
             //convierto el valor a entero en caso de necesitarse
            
            $cuantosRotulos=intval($cuantosRotulos);
            
            //echo "cuanto rótulos = ".$cuantosRotulos;
           



for($i=1;$i<=$cuantosRotulos;$i++){

//consulto los codigos de rótulo y los id de referencias

		$sql9="SELECT id, referenciaId FROM rotulos2 WHERE id >= '$cod_rotulo' ORDER BY id ASC LIMIT $i";

$result9=mysqli_query($conexion,$sql9);

//$k=0;
while($mostrar9=mysqli_fetch_array($result9)){
                    $codRotulo[$i-1]=$mostrar9['id'];   
                    $refId[$i-1]=$mostrar9['referenciaId'];
                    //$k++;
                          
            }
            
            //echo "  * codigo de rotulo [".($i-1)."] = ".$codRotulo[$i-1]. "  *  id de referencia [".($i-1)."] = ".$refId[$i-1];
            
           
            
            //consulto los nombres de referencias de la tabla referencias.
            
            	$sql10="SELECT nombre FROM referencias2 WHERE id = '".$refId[$i-1]. "'";

$result10=mysqli_query($conexion,$sql10);

while($mostrar10=mysqli_fetch_array($result10)){
                    $nombreRef[$i-1]=$mostrar10['nombre'];   
                  
            }
 //voy creando el  String con los datos separados por un "-",  uno para los códigos y otro para las referencias. 
 
 if ($i==1){
                  $respuesta9 =  $codRotulo[$i-1]."*".$nombreRef[$i-1];
                }
                else if ($i>1){
                
                $respuesta9 .= "*".$codRotulo[$i-1]."*".$nombreRef[$i-1];
                }
 
}

            
         echo "estos son los datos a guardar en el tag,".$respuesta9;
         
		break;
		
case '10': // para grabar colores en los tag RFID

//pregunto en la base de datos los codigos de rótulo y los id de referencias dentro del rango solicitado y los guardo en un arreglo

//$menorRotulo=intval($menorRotulo);
//$mayorRotulo=intval($mayorRotulo);

//obtengo el dato del rótulo y lo convierto a entero. 

$cod_rotulo=intval($cod_rotulo);

//echo "primer id = ".$cod_rotulo;

 /*//obtengo id del ultimo registro.

        
        $sqlU= "SELECT id FROM rotulos2 ORDER BY id DESC LIMIT 1";

        $resultU=mysqli_query($conexion,$sqlU);         

     
                while($mostrarU=mysqli_fetch_array($resultU)){
                    $ultimoId=$mostrarU['id'];
   
            
            }
            
             //convierto el valor a entero en caso de necesitarse
            
            $ultimoId=intval($ultimoId);
            
            echo "ultimo Id = ".$ultimoId;
            */
            
            //cuento los rótulos existentes desde el rotulo ingresado con el teclado.
            
             $sqlU= "SELECT COUNT(id) AS cuantosColores FROM colores2 WHERE 1 >= 1";

        $resultU=mysqli_query($conexion,$sqlU);         

     
                while($mostrarU=mysqli_fetch_array($resultU)){
                    $cuantosColores=$mostrarU['cuantosColores'];
            
            }
            
             //convierto el valor a entero en caso de necesitarse
            
            $cuantosColores=intval($cuantosColores);
            
            //echo "cuanto rótulos = ".$cuantosRotulos;
           



for($i=1;$i<=$cuantosColores;$i++){

//consulto los codigos de rótulo y los id de referencias

		$sql9="SELECT id, nombre FROM colores2 WHERE id >= 1 ORDER BY id ASC LIMIT $i";

$result9=mysqli_query($conexion,$sql9);

//$k=0;
while($mostrar9=mysqli_fetch_array($result9)){
                    $codRotulo[$i-1]=$mostrar9['id'];   
                    $refId[$i-1]=$mostrar9['nombre'];
                    //$k++;
                          
            }
            
            //echo "  * codigo de rotulo [".($i-1)."] = ".$codRotulo[$i-1]. "  *  id de referencia [".($i-1)."] = ".$refId[$i-1];
            
           
            
       
 //voy creando el  String con los datos separados por un "-",  uno para los códigos y otro para las referencias. 
 
 if ($i==1){
                  $respuesta9 =  $codRotulo[$i-1]."*".$refId[$i-1];
                }
                else if ($i>1){
                
                $respuesta9 .= "*".$codRotulo[$i-1]."*".$refId[$i-1];
                }
 
}

            
         echo "estos son los datos a guardar en el tag,".$respuesta9;
         
		break;
		
		case '11': //PARA INSERTAR DATOS EN LA TABLA DE MATERIAL PREPARADO
		    
		    echo "cod_molde:".$cod_molde;
		    //consulto el id del color leído  en la tabla colores2

		$sql311="SELECT id FROM colores2 WHERE nombre = '".$cod_molde. "'";//en este caso el cod_molde corresponde al nombre del color leído.

$result311=mysqli_query($conexion,$sql311);

while($mostrar311=mysqli_fetch_array($result311)){
                    $colorId=$mostrar311['id'];  
                    echo "colorId=".$colorId;
                   }
                   
	//consulto el último lote correspondiente al color leído


		$sql312="SELECT id FROM lotes2  WHERE `colorId2` = '". $colorId. "' ORDER BY `id` DESC LIMIT 1";

$result312=mysqli_query($conexion,$sql312);

while($mostrar312=mysqli_fetch_array($result312)){
                    
                    $loteId=$mostrar312['id'];
                    
                    
                   }
                   
                   if (is_null($loteId)==TRUE){
                        $loteId='183';//Equivale al lote 000000 que no tiene color asignado.
                    }
                    else{
                        
                    }
                   echo "lote=".$loteId;
                
            $estacion=intval($estacion);

//$result2=mysqli_query($conexion,$sql2);
$herramienta311 = new Herramienta();
$ingresar_datos_tabla_materialPreparado = $herramienta311->ingresar_datos_tabla_materialPreparado($colorId,$loteId,$juegos,$estacion);
//echo "elementos enviados".$colorId.",".$loteId.",".$juegos.",".$estacion;
//echo "ingreso exitoso de bolsas";

		break;
		
case '12':
		   //descuenta un juego de dientes al total de juegos programados.
	    
	    //convierto el string enviado por el ESP32 en un arreglo de strings
	    $rotulos = explode (",",$cod_rotulo);
	    //$cuentaLecturas=$GET["cuentaLecturas_php"];
	    //echo "cuenta lecturas:".$cuentaLecturas;
	    //echo "valor recibido de rotulo:".$cuentaLecturas;
	    $cuentaLecturas = intval($cuentaLecturas);
	    //echo"rotulosJuntos=".$cod_rotulo;
	    echo "cuentaLecturas=".$cuentaLecturas;
	    
	    for($i = 0; $i < $cuentaLecturas; $i++){
	        
	        $rotulos[$i]=intval($rotulos[$i]);
	        
	        //consulto el total de juegos del rótulo
	        echo "$rotulos[$i]".$rotulos[$i];


		$sql121="SELECT total FROM rotulos2 WHERE id = '".$rotulos[$i]."'";

$result121=mysqli_query($conexion,$sql121);

while($mostrar121=mysqli_fetch_array($result121)){
                    
                    $totalPaRestar=$mostrar121['total'];
                    
                   }
	        $totalPaRestar=intval($totalPaRestar);
	        $yaRestado=$totalPaRestar-1;
	         
	         //UPDATE rotulos2 SET total = (SELECT total FROM rotulos2 WHERE cod_rotulo = '1102')-1 WHERE cod_rotulo = '1102'
	       
		$sql12= "UPDATE rotulos2 SET total = '".$yaRestado."' WHERE id = '". $rotulos[$i]."'";
		
    $result12=mysqli_query($conexion,$sql12);
    echo $result12;
    echo "ejecutado=". $i;
    echo "rotulo[".$i."]=".$rotulos[$i];

}
echo "ingreso exitoso!,1,2,3,rotuloOK,";

		break;
		
		
			case '13': //PARA INSERTAR DATOS EN LA TABLA DE PRODUCTO A GRANEL
		    
		    echo "cod_rotulo:".$cod_rotulo." gramos:".$juegos;//cuidado que aquí los juegos son en realidad gramos. 
		    
		    //***************************************************
		    
		    //actualizo la estación actual y la fecha de actualización.
		    
		    if($estacion=='6'){
		        $estacion='7';
		        $juegos=$juegos+12;
            }
            else{
                $juegos=$juegos+2;
            }
		   
            $sql8="UPDATE rotulos2 SET estacionId2 = '".$estacion. "'"." , fechaActualizacion = (select DATE_SUB(NOW(),INTERVAL 5 HOUR)) WHERE id = '". $cod_rotulo."'";
            $result8=mysqli_query($conexion,$sql8);
            
            // registra paso por la estación

	$sql81="INSERT INTO `rotuloestaciones2` (`id`, `rotuloId2`, `estacionId`, `ingreso`, `estado`) VALUES (NULL, '". $cod_rotulo."', '".$estacion. "', (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), '') ";

$result81=mysqli_query($conexion,$sql81);
            
		    //**************************************************
		    
		     
		    
		    //si existe a granel, lo actualizo, sino, lo creo.
		    
		    $sqlExisteRegistro="SELECT id, rotuloId FROM `productoGranel` WHERE rotuloId ='".$cod_rotulo."' ORDER BY id DESC LIMIT 1";
		    $resultExisteRegistro=mysqli_query($conexion,$sqlExisteRegistro);
            
            while($mostrarUltimoRegistro=mysqli_fetch_array($resultExisteRegistro)){
            $ultimoRegistroGranel=$mostrarUltimoRegistro['rotuloId'];
            }
           
            if ($juegos<=20){
                $juegos=20;
            }
            
		   if (is_null($ultimoRegistroGranel)){
		       
		    $herramienta313 = new Herramienta();
            $ingresar_datos_tabla_productoGranel = $herramienta313->ingresar_datos_tabla_productoGranel($cod_rotulo,($juegos-20));
            
           
            
		   }
		   else{
		       $sqlActualizaGramos = "UPDATE productoGranel SET gramos= '".($juegos-20)."' WHERE rotuloId = '".$cod_rotulo."'";
		       $resultActualizaGramos=mysqli_query($conexion,$sqlActualizaGramos);
		       
		       	echo "ingreso exitoso!,1 actualizo,2,3,rotuloOK,";
		   }
		   
		    


		   //*************************************************


		   

		break;
		
		case '14': // para grabar nombres de los emplaquetadores en el módulo



$cod_rotulo=intval($cod_rotulo);

 //consulta para guardar los nombres y sus id en  arreglos
            
             $arregloNombres= array();
             $arregloId = array();
            
            $sqlNombres= "SELECT id, nombre FROM emplaquetadores WHERE 1";
            $resultNombres= mysqli_query($conexion,$sqlNombres);
            
            while($mostrarNombres=mysqli_fetch_array($resultNombres)){
                $arregloNombres[]=$mostrarNombres['nombre'];
                //$arregloId[]=$mostrarNombres['id'];
                
            }
           
          $cuantosNombres=count($arregloNombres);
            

for($i=0;$i<$cuantosNombres;$i++){
            
       
 //voy creando el  String con los datos separados por un "-",  uno para los códigos y otro para las referencias. 
 
 if ($i==0){
                //$respuesta9 =  $arregloId[$i]."*".$arregloNombres[$i];
                $respuesta9 = $arregloNombres[$i];
                }
                else if ($i>0){
                
                $respuesta9 .= "*".$arregloNombres[$i];
                
                }
 
}

            
         echo "estos son los datos a guardar en el tag,".$respuesta9;
         
		break;
		
		case '15':
		
			
		    //echo "texto,rotuloOK, proceso:".$proceso."- hum/estación:".$estacion."-/juegos/temp/gramos:". $juegos."-pre/idMolde: ".$idMolde."-dist/cod_molde/idEmplaquetador:".$cod_molde."-rotulo:".$cod_rotulo."-cuentaLecturas:".$cuentaLecturas;
		    
		    $masaCalidad = explode("$",$idMolde);
		    
		    //primero debo consultar el peso de esa referencia por juego, después, realizo el ingreso de cada uno de los datos de calidad como un número de juegos negativo en revisión 1.luego ingreso en granel el sobrante
		    
		    //consulto referencia y otros detalles del rotulo
 

                    
$sqlR="SELECT referenciaId, colorId, pedido,total, referencias2.gramosJuego AS gramosJuego, referencias2.tipo AS tipo, pedidos2.linea AS linea FROM rotulos2 INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id INNER JOIN pedidos2 ON rotulos2.pedido = pedidos2.idP WHERE rotulos2.id = '".$cod_rotulo. "';";

$resultR=mysqli_query($conexion,$sqlR);

while($mostrarR=mysqli_fetch_array($resultR)){
                    
                    $referenciaId=$mostrarR['referenciaId']; 
                    $pedidoId=$mostrarR['pedido']; 
                    $colorId=$mostrarR['colorId']; 
                    $juegosIngresan=$mostrarR['total'];
                    $gramosJuego=$mostrarR['gramosJuego'];
                    $tipo=$mostrarR['tipo'];
                    $linea=$mostrarR['linea'];
                    //$gramosGranel=$mostrarR['gramosGranel'];
                    //$juegosGranel=$gramosGranel/$gramosJuego;
                    //$juegosGranel=round($juegosGranel);
                    
}

for($i=0;$i<4;$i++){
    $situacionCalidad;
    switch ($i){
        case 0:
            $situacionCalidad="BETA";
            break;
        case 1:
            $situacionCalidad="SUCIO";
            break;
        case 2:
            $situacionCalidad="PLASTICO";
            break;
        case 3:
            $situacionCalidad="OTROS";
            break;
    }
    
    $masaCalidad[$i]=trim($masaCalidad[$i]);
    $masaCalidadInt=intval($masaCalidad[$i]);
    if($masaCalidadInt >= 32){
    $juegosCalidad=$masaCalidadInt/$gramosJuego;
    }
    else{
        $juegosCalidad=0;
    }
    $sqlCalidad="INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) VALUES (NULL, '$pedidoId', '$referenciaId', '$colorId', '$cod_rotulo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-$juegosCalidad', NULL, NULL, '$situacionCalidad', '$cod_molde', current_timestamp());";
    
    $resultCalidad=mysqli_query($conexion,$sqlCalidad);
}

	    //actualizo la estación actual y la fecha de actualización.
		    
		    if($estacion=='6'){
		        $estacion='7';
		        $juegos=$juegos+12;
            }
            else{
                $juegos=$juegos+2;
            }
		   
            $sql8="UPDATE rotulos2 SET estacionId2 = '".$estacion. "'"." , fechaActualizacion = (select DATE_SUB(NOW(),INTERVAL 5 HOUR)) WHERE id = '". $cod_rotulo."'";
            $result8=mysqli_query($conexion,$sql8);
            
            // registra paso por la estación

	$sql81="INSERT INTO `rotuloestaciones2` (`id`, `rotuloId2`, `estacionId`, `ingreso`, `estado`) VALUES (NULL, '". $cod_rotulo."', '".$estacion. "', (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), '') ";

$result81=mysqli_query($conexion,$sql81);
            
		    //**************************************************
		    
		     
		    
		    //si existe a granel, lo actualizo, sino, lo creo.
		    
		    $sqlExisteRegistro="SELECT id, rotuloId FROM `productoGranel` WHERE rotuloId ='".$cod_rotulo."' ORDER BY id DESC LIMIT 1";
		    $resultExisteRegistro=mysqli_query($conexion,$sqlExisteRegistro);
            
            while($mostrarUltimoRegistro=mysqli_fetch_array($resultExisteRegistro)){
            $ultimoRegistroGranel=$mostrarUltimoRegistro['rotuloId'];
            }
           
            if ($juegos<=20){
                $juegos=20;
            }
            
		   if (is_null($ultimoRegistroGranel)){
		       
		    $herramienta313 = new Herramienta();
            $ingresar_datos_tabla_productoGranel = $herramienta313->ingresar_datos_tabla_productoGranel($cod_rotulo,($juegos-20));
            
           
            
		   }
		   else{
		       $sqlActualizaGramos = "UPDATE productoGranel SET gramos= '".($juegos-20)."' WHERE rotuloId = '".$cod_rotulo."'";
		       $resultActualizaGramos=mysqli_query($conexion,$sqlActualizaGramos);
		       
		       	echo "ingreso exitoso!,1 actualizo,2,3,rotuloOK,";
		   }
		    
		    
		    break;

	default:

	echo "debe seleccionar el proceso a realizar";
		# code...
		break;

	
	
		
}
	
?>
