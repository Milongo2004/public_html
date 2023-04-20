<?php

 class Herramienta{
	private $conexion; 
	



	function __construct(){
		require_once("conexion_privada.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
		
	}

	public function ingresar_datos($pre_php, $hum_php, $temp_php, $dist_php){
		$sql = " insert into tabla_sensor values (null, ?, ?, ?, ?, now()) ";
		$stmt = $this->conexion->conexion->prepare($sql);
		//global $numero_molde;

		$stmt->bindValue(1, $pre_php);
		$stmt->bindValue(2, $hum_php);
		$stmt->bindValue(3, $temp_php);
		$stmt->bindValue(4, $dist_php);

		if($stmt->execute()){
		    
			echo "Ingreso Exitoso,";
			//echo $numero_molde,",";

		}else{
			echo "no se pudo registrar datos,";
		}
		
		
	}
	
	///////////////////////////////////////////////////////////////////
	
	//SE MODIFICA EL NOW() POR EL (select DATE_SUB(NOW(),INTERVAL 5 HOUR)) PARA ACOMODAR A HORA LOCAL.
	public function ingresar_datos_prensadas($tiempoPrensada, $minutosInactivo){
		$sqlP = " insert into cuentaPrensadas2 values (null, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmtP = $this->conexion->conexion->prepare($sqlP);
		

		$stmtP->bindValue(1, $tiempoPrensada);
		$stmtP->bindValue(2, $minutosInactivo);

		if($stmtP->execute()){
		    
			echo ",prensadaOK,";
 

		}else{
			echo "no se pudo registrar datos,";
			echo "se ha intentado ingresar los siguientes  datos sin éxito:" ;
		}
		
		
	}
	
	////////////////////////////////////////////////////////
	
	//SE MODIFICA EL NOW() POR EL (select DATE_SUB(NOW(),INTERVAL 5 HOUR)) PARA ACOMODAR A HORA LOCAL.
	public function ingresar_datos_tiempoPrensas($tiempoPrensada, $minutosInactivo, $prensa){
		$sqlTP = " insert into tiempoPrensas values (null, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmtTP = $this->conexion->conexion->prepare($sqlTP);
		
        $stmtTP->bindValue(1, $prensa);
		$stmtTP->bindValue(2, $tiempoPrensada);
		$stmtTP->bindValue(3, $minutosInactivo);

		if($stmtTP->execute()){
		    
			echo ",prensadaOK,";
 

		}else{
			echo "no se pudo registrar datos,";
			echo "se ha intentado ingresar los siguientes  datos sin éxito: prensa= ".$prensa."tiempo en uso= ". $tiempoPrensada." Tiempo inactiva= ".$minutosInactivo ;
		}
		
		
	}
	
	////////////////////////////////////////////////////////
	
	public function ingresar_datos_tabla2($pre_php, $hum_php, $temp_php, $dist_php){
		$sql_2 = " insert into tabla2 values (null, ?, ?, ?, ?, now()) ";
		$stmt_2 = $this->conexion->conexion->prepare($sql_2);

		$stmt_2->bindValue(1, $pre_php);
		$stmt_2->bindValue(2, $hum_php);
		$stmt_2->bindValue(3, $temp_php);
		$stmt_2->bindValue(4, $dist_php);

		if($stmt_2->execute()){
			echo "Ingreso Exitoso en tabla2,";
			$stmt_3p = "SELECT cod_molde AS dto1 FROM moldes ORDER BY id_molde DESC LIMIT 1";
		    $stmt_3p = $this->conexion->conexion->prepare($stmt_3p);
		    $stmt_3p->execute();
		    $dgf = $stmt_3p->fetch();
		    echo $dgf["dto1"].",";
		}else{
			echo "no se pudo registrar datos en tabla2,";
		}
}

//ingreso valores del formulario QR a la tabla listaEmpaque

public function ingresar_datos_listaEmpaque($ref, $antPos, $supInf, $color, $lote, $juegos, $codigoQR,
$pedido, $caja, $metodo){
		$sql_21 = " insert into listaEmpaque values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_21 = $this->conexion->conexion->prepare($sql_21);

		$stmt_21->bindValue(1, $ref);
		$stmt_21->bindValue(2, $antPos);
		$stmt_21->bindValue(3, $supInf);
		$stmt_21->bindValue(4, $color);
		$stmt_21->bindValue(5, $lote);
		$stmt_21->bindValue(6, $juegos);
		$stmt_21->bindValue(7, $codigoQR);
		$stmt_21->bindValue(8, $pedido);
		$stmt_21->bindValue(9, $caja);

		if($stmt_21->execute()){
		   
			echo "Ingreso Exitoso!";
			
			?>
			<html lang="en">
			    <body><div class="row">
            <form action="formularioListas4.php" method="get" name="ingresoLista">

                <div class="mb-3">
                    

                    
                    <input name="cajas" type="hidden" value="null">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="caja" type="hidden" value=" <?php
                        echo $caja; 
                    ?>">
                    <input name="metodo" type="hidden" value=" <?php
                        echo $metodo; 
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('ingresoLista').submit();
    }
</script>

			<br>
			<html lang="en">
			    <body><div class="row">
            <form action="empaque.php" method="get" name="empaquePedido">

                <div class="mb-3">

                    
                    <input name="cajas" type="hidden" value="null">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="caja" type="hidden" value=" <?php
                        echo $caja; 
                    ?>">
                    <input name="metodo" type="hidden" value=" <?php
                        echo $metodo; 
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>Volver al pedido</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('empaquePedido').submit();
    }
</script>
</body>
</html>


<?php


		}
		else{
			echo "no se pudo registrar datos!";
		}
}

//ingreso valores del formulario QR a la tabla listaEmpaque, con formulario en el que hay que digitar el lote.

