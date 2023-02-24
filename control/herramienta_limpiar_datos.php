<?php

 class HerramientaLimpiar{
	private $conexion;


	function __construct(){
		require_once("conexion_privada.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
		
	}

	public function limpiar_toda_la_tabla(){
		$sql = "TRUNCATE TABLE listaEmpaque";
		$stmt = $this->conexion->conexion->prepare($sql);
		

		if($stmt->execute()){
		    
			echo "Datos borrados exitosamente,";
		?>
			<html lang="en">
			    <body>
			
			<button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaListaEmpaque2.php'">Listas General</button>
			<button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
</body>
</html>
<?php

		}else{
			echo "no fue posible borrar datos";
		}
		
	}

}
?>
 
	