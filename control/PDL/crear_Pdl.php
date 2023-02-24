<?php 
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
//funcion  para  guardar datos de  selecion inventario para el muchacho del almacen 

if(isset($_POST['codigo'])AND ($_POST['unidades'])AND ($_POST['fecha'])){
    
    $codigo=$_POST['codigo'];
    $cantidad=$_POST['unidades'];
    $fecha=$_POST['fecha'];
    
    //echo "codigo antes del recortado " .$codigo;

//elimino los espacios en blanco del string codigo.
$codigo=strval($codigo);
$codigo=trim($codigo," ");
//echo "codigo despues del recortado " .$codigo;
    
//$query=mysqli_query($conexion,"SELECT * FROM producto_lab WHERE Referencia_codigo LIKE '%$codigo%'");
$query=mysqli_query($conexion,"SELECT * FROM producto_lab WHERE Referencia_codigo = $codigo");
$resultado = mysqli_num_rows($query);

if ($resultado > 0) {
    while($mostrar2=mysqli_fetch_array($query)){
        $id=$mostrar2['id'];
    }
    
    
    
    $query_insert = mysqli_query($conexion , "INSERT INTO inventario_lab(fecha,ProductoId,cantidad) VALUES ('$fecha','$id','$cantidad')"); 

    if ($query_insert > 0) {
        
        
        echo "<script>;
        window.location='../inventario_laboratorio/seleccion_inventario.php';
        
        </script>";
    }
    
    
    else{
        echo "<script>;
        window.location='../inventario_laboratorio/seleccion_inventario.php';
        
        </script>";
    
    }
    
} 
  else { 
    $msgerror=1997;
    echo "<script>;
    window.location='../inventario_laboratorio/seleccion_inventario.php?msgerror=<?php echo $msgerror?>';
    
    </script>";
        }
    }



?>