public function ingresar_datos_listaEmpaque_digitandoLote($ref, $antPos, $supInf, $color, $lote, $juegos, $cajas, $codigoQR, $pedido, $caja, $metodo){
    
 
		$sql_21 = " insert into listaEmpaque values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_21 = $this->conexion->conexion->prepare($sql_21);

		$stmt_21->bindValue(1, $ref);
		$stmt_21->bindValue(2, $antPos);
		$stmt_21->bindValue(3, $supInf);
		$stmt_21->bindValue(4, $color);
		$stmt_21->bindValue(5, $lote);
		$stmt_21->bindValue(6, $juegos);
		$stmt_21->bindValue(7, $cajas);
		$stmt_21->bindValue(8, $codigoQR);
		$stmt_21->bindValue(9, $pedido);
		$stmt_21->bindValue(10, $caja);

		if($stmt_21->execute()){
		    
		    
	
		    
			//echo "Ingreso Exitoso!";
			?>
			<html lang="en">
			    <head>
			    <meta http-equiv="refresh" content="0.2; url= https://trazabilidadmasterdent.online/control/formularioListas_digitaLote.php?pedido=<?php echo $pedido?>&caja=<?php echo $caja?>&metodo=<?php echo $metodo?>">
			    </head>
<body>
<p align="left">¡Registro Exitoso!</p>
</body>
			    
			  <!--  <body><div class="row">
            <form action="formularioListas_digitaLote.php" method="get" name="ingresoLista">

                <div class="mb-3">

                    
                    <input name="cajas" type="hidden" value="null">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="caja" type="hidden" value=" <?php
                        echo $caja; 
                    ?>">
                    <input name="metodo" type="hidden" value=" <?php
                        echo $metodo; 
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('ingresoLista').submit();
    }
</script>
<br>
			<html lang="en">
			    <body><div class="row">
            <form action="empaque.php" method="get" name="empaquePedido">

                <div class="mb-3">

                    
                    <input name="cajas" type="hidden" value="null">
                    <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="caja" type="hidden" value=" <?php
                        echo $caja; 
                    ?>">
                    <input name="metodo" type="hidden" value=" <?php
                        echo $metodo; 
                    ?>">
                </div>        
                <br>
                
                   
   
                

                <button onClick='submitForm()'>Volver al pedido</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('empaquePedido').submit();
    }
</script>
</body>
</html>
-->
<?php
}
		
		else{
			echo "no se pudo registrar datos!";
		}
}

//elimino la presión; ya que en la tabla sólo tengo estación, dientes descontados y molde.
	public function ingresar_datos_tabla3($hum_php, $rotulo_php, $dist_php, $temp_php){
	    if($dist_php != null or $rotulo_php != null){
		$sql_3 = " insert into tabla3 values (null, ?, ?, ?, ?, now()) ";//elimino una interrogación
		$stmt_3 = $this->conexion->conexion->prepare($sql_3);

	
		$stmt_3->bindValue(1, $hum_php);
		$stmt_3->bindValue(2, $rotulo_php);
		$stmt_3->bindValue(3, $dist_php);//importante que aquí los numeros sean desde el 1.
		$stmt_3->bindValue(4, $temp_php);

		if($stmt_3->execute()){
			echo "Ingreso Exitoso en tabla3,";
			  //$stmt_2p = "SELECT CONCAT(id_produccion, '-', id_prod) AS dto FROM secuencia_produc ORDER BY id_produccion DESC LIMIT 1";
			  //$stmt_2p = "SELECT CONCAT(#_rotulo, '-', cod_rotulo) AS dto FROM rotulos ORDER BY #_rotulo DESC LIMIT 1";
			$stmt_2p = "SELECT cod_rotulo AS dto FROM Rotulo ORDER BY id_rotulo DESC LIMIT 1";  
			//$stmt_2p = "SELECT cod_rotulo AS dto2 FROM rotulos ORDER BY #_rotulo DESC LIMIT 1";
		    $stmt_2p = $this->conexion->conexion->prepare($stmt_2p);
		    $stmt_2p->execute();
		    $dgf = $stmt_2p->fetch();
		    //echo ",".$dgf["dto"];
		    echo $dgf["dto"].",";
			//echo "Ingreso Exitoso en tabla_produccion,";
			//echo $num_dato,",";
		
		}
		else{
			echo "no se pudo registrar datos en tabla3,";
		}
	    }
	    else{
	        echo "dato de molde, vacío no se puede permitir subir a la base de datos un campo vacío no tiene sentido que se le asigne un regitro al dato nulo se induce un error con esta linea larga para que el buffer que está lleno que es lo que causa este vacío se vacie y permita la lectura de nuevos tags,";
	    }
}

//ensayo por este método a ingresar datos en la base mediante la pagina web

	public function ingresar_datos_tabla_RotuloEstaciones($rotulo_php, $hum_php){
	    if($rotulo_php != null){
		$sql_4 = " insert into RotuloEstaciones values (null, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_4 = $this->conexion->conexion->prepare($sql_4);
    
	
		$stmt_4->bindValue(1, $rotulo_php);
		$stmt_4->bindValue(2, $hum_php);
		

		if($stmt_4->execute()){
		    /*$stmt_2p = "SELECT CONCAT(chipid, '-', id_prod) AS dto FROM tabla_produccion ORDER BY id_prod DESC LIMIT 1";
		    $stmt_2p = $this->conexion->conexion->prepare($stmt_2p);
		    $stmt_2p->execute();
		    $dgf = $stmt_2p->fetch();
		    echo ",".$dgf["dto"];
		    */
			echo "rotuloOK,";
			//echo $num_dato,",";
		}
		else{
			echo "no se pudo registrar datos en tabla_RotuloEstaciones,";
		}
	    }
	    else{
	        echo "dato de rótulo vacío,";
	    }
}


public function ingresar_datos_tabla_rotulos($id_produccion){
		$sql_6 = " insert into Rotulo values (null, ? , (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_6 = $this->conexion->conexion->prepare($sql_6);

	
		$stmt_6->bindValue(1, $id_produccion);
	

		if($stmt_6->execute()){
			echo "Ingreso Exitoso en tabla Rotulo,";
		}else{
			echo "no se pudo registrar datos en tabla Rotulos,";
		}
}

public function ingresar_datos_tabla_moldes($cod_molde, $referenciaId){
		$sql_7 = " insert into moldes2 values (null, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'libre') ";
		$stmt_7 = $this->conexion->conexion->prepare($sql_7);

	
		$stmt_7->bindValue(1, $cod_molde);
		$stmt_7->bindValue(2, $referenciaId);
	

		if($stmt_7->execute()){
			echo "Ingreso Exitoso en tabla moldes,";
		}else{
			echo "no se pudo registrar datos en tabla moldes,";
		}
}

public function ingresar_datos_tabla_rotulos2($fecha, $prensada, $rotulo, $referenciaId, $loteId, $colorId, $pedido,  $num_moldes, $casillaId, $turno, $juegosRotulo,$juegosTotales){
		$sql_8 = " insert into rotulos2 values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '1', ?, ?, ?, ?, ?, ?, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'enProceso' ) ";
		$stmt_8 = $this->conexion->conexion->prepare($sql_8);

	
		$stmt_8->bindValue(1, $rotulo);
		$stmt_8->bindValue(2, $fecha);
		$stmt_8->bindValue(3, $prensada);
		$stmt_8->bindValue(4, $referenciaId);
		$stmt_8->bindValue(5, $loteId);
		$stmt_8->bindValue(6, $colorId);
		$stmt_8->bindValue(7, $pedido);
		$stmt_8->bindValue(8, $num_moldes);
		$stmt_8->bindValue(9, $casillaId);
		$stmt_8->bindValue(10, $turno);
		$stmt_8->bindValue(11, $juegosRotulo);
		$stmt_8->bindValue(12, $juegosRotulo);
		$stmt_8->bindValue(13, $juegosRotulo);
		$stmt_8->bindValue(14, $juegosRotulo);
		$stmt_8->bindValue(15, $juegosRotulo);
		$stmt_8->bindValue(16, $juegosRotulo);
		$stmt_8->bindValue(17, $juegosRotulo);
		$stmt_8->bindValue(18, $juegosRotulo);
		$stmt_8->bindValue(19, $juegosRotulo);
		$stmt_8->bindValue(20, $juegosTotales);

		
	

		if($stmt_8->execute()){
		    
		    if ($casillaId != '41'){

			$sql_cs = "UPDATE casillas2 SET casillas2.`disponibilidad`=1 WHERE casillas2.`id`=".$casillaId."";
			$stmt_cs = $this->conexion->conexion->prepare($sql_cs);
			
			echo "Ingreso Exitoso en tabla rotulos2,";
			
			?>
			<html lang="en">
			    
			    <body><div class="row">
            <form action="progProduccion/progProduccion4.php" method="POST" name="otraReferencia">

                <div class="mb-3">
                    
                   
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha; 
                    ?>">
                    <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                    <input name="lote" type="hidden" value=" <?php
                        echo $loteId; 
                    ?>">
                     <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="color" type="hidden" value=" <?php
                        echo $colorId;  
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('otraReferencia').submit();
    }
</script>

			<br>
			    <head>
			    <!--<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/nuevaProgramacion3.php">-->
			    </head>

			 <?php
		    }
			
			else{
			    echo "Ingreso Exitoso en tabla rotulos2,";
				//header("Location: https://trazabilidadmasterdent.online/control/public_html/control/formularioListas2.php");	
				?>
				<html lang="en">
			    <head>
			          <body><div class="row">
            <form action="progProduccion/progProduccion4.php" method="POST" name="otraReferencia">

                <div class="mb-3">
                    
                   
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha; 
                    ?>">
                    <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                    <input name="lote" type="hidden" value=" <?php
                        echo $loteId; 
                    ?>">
                     <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="color" type="hidden" value=" <?php
                        echo $colorId;  
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
            <script>
    function submitForm() {
        document.getElementById('otraReferencia').submit();
    }
</script>

			<br>
			    <!--<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/nuevaProgramacion3.php">-->
			    </head>
			    <?php
			}

		}
		else{
			echo "no se pudo registrar datos en tabla rotulos2,";
		}
}

//////////////////////////////////////////////////////////

public function ingresar_datos_tabla_rotulos2_metodo2($fecha, $prensada, $rotulo, $referenciaId, $loteId, $colorId, $pedido,  $num_moldes, $casillaId, $turno, $juegosRotulo,$juegosTotales, $nota){
		$sql_8 = " insert into rotulos2 values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '1', ?, ?, ?, ?, ?, ?, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'enProceso', ? ) ";
		$stmt_8 = $this->conexion->conexion->prepare($sql_8);

	
		$stmt_8->bindValue(1, $rotulo);
		$stmt_8->bindValue(2, $fecha);
		$stmt_8->bindValue(3, $prensada);
		$stmt_8->bindValue(4, $referenciaId);
		$stmt_8->bindValue(5, $loteId);
		$stmt_8->bindValue(6, $colorId);
		$stmt_8->bindValue(7, $pedido);
		$stmt_8->bindValue(8, $num_moldes);
		$stmt_8->bindValue(9, $casillaId);
		$stmt_8->bindValue(10, $turno);
		$stmt_8->bindValue(11, $juegosRotulo);
		$stmt_8->bindValue(12, $juegosRotulo);
		$stmt_8->bindValue(13, $juegosRotulo);
		$stmt_8->bindValue(14, $juegosRotulo);
		$stmt_8->bindValue(15, $juegosRotulo);
		$stmt_8->bindValue(16, $juegosRotulo);
		$stmt_8->bindValue(17, $juegosRotulo);
		$stmt_8->bindValue(18, $juegosRotulo);
		$stmt_8->bindValue(19, $juegosRotulo);
		$stmt_8->bindValue(20, $juegosTotales);
		$stmt_8->bindValue(21, $nota);

		
	

		if($stmt_8->execute()){
		    
		    if ($casillaId != '41'){

			$sql_cs = "UPDATE casillas2 SET casillas2.`disponibilidad`=1 WHERE casillas2.`id`=".$casillaId."";
			$stmt_cs = $this->conexion->conexion->prepare($sql_cs);
			
			echo "Ingreso Exitoso en tabla rotulos2,";
			
		

			
			?>
			<html lang="en">
			    <head>
			          <body><div class="row">
            <form id="form1" action="progProduccion/progProduccion4.php" method="POST" name="otraReferencia">

                <div class="mb-3">
                    
                   
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha; 
                    ?>">
                    <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                    <input name="lote" type="hidden" value=" <?php
                        echo $loteId; 
                    ?>">
                     <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="color" type="hidden" value=" <?php
                        echo $colorId;  
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
            <a href="#" onclick="javascript:document.form1.submit()" title="Abre el enlace">Enlace</a>
            
            <script>
    function submitForm() {
        document.getElementById('otraReferencia').submit();
    }
</script>

			<br>
			    <meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/progProduccion/progProduccion4.php?pedido=<?php echo $pedido?>&lote=<?php echo $loteId?>&color=<?php echo $colorId?>&fecha=<?php echo $fecha?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>">
			    </head>

			 <?php
		    }
			
			else{
			    echo "Ingreso Exitoso en tabla rotulos2,";
			    
			


				//header("Location: https://trazabilidadmasterdent.online/control/public_html/control/formularioListas2.php");	
				?>
				<html lang="en">
			    <head>
			        
			          <body><div class="row">
            <form action="progProduccion/progProduccion4.php" method="POST" name="otraReferencia">

                <div class="mb-3">
                    
                   
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha; 
                    ?>">
                    <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                    <input name="lote" type="hidden" value=" <?php
                        echo $loteId; 
                    ?>">
                     <input name="pedido" type="hidden" value=" <?php
                        echo $pedido;  
                    ?>">
                    <input name="color" type="hidden" value=" <?php
                        echo $colorId;  
                    ?>">
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
           
            
            <script>
    function submitForm() {
        document.getElementById('otraReferencia').submit();
    }
</script>

			<br>
			    <meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/progProduccion/progProduccion4.php?pedido=<?php echo $pedido?>&lote=<?php echo $loteId?>&color=<?php echo $colorId?>&fecha=<?php echo $fecha?>&turno=<?php echo $turno?>&prensada=<?php echo $prensada?>">
			    </head>
			    <?php
			}

		}
		else{
			echo "no se pudo registrar datos en tabla rotulos2,";
		}
}

//////////////////////////////////////////////////////////


public function ingresar_datos_tabla_rotulos2_metodo3($fecha1, $turno1, $prensada1, $fecha2, $turno2, $prensada2){
    
    //obtengo id del ultimo registro.

        
        $sqlU= "SELECT id FROM rotulos2 ORDER BY id DESC LIMIT 1";

        $resultU=mysqli_query($conexion,$sqlU);         

     
                while($mostrarU=mysqli_fetch_array($resultU)){
                    $ultimoId=$mostrarU['id'];
   
            
            }
            
            //inserto los datos de la prensada original en la tabla rótulos
            
           $sqlC = "INSERT INTO rotulos2 (`cod_rotulo`,`fecha`,`prensada`,`referenciaId`,`loteId`, `colorId`, `pedido`,`cantidadMoldes`,
`casillaId`,`turno`,`juegos`,`estacionId2`,`vuelta1`,`vuelta2`,`vuelta3`,`vuelta4`,`vuelta5`,`vuelta6`,`vuelta7`,
`vuelta8`,`total`,`fechaCreacion`,`fechaActualizacion`,`estado`,`nota`)  SELECT `cod_rotulo`,`fecha`,`prensada`,`referenciaId`,`loteId`, `colorId`, `pedido`,`cantidadMoldes`,
`casillaId`,`turno`,`juegos`,`estacionId2`,`vuelta1`,`vuelta2`,`vuelta3`,`vuelta4`,`vuelta5`,`vuelta6`,`vuelta7`,
`vuelta8`,`total`,`fechaCreacion`,`fechaActualizacion`,`estado`,`nota` FROM rotulos2 WHERE rotulos2.`fecha` = '".$fecha1."' 
AND rotulos2.`turno` LIKE '%.".$turno1."%' AND rotulos2.`prensada` = '".$prensada1."' ";

$resultC=mysqli_query($conexion,$sqlC);         

     //LUEGO ACTUALIZO LA FECHA, EL TURNO, EL ID Y LA PRENSADA DE ESTOS ÚLTIMOS X REGISTROS
     
     $sqlA = "UPDATE rotulos2 SET fecha = '".$fecha2."' , turno = '".$turno2."', prensada = '".$prensada2."', cod_rotulo = id WHERE id > '".$ultimoId."'";
     
     $resultA = mysqli_query($conexion,$sqlA);

               

		

		if($sqlA->execute()){
		    
		    
			    echo "Ingreso Exitoso en tabla rotulos2,";
				//header("Location: https://trazabilidadmasterdent.online/control/public_html/control/formularioListas2.php");	
				?>
				<html lang="en">
			    <head>
			        
			          <body><div class="row">
            <form action="progProduccion/progProduccion4.php" method="POST" name="otraReferencia">

                <div class="mb-3">
                    
                   
                    <input name="fecha" type="hidden" value=" <?php
                        echo $fecha; 
                    ?>">
                    <input name="turno" type="hidden" value=" <?php
                        echo $turno; 
                    ?>">
                    <input name="prensada" type="hidden" value=" <?php
                        echo $prensada; 
                    ?>">
                   
                </div>        
                <br>

   
                

                <button onClick='submitForm()'>NuevoRegistro</button>
                
            </form>
            
           
            
            <script>
    function submitForm() {
        document.getElementById('otraReferencia').submit();
    }
</script>

			<br>
			    <meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/progProduccion/progProduccion3.php?fecha=<?php echo $fecha2?>&turno=<?php echo $turno2?>&prensada=<?php echo $prensada2?>">
			    </head>
			    <?php
			}

		
		else{
			echo "no se pudo registrar datos en tabla rotulos2,";
		}
}

//////////////////////////////////////////////////////////

public function ingresar_datos_tabla_lotes2($lote, $colorId){
		$sql_9 = " INSERT INTO lotes2 values (null, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)),(select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'enProceso') ";
		$stmt_9 = $this->conexion->conexion->prepare($sql_9);

	
		$stmt_9->bindValue(1, $lote);		
		$stmt_9->bindValue(2, $colorId);
		
		
	

		if($stmt_9->execute()){
		
			echo "Ingreso Exitoso en tabla lotes2,";
			?>
			<html lang="en">
			    <head>
<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/formulario_lotes.php">
			    </head>

			 <?php
			
		}
		
		else{
			echo "no se pudo registrar datos en tabla lotes2,";
		}
}

///////////////////////////////////////////////////////////

//se insertan los datos de rótulo y molde a la tabla asignaciones y se inicia el proceso.

public function ingresar_datos_tabla_asignaciones2($rotulo, $molde){
		$sql_10 = " insert into asignaciones2 values (null, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'enProceso') ";
		$stmt_10 = $this->conexion->conexion->prepare($sql_10);

	
		$stmt_10->bindValue(1, $rotulo);
		$stmt_10->bindValue(2, $molde);
	

		if($stmt_10->execute()){	
			echo "AsignadoOk!";
		}else{
			echo "no se pudo registrar datos en tabla asignaciones2,";
		}
}

///////////////////////////////////////////////////////////////

public function ingresar_datos_tabla_prensados2($rotulo, $molde){
		$sql_11 = " insert into prensados2 values (null, ?, ?, '0', '0', '0', '0', '0', '0', '0', '0', '0', (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'enProceso') ";
		$stmt_11 = $this->conexion->conexion->prepare($sql_11);

	
		$stmt_11->bindValue(1, $molde);
		$stmt_11->bindValue(2, $rotulo);
		//$stmt_11->bindValue(3, $juegos);
	

		if($stmt_11->execute()){
			echo "Ingreso Exitoso!";
		}else{
			echo "no se pudo registrar datos en tabla prensados2,";
		}
}

///////////////////////////////////////////////////////////////

public function ingresar_juegos_vueltas ($juegos,$moldeId,$rotuloMolde,$vuelta1,$vuelta2,$vuelta3,$vuelta4,$vuelta5,$vuelta6,$vuelta7,$vuelta8){
    
	$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
	
		
		if (($vuelta1)==0){
                		$sql52="UPDATE prensados2 SET vuelta1 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result52=mysqli_query($conexion,$sql52);

$sqlRotulos1="UPDATE rotulos2 SET rotulos2.`vuelta1`= (SELECT SUM(prensados2.`vuelta1`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos1=mysqli_query($conexion,$sqlRotulos1);

                	}
                	else{
                		if (($vuelta2)==0){
                		$sql53="UPDATE prensados2 SET vuelta2 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result53=mysqli_query($conexion,$sql53);

$sqlRotulos2="UPDATE rotulos2 SET rotulos2.`vuelta2`= (SELECT SUM(prensados2.`vuelta2`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos2=mysqli_query($conexion,$sqlRotulos2);
                	}
                	else{
                		if (($vuelta3)==0){
                		$sql54="UPDATE prensados2 SET vuelta3 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result54=mysqli_query($conexion,$sql54);

$sqlRotulos3="UPDATE rotulos2 SET rotulos2.`vuelta3`= (SELECT SUM(prensados2.`vuelta3`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos3=mysqli_query($conexion,$sqlRotulos3);
                	}
                	else{
                		if (($vuelta4)==0){
                		$sql7="UPDATE prensados2 SET vuelta4 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result7=mysqli_query($conexion,$sql7);

$sqlRotulos4="UPDATE rotulos2 SET rotulos2.`vuelta4`= (SELECT SUM(prensados2.`vuelta4`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos4=mysqli_query($conexion,$sqlRotulos4);
                	}
                	else{
                		if (($vuelta5)==0){
                		$sql8="UPDATE prensados2 SET vuelta5 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result8=mysqli_query($conexion,$sql8);

$sqlRotulos5="UPDATE rotulos2 SET rotulos2.`vuelta5`= (SELECT SUM(prensados2.`vuelta5`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos5=mysqli_query($conexion,$sqlRotulos5);
                	}
                	else{
                		if (($vuelta6)==0){
                		$sql9="UPDATE prensados2 SET vuelta6 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result9=mysqli_query($conexion,$sql9);

$sqlRotulos6="UPDATE rotulos2 SET rotulos2.`vuelta6`= (SELECT SUM(prensados2.`vuelta6`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos6=mysqli_query($conexion,$sqlRotulos6);
                	}
                	else{
                		if (($vuelta7)==0){
                		$sql10="UPDATE prensados2 SET vuelta7 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result10=mysqli_query($conexion,$sql10);

$sqlRotulos7="UPDATE rotulos2 SET rotulos2.`vuelta7`= (SELECT SUM(prensados2.`vuelta7`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos7=mysqli_query($conexion,$sqlRotulos7);
                	}
                	else{
                	if (($vuelta8)==0){
                		$sql11="UPDATE prensados2 SET vuelta8 = '".$juegos."'".", total = (SELECT vuelta1 + vuelta2 + vuelta3 + vuelta4 + vuelta5 + vuelta6 + vuelta7 + vuelta8 WHERE moldeId ='".$moldeId."')" ."WHERE moldeId = '". $moldeId."'";

$result11=mysqli_query($conexion,$sql11);

$sqlRotulos8="UPDATE rotulos2 SET rotulos2.`vuelta8`= (SELECT SUM(prensados2.`vuelta8`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'"."), rotulos2.`total` =  (SELECT SUM(prensados2.`total`) FROM prensados2 WHERE prensados2.`rotuloId`='".$rotuloMolde."'".") WHERE rotulos2.`id` = '".$rotuloMolde."'";

$sqlRotulos8=mysqli_query($conexion,$sqlRotulos8);

//actualizo el estado a terminado en la tabla prensados para este molde
//se van a actualizar todos los registros de prensados que tengan este molde, pero no importa porque si un registro se encuentra en proceso no pueden haber otros el mismo estado. 

$sql12="UPDATE prensados2 SET estado = 'terminado' WHERE moldeId = '". $moldeId."'";

$result12=mysqli_query($conexion,$sql12);

//actualizo también el estado en la tabla asignaciones2

$sql13="UPDATE asignaciones2 SET estado = 'terminada' WHERE moldeId = '". $moldeId."'";

$result13=mysqli_query($conexion,$sql13);

//actualizo el estado del molde a "libre"

$sql14="UPDATE moldes2 SET estado = 'libre' WHERE idM = '". $moldeId."'";

$result14=mysqli_query($conexion,$sql14);
                	}
                	else{
                	    echo "molde terminado";
                	}
                	}
                    }
                	}
                	}
                	}
                	}
                	}
                	
                
		
	
                	
	}
	//función para ingresar un nuevo pedido a la base de datos.
	public function ingresar_datos_tabla_pedidos2($pedido,$cliente,$linea, $vendedor, $juegosTotales,$nota,$prioridad){
		$sql_15 = " INSERT INTO pedidos2 values (null, ?, ?,?,?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), (select DATE_SUB(NOW(),INTERVAL 5 HOUR)), 'enProceso',?) ";
		$stmt_15 = $this->conexion->conexion->prepare($sql_15);
		
		$stmt_15->bindValue(1, $pedido);
		$stmt_15->bindValue(2, $cliente);
		$stmt_15->bindValue(3, $linea);
		$stmt_15->bindValue(4, $vendedor);
		$stmt_15->bindValue(5, $juegosTotales);
		$stmt_15->bindValue(6, $nota);
		$stmt_15->bindValue(7, $prioridad);

		if($stmt_15->execute()){
		
			//echo "Ingreso Exitoso en tabla pedidos,";
			?>
			<html lang="en">
			    <body>
			        
			<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>-->
			<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/pedidoDetalles.php?pedido=<?php echo $pedido?>&Empacar=Enviar">
	
</body>
</html>


<?php
		}
		else{
			echo "no se pudo registrar datos en tabla pedidos2,";
		}
}

//herramienta para ingresar datos a la tabla de medición de temperatura

public function ingresar_datos_temperaturaPrensas($prensa, $temperaturas){

for($i=0;$i<=10;$i++){



$sql_T = " INSERT INTO `temperaturaPrensas` values (null, ?, ?, ?, ?, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_T = $this->conexion->conexion->prepare($sql_T);
		
		$stmt_T->bindValue(1, $prensa);
		$stmt_T->bindValue(2, $i+1);
		$stmt_T->bindValue(3, $temperaturas[$i][0]);
		$stmt_T->bindValue(4, $temperaturas[$i][1]);
		$stmt_T->bindValue(5, $temperaturas[$i][2]);
		$stmt_T->bindValue(6, $temperaturas[$i][3]);
		$stmt_T->bindValue(7, $temperaturas[$i][4]);
		
		//var_dump($temperaturas);

		if($stmt_T->execute()){
		
			echo "zona".($i+1)."->OK!-";
			?>
			


<?php
		}
		else{
			echo "no se pudo registrar datos en tabla pedidos2,";
		}
}
	?>
<html lang="en">
			    <body>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_temperaturaPrensas.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
</body>
</html>
<?php
}



	//función para ingresar un nuevo cliente a la base de datos.
	public function ingresar_datos_tabla_clientes2($nombreCliente,$nitCliente){
		$sql_16 = " INSERT INTO clientes2 values (null, ?, ?) ";
		$stmt_16 = $this->conexion->conexion->prepare($sql_16);
		
		$stmt_16->bindValue(1, $nombreCliente);
		$stmt_16->bindValue(2, $nitCliente);
		

		if($stmt_16->execute()){
		
			echo "Ingreso Exitoso en tabla clientes2,";
			?>
			<html lang="en">
			    <body>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_clientes.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
</body>
</html>


<?php
		}
		else{
			echo "no se pudo registrar datos en tabla clientes2,";
		}
}

//////////////////////////////////////////////////////////

public function ingresar_datos_tabla_materialPreparado($colorId,$loteId,$juegos,$estacion){
		$sql_311 = " INSERT INTO materialPreparado values (null, ?, ?, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_311 = $this->conexion->conexion->prepare($sql_311);

	
		$stmt_311->bindValue(1, $colorId);		
		$stmt_311->bindValue(2, $loteId);
		$stmt_311->bindValue(3, $juegos);
		$stmt_311->bindValue(4, $estacion);
		
		
	

		if($stmt_311->execute()){
		
			echo "ingreso exitoso!,1,2,3,rotuloOK,";
			
		}
		
		else{
			echo "no se pudo registrar datos en tabla materialPreparado,";
		}
}

///////////////////////////////////////////

	//función para ingresar un nuevo registro a pedidoDetalles.
	
	public function ingresar_datos_tabla_pedidoDetalles($pedido,$referencia, $color, $juegos,$cantidadColores){
	    //CONVIERTO A ENTERO LOS VALORES OBTENIDOS
	    
$pedido=intval($pedido);
$referencia=intval($referencia);
$color=intval($color);
$juegos=intval($juegos);
$cantidadColores=intval($cantidadColores);

		$sql_Detalles1 = " INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) values (NULL,?,?,?,NULL,?,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,(select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";
		$stmt_Detalles1 = $this->conexion->conexion->prepare($sql_Detalles1);
		
		$stmt_Detalles1->bindValue(1, $pedido);
		$stmt_Detalles1->bindValue(2, $referencia);
		$stmt_Detalles1->bindValue(3, $color);
		$stmt_Detalles1->bindValue(4, $juegos);
	
		

		if($stmt_Detalles1->execute()){
		    //echo "pedido= ".$pedido;
		    $sql_juegos = "UPDATE pedidos2 SET pedidos2.`juegosTotales`= (select sum(juegos) as totales FROM pedidoDetalles WHERE pedidoDetalles.`pedidoId` = '". $pedido. "') WHERE idP= '".$pedido."'";
			$stmt_juegos = $this->conexion->conexion->prepare($sql_juegos);
			
			if($stmt_juegos->execute()){
		   
			//echo "se ejecutó la consulta para actualizar juegos en pedidos2";
			
		}
		else {
		    echo "no se actualizaron los juegos en pedidos2";
		    //&cantidadColores=<?php echo $cantidadColores
		}
		
			//echo "Ingreso Exitoso en tabla pedidos,";
			?>
			<html lang="en">
			    <body>
			        
			<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>-->
			<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/pedidoDetalles.php?pedidoId=<?php echo $pedido?>&Empacar=Enviar">
	
</body>
</html>


<?php
		}
		else{
			echo "no se pudo registrar datos en tabla pedidoDetalles,";
			echo "datos recibidos";
			echo "pedido: ".$pedido;
			echo "referencia: ".$referencia;
			echo "color: ".$color;
			echo "juegos: ".$juegos; 
			
		}
}

////////////////////////////////////////////////////////////////////////

//función para ingresar un nuevo registro a pedidoDetalles MASIVA (varios colores con sus juegos para una referencia misma referencia.)
	
	public function ingresar_datos_tabla_pedidoDetallesMasivo($pedido,$referencia, $arregloColores, $juegosColor, $cantidadColores){
	    
	    for ($i=0; $i<$cantidadColores; $i++){
	        
	        if($juegosColor[$i]!=0){

		$sql_Detalles1 = " INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) values (NULL,?,?,?,NULL,?,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,(select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";
		$stmt_Detalles1 = $this->conexion->conexion->prepare($sql_Detalles1);
		
		$stmt_Detalles1->bindValue(1, $pedido);
		$stmt_Detalles1->bindValue(2, $referencia);
		$stmt_Detalles1->bindValue(3, $arregloColores[$i]);
		$stmt_Detalles1->bindValue(4, $juegosColor[$i]);
	
		

		if($stmt_Detalles1->execute()){
		    //echo "pedido= ".$pedido;
		    $sql_juegos = "UPDATE pedidos2 SET pedidos2.`juegosTotales`= (select sum(juegos) as totales FROM pedidoDetalles WHERE pedidoDetalles.`pedidoId` = '". $pedido. "') WHERE idP= '".$pedido."'";
			$stmt_juegos = $this->conexion->conexion->prepare($sql_juegos);
			
			if($stmt_juegos->execute()){
		   
			//echo "se ejecutó la consulta para actualizar juegos en pedidos2";
			
		}
		else {
		    echo "no se actualizaron los juegos en pedidos2";
		    //&cantidadColores=<?php echo $cantidadColores
		}
		
			//echo "Ingreso Exitoso en tabla pedidos,";
			
		}
		else{
			echo "variables recibidas";
echo "<br>";
//echo var_dump($arregloColores);
for ($i=0; $i<$cantidadColores; $i++){
echo "color" , $i,"=" .$arregloColores[$i];
echo" juegosColor = ". $juegosColor[$i]."\n";
echo "<br>";

}
echo "pedido= ". $pedido."\n";
echo "<br>";
echo "referencia= " . $referencia."\n";
echo "<br>";
echo "cantidad colres" . $cantidadColores."\n";

			
		}
}

?>

<html lang="en">
			    <body>
			        
			<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>-->
			<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/pedidoDetalles.php?pedidoId=<?php echo $pedido?>&Empacar=Enviar">
	
</body>
</html>
<?php
}
}

//////////////////////////////////////////////////////////

public function ingresar_datos_tabla_productoGranel($rotuloId,$gramos){
$pedidoId="";
$colorId="";
$juegosIngresan="";
$gramosJuego="";
$gramosGranel="";
$juegosGranel="";

    $rotuloId=intval($rotuloId);
    $gramos=intval($gramos);
    
		$sql_313 = " INSERT INTO productoGranel values (null, ?, ?, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmt_313 = $this->conexion->conexion->prepare($sql_313);

	
		$stmt_313->bindValue(1, $rotuloId);		
		$stmt_313->bindValue(2, $gramos);
		
		
		
	

		if($stmt_313->execute()){
		    
		    //consulto referencia y otros detalles del rotulo
		   
		   $sqlDatosVarios="SELECT rotulos2.*, referencias2.gramosJuego AS gramosJuego, productoGranel.gramos AS gramosGranel FROM rotulos2 INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id INNER JOIN productoGranel ON rotulos2.id=productoGranel.rotuloId WHERE rotulos2.id = '".$rotuloId. "'";
		   
            $sqlDatosVarios= $this->conexion->conexion->prepare($sqlDatosVarios);
            $sqlDatosVarios->execute();
		    $datos = $sqlDatosVarios->fetch();
		    
		    
		            $referenciaId = $datos['referenciaId']; 
                    $pedidoId = $datos['pedido']; 
                    $colorId = $datos['colorId']; 
                    $juegosIngresan = $datos['total'];
                    $gramosJuego = $datos['gramosJuego'];
                    $gramosGranel = $datos['gramosGranel'];
                    $juegosGranel = ($gramosGranel/$gramosJuego);
                    $juegosGranel=round($juegosGranel);
		    
$sqlYaSeparado="SELECT COUNT(id) as cuantos FROM pedidoDetalles WHERE rotuloId='".$rotuloId. "' and separado is not null;";
$sqlYaSeparado= $this->conexion->conexion->prepare($sqlYaSeparado);
            $sqlYaSeparado->execute();
		    $haySeparados = $sqlYaSeparado->fetch();
		    
		    
		            $separadosEsteRotulo = $haySeparados['cuantos']; 
		            $separadosEsteRotulo= intval($separadosEsteRotulo);
		            
if ($separadosEsteRotulo<1){


 $sql_Detalles1 = " INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) values (NULL,'".$pedidoId."','".$referenciaId."','".$colorId."','".$rotuloId."',NULL,NULL,NULL,NULL,NULL,NULL,'".$juegosGranel."', NULL,NULL,NULL,NULL,NULL,NULL,NULL,(select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";

            $sql_Detalles1= $this->conexion->conexion->prepare($sql_Detalles1);
            $sql_Detalles1->execute();
}
else{
    $sql_DetallesGranel = " INSERT INTO `pedidoDetalles` (`id`, `pedidoId`, `referenciaId`, `colorId`, `rotuloId`, `juegos`, `granel`, `programados`, `producidos`, `pulidos`, `enSeparacion`, `separado`, `enEmplaquetado`, `emplaquetados`, `revision1`, `revision2`, `empacados`, `calidad`, `colaborador`, `fechaCreacion`) values (NULL,'".$pedidoId."','".$referenciaId."','".$colorId."','".$rotuloId."',NULL,'".$juegosGranel."',NULL,NULL,NULL,NULL,NULL, NULL,NULL,NULL,NULL,NULL,NULL,NULL,(select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";

            $sql_DetallesGranel= $this->conexion->conexion->prepare($sql_DetallesGranel);
            $sql_DetallesGranel->execute();
}
	//echo $sql_Detalles1."/";	    
            
//echo $referenciaId."/";
//echo $pedidoId."/";
//echo $colorId."/";
//echo $juegosIngresan."/";
//echo $gramosJuego."/";
//echo $gramosGranel."/";
//echo $juegosGranel."/";
			echo "ingreso exitoso!,1,2 creo,3,rotuloOK,";
		
			
		}
		
		else{
			echo "no se pudo registrar datos en tabla productoGranel,";
		}
}


///////////////////////////////////////////

	//función para ingresar un nuevo registro rotulos solo con la referencia y el color para los productos a granel sin id.
	
	public function ingresar_datos_tabla_rotulos2_granel($referencia, $color, $gramos){

		$sql_RotulosGranel = " INSERT INTO `rotulos2` (`referenciaId`, `colorId`, `fechaCreacion`) values (?,?,(select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";
		$stmt_RotulosGranel = $this->conexion->conexion->prepare($sql_RotulosGranel);
		
		
		$stmt_RotulosGranel->bindValue(1, $referencia);
		$stmt_RotulosGranel->bindValue(2, $color);
		
	
		

		if($stmt_RotulosGranel->execute()){
		    
		
			echo "Ingreso Exitoso en tabla rotulos2,";
			
			//consulto el último id de rotulo creado
			
			$sqlUltimoRotulo="SELECT id FROM `rotulos2` ORDER BY id DESC LIMIT 1";
			
			$sqlUltimoRotulo = $this->conexion->conexion->prepare($sqlUltimoRotulo);
		    $sqlUltimoRotulo->execute();
		    $dgf = $sqlUltimoRotulo->fetch();
		    //echo $dgf["id"].",";
		    $ultimoRotulo=$dgf["id"];
			
			/*
			
			$resultUltimoRotulo=mysqli_query($conexion,$sqlUltimoRotulo);
			
			while($mostrarUltimoRotulo=mysqli_fetch_array($resultUltimoRotulo)){
			    
                $ultimoRotulo=$mostrarUltimoRotulo['id'];
            }
            */
            
            //$ultimoRotulo=mysql_result($resultUltimoRotulo,0);
            //var_dump($ultimoRotulo);
            
            echo "ultimo rotulo creado" . $ultimoRotulo;
            
    			$sqlGranel= "INSERT INTO productoGranel (rotuloId, gramos, fechaHora) values ('" . $ultimoRotulo. "', '" . $gramos ."' , (select DATE_SUB(NOW(),INTERVAL 5 HOUR)))";
    			$sqlGranel=$this->conexion->conexion->prepare($sqlGranel);
    			$sqlGranel->execute();
			?>
			<html lang="en">
			    <body>
			        
			<!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Registro</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>-->
			<meta http-equiv="refresh" content="0.3; url= https://trazabilidadmasterdent.online/control/formulario_rotulo_granel.php">
	
</body>
</html>


<?php
		}
		else{
			echo "no se pudo registrar datos en tabla rotulos2,";
			echo "datos recibidos";
		
			echo "referencia: ".$referencia;
			echo "color: ".$color;
			
			
		}
}

	///////////////////////////////////////////////////////////////////
	
	//SE MODIFICA EL NOW() POR EL (select DATE_SUB(NOW(),INTERVAL 5 HOUR)) PARA ACOMODAR A HORA LOCAL.
	public function ingresar_datos_seguimientoEmplaquetado($emplaquetador, $linea, $tipo,$juegos, $puntos){
		$sqlEmplaquetado = "insert into seguimientoEmplaquetado values (null, ?, ?, ?, ?, ?, NULL, (select DATE_SUB(NOW(),INTERVAL 5 HOUR))) ";
		$stmtEmplaquetado = $this->conexion->conexion->prepare($sqlEmplaquetado);
		

		$stmtEmplaquetado->bindValue(1, $emplaquetador);
		$stmtEmplaquetado->bindValue(2, $linea);
		$stmtEmplaquetado->bindValue(3, $tipo);
		$stmtEmplaquetado->bindValue(4, $juegos);
		$stmtEmplaquetado->bindValue(5, $puntos);

		if($stmtEmplaquetado->execute()){
		    
			echo "¡Registro exitoso!";
	?>		
		<html lang="en">
			    <head>
			    <meta http-equiv="refresh" content="0.2; url= https://trazabilidadmasterdent.online/control/formularioEmplaquetado3.php">
			    </head>		
 
<?php
		}else{
			echo "no se pudo registrar datos,";
			echo "se ha intentado ingresar los siguientes  datos sin éxito:" ;
			echo $emplaquetador ."/";
echo $linea ."/";
echo $tipo ."/";
echo $cajas ."/" ;
echo $juegos ."/" ;
		}
		
		
	}



}

?>
 
	