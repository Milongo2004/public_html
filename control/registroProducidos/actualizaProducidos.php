<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    
    $moldesPrensada=null;
    $turnoMayus="";
    
    //$arrayId[$i]="";
    //$arrayPrensada[$i]="";
    //$arrayRef[$i]="";
    //$arrayColor[$i]="";
    //$arrayPedido[$i]="";
    //$arrayLote[$i]="";

  
//creo un arreglo para guardar los producidos con el id del rótulo.

        $arregloProducidos=array();
   
    
    
        
       $fecha=$_POST ["fecha"];
       $turno=$_POST ["turno"];
       $arregloIdRotulo=(unserialize(base64_decode($_POST['arregloIdRotulo'])) );
       
       $cantidadRotulos=$_POST ["cantidadRotulos"];
       //var_dump($cantidadRotulos);
       //echo "cantidad rotulos= ". $cantidadRotulos;
       //var_dump($arregloIdRotulo);
       
       
       //creo un ciclo para mostrar los id con el numero de juegos al frente
       
       for($i=0; $i<$cantidadRotulos; $i++){
           $arregloIdRotulo[$i]=intval($arregloIdRotulo[$i]);
           $arregloProducidos[$arregloIdRotulo[$i]]=$_POST["producidos".$arregloIdRotulo[$i]];
           //echo "rotulo = ".$arregloIdRotulo[$i]." producidos = ".$arregloProducidos[$arregloIdRotulo[$i]];
           //echo "</br>";
           
          if(is_null($arregloProducidos[$arregloIdRotulo[$i]]) or $arregloProducidos[$arregloIdRotulo[$i]]==0){
              
          } 
          else{
          
           $sqlProducidos = "UPDATE rotulos2 SET total = '".$arregloProducidos[$arregloIdRotulo[$i]]."' WHERE id = '".$arregloIdRotulo[$i]."'";
		       $resultProducidos=mysqli_query($conexion,$sqlProducidos);
		       
		        
		       $sqlDetallesProducidos = "UPDATE pedidoDetalles SET producidos = '".$arregloProducidos[$arregloIdRotulo[$i]]."' WHERE rotuloId = '".$arregloIdRotulo[$i]."'  AND producidos is not null";
		       $resultDetallesProducidos=mysqli_query($conexion,$sqlDetallesProducidos);
		       
		       
		       $sqlDetallesPulidos = "UPDATE pedidoDetalles SET pulidos = '".$arregloProducidos[$arregloIdRotulo[$i]]."' WHERE rotuloId = '".$arregloIdRotulo[$i]."' AND pulidos is not null";
		       $resultDetallesPulidos=mysqli_query($conexion,$sqlDetallesPulidos);
		   
		   /*if($stmtProducidos->execute()){
		   
		 echo "se actualizó correctamente el rotulo = ".$arregloIdRotulo[$i]." producidos = ". $arregloProducidos[$arregloIdRotulo[$i]];
			
       }
       	else{
			echo "no se pudo registrar datos en tabla rotulos2,";
		}*/
       }
       }
       
       //var_dump($arregloProducidos);
       ?>
      
       <!DOCTYPE html>

			
<head>
	<meta charset="UTF-8">
	<title>ActualizaProducidos</title>
	
</head>
<body>
    
<center><h1>¡Actualización de datos exitosa!</h1></center>
		   <meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/registroProducidos/registroProducidos1.php">
		   
		   </body>
		   </head>
		   </html>
		   <?php
       
       ?>