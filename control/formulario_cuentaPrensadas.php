<?php
  
                    


             
 

   
    presentar_tabla_segun_caja($caja, $pedido);
   
            
            
            function presentar_tabla_segun_requserimientos($numCaja, $numPedido){
                $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
                ?>
                <table border="1">
            <tr>
                <td>id</td>
                <td>MOLD</td>
                <td>ANT/POS</td>
                <td>UPP/LOW</td>
                <td>SHADE</td>
                <td>LOTE</td>
                <td>TOTAL</td>
                
            </tr>
            
            <?php
            $sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE caja ='". $numCaja. "'"." AND pedidoId = '". $numPedido. "'"." GROUP BY mold, shade, lote ORDER BY mold;";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['mold'] ?></td>
                <td><?php echo $mostrar['antPos'] ?></td>
                <td><?php echo $mostrar['uppLow'] ?></td>
                <td><?php echo $mostrar['shade'] ?></td>
                <td><?php echo $mostrar['lote'] ?></td>
                <td><?php echo $mostrar['total'] ?></td>
                
            </tr>
            <?php
            }
                //a continuación consulto el total de juegos empacados por caja.
           
           $sqlC="SELECT SUM(juegos) AS total FROM listaEmpaque WHERE caja ='". $numCaja. "' AND pedidoId = '". $numPedido. "'";
            $resultC=mysqli_query($conexion,$sqlC);
            
            while($mostrarC=mysqli_fetch_array($resultC)){
            $juegosCaja=$mostrarC['total'];
            }
            
             //a continuación consulto el total de juegos empacados de todo el pedido
           
           $sqlE="SELECT SUM(juegos) AS total FROM listaEmpaque WHERE pedidoId = '". $numPedido. "'";
            $resultE=mysqli_query($conexion,$sqlE);
            
            while($mostrarE=mysqli_fetch_array($resultE)){
            $juegosTotEmpacados=$mostrarE['total'];
            }
            
            //a continuación consulto el total de juegos del pedido
           
           $sqlP="SELECT juegosTotales AS total FROM pedidos2 WHERE idP ='". $numPedido. "'";
            $resultP=mysqli_query($conexion,$sqlP);
            
            while($mostrarP=mysqli_fetch_array($resultP)){
            $juegosPedido=$mostrarP['total'];
            }
            //calculo los juegos que faltan por empacar de este pedido.
            
            $juegosFaltan=$juegosPedido-$juegosTotEmpacados;
            
           
            ?>
        </table>
        
        <br></br>
        <table border="1">
            <tr>
                <td>Caja</td>
                <td>Van</td>
                <td>Pedido</td>
                <td>Faltan</td>
                
                
            </tr>
            
          
            <tr>
                <td><?php echo $juegosCaja ?></td>
                <td><?php echo $juegosTotEmpacados ?></td>
                <td><?php echo $juegosPedido ?></td>
                <td><?php echo $juegosFaltan ?></td>
                
                
            </tr>
           
        </table>
        </center>
    
</body>
</html>
        <?php
            }
            ?>
            