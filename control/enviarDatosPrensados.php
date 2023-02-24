 <?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

require_once("herramienta_introducir_datos.php");
//$num_dato=$_GET ["numero_molde"];
$creado=null;
$vuelta1=null; 
$vuelta2=null; 
$vuelta3=null; 
$vuelta4=null; 
$vuelta5=null; 
$vuelta6=null; 
$vuelta7=null; 
$vuelta8=null; 

$molde=$_GET ["molde"];
$juegos=$_GET ["juegos"];

//consulto el rótulo correspondiente al molde leído, en la tabla asignaciones.

$sql1= "SELECT rotuloId FROM asignaciones2 WHERE moldeId = '". $molde. "'";

        $result1=mysqli_query($conexion,$sql1);         

     
                while($mostrar1=mysqli_fetch_array($result1)){
                    $rotulo=$mostrar1['rotuloId']; 
                }


//actualizo el estado del molde prensado a "enProceso"

$sql2="UPDATE prensados2 SET estado = 'enProceso' WHERE moldeId = '". $molde."'";

$result2=mysqli_query($conexion,$sql2);

//consulto  si existe un registro para este molde que también esté enProceso.

$sql3 = "SELECT * FROM prensados2 WHERE moldeId = '". $molde."'"."AND estado = 'enProceso'";

         $result3=mysqli_query($conexion,$sql3);
         while($mostrar3=mysqli_fetch_array($result3)){
                    $creado=$mostrar3['moldeId']; 
                    $vuelta1=$mostrar3['vuelta1']; 
                    $vuelta2=$mostrar3['vuelta2']; 
                    $vuelta3=$mostrar3['vuelta3']; 
                    $vuelta4=$mostrar3['vuelta4']; 
                    $vuelta5=$mostrar3['vuelta5']; 
                    $vuelta6=$mostrar3['vuelta6']; 
                    $vuelta7=$mostrar3['vuelta7']; 
                    $vuelta8=$mostrar3['vuelta8']; 
                }

                if(is_null($creado)==true){
                	$herramienta11 = new Herramienta();
$ingresar_dato_tabla_prensados = $herramienta11->ingresar_datos_tabla_prensados2($rotulo, $molde);
                }

                else{ 
                	if (is_null($vuelta1)==true){
                		$sql4="UPDATE prensados2 SET vuelta1 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result4=mysqli_query($conexion,$sql4);

                	}
                	else{
                		if (is_null($vuelta2)==true){
                		$sql5="UPDATE prensados2 SET vuelta2 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result5=mysqli_query($conexion,$sql5);
                	}
                	else{
                		if (is_null($vuelta3)==true){
                		$sql6="UPDATE prensados2 SET vuelta3 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result6=mysqli_query($conexion,$sql6);
                	}
                	else{
                		if (is_null($vuelta4)==true){
                		$sql7="UPDATE prensados2 SET vuelta4 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result7=mysqli_query($conexion,$sql7);
                	}
                	else{
                		if (is_null($vuelta5)==true){
                		$sql8="UPDATE prensados2 SET vuelta5 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result8=mysqli_query($conexion,$sql8);
                	}
                	else{
                		if (is_null($vuelta6)==true){
                		$sql9="UPDATE prensados2 SET vuelta6 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result9=mysqli_query($conexion,$sql9);
                	}
                	else{
                		if (is_null($vuelta7)==true){
                		$sql10="UPDATE prensados2 SET vuelta7 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result10=mysqli_query($conexion,$sql10);
                	}
                	else{
                	if (is_null($vuelta8)==true){
                		$sql11="UPDATE prensados2 SET vuelta8 = '".$juegos."'". "WHERE moldeId = '". $molde."'";

$result11=mysqli_query($conexion,$sql11);

$sql12="UPDATE prensados2 SET estado = 'terminado'";

$result12=mysqli_query($conexion,$sql12);
                	}
                    }
                	}
                	}
                	}
                	}
                	}
                	}

                }




?>