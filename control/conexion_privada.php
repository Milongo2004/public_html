<?php
$dataBase="(\"localhost\",\"u638142989_master2022\",\"Master2022*\",\"u638142989_MasterdentDB\")";
class conexion
{
	private $servidor;
	private $usuario;
	private $contrasena;
	private $basedatos;
	public  $conexion;

	public function __construct(){
		$this->servidor   = "localhost";
		$this->usuario	  = "u638142989_master2022";
		$this->contrasena = "Master2022*";
		$this->basedatos  = "u638142989_MasterdentDB";
	}

	function conectar(){
		$this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->basedatos","$this->usuario","$this->contrasena");
	}

	function cerrar(){
		$this->conexion->close();
	}
}
?>
