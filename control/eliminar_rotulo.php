<?php

 $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$id = $_GET['id'];

//variables a obtener para actualizar los disponibles

$referenciaId="";
$cantidadMoldes="";
$moldesTotales="";
$moldesEnUso="";
$moldesDisponibles="";


//consulto la cantidad de moldes que habían sido usados y la referencia. 

$sql0 = "SELECT cantidadMoldes, referenciaId FROM rotulos2 WHERE id = '".$id ."' ";

$resultado0= mysqli_query($conexion, $sql0);

while($mostrar0=mysqli_fetch_array($resultado0)){
            $cantidadMoldes=$mostrar0['cantidadMoldes'];
            $referenciaId=$mostrar0['referenciaId'];
            }
            
            //consulto la cantidad de moldes de la referencia y la cantidad de moldes usados.

$sql3= "SELECT * FROM referencias2 WHERE id = '". $referenciaId. "'";

        $result3=mysqli_query($conexion,$sql3);

     
                while($mostrar3=mysqli_fetch_array($result3)){
                      
                    $moldesTotales=$mostrar3['totalMoldes'];
                    $moldesEnUso=$mostrar3['moldesEnUso'];
                    $moldesDisponibles=$mostrar3['moldesDisponibles'];
    
            }
            
            $moldesEnUso=$moldesEnUso-$cantidadMoldes;
            $moldesDisponibles=$moldesDisponibles+$cantidadMoldes;
            
            //antes de borrar el registro, actualizo en la tabla referencias 2 los valores de los moldes en uso y los moldes disponibles. 
            
            $sql4 = "UPDATE referencias2 SET moldesDisponibles = '".$moldesDisponibles."', moldesEnUso= '".$moldesEnUso."' WHERE id = '".$referenciaId. "'";
            
            $resultado4 = mysqli_query($conexion, $sql4);

//después de actualizar las cantidad de moldes, elimino el registro.

$sql = "DELETE FROM `rotulos2` WHERE id = ' ".$id."'";

$resultado = mysqli_query($conexion, $sql);

$sqlActualizaDetalles= mysqli_query($conexion, "DELETE FROM `pedidoDetalles` WHERE rotuloId = '$id'");

mysqli_close($conexion);

?>