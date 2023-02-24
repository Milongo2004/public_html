<?php
  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  $sumaJuegos=0;

    
            //consulta para crear un arreglo los rotulos y su codigo
            
            $arregloRotulos= array();
            
            
            $sqlRotulos= "SELECT rotuloId FROM productoGranel WHERE 1";
            $resultRotulos= mysqli_query($conexion,$sqlRotulos);
            
            while($mostrarRotulos=mysqli_fetch_array($resultRotulos)){
                $arregloRotulos[]=$mostrarRotulos['rotuloId'];
                
            }
            
            $cantidadRotulos=count($arregloRotulos);
            echo $cantidadRotulos;
            
            //ciclo para recorrer todos los rótulos de la tabla de granel y ejecutar la consulta que borrará los datos repetidos. 
            
            for($i=($cantidadRotulos-1);$i>=0;$i--){
                $sqlEliminarRepetidos= "DELETE FROM productoGranel WHERE rotuloId='".$arregloRotulos[$i]."' and id != (SELECT id from productoGranel WHERE rotuloId = '".$arregloRotulos[$i]."' ORDER BY id DESC LIMIT 1)";
                
                $resultEliminarRepetidos=mysqli_query($conexion,$sqlEliminarRepetidos);
                
                echo "$i"." rotulo= ".$arregloRotulos[$i]."resultado = ".$resultEliminarRepetidos;
                echo "</br>";
            }
            
            
            


?>