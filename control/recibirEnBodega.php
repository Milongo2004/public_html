
<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    $sqlBodega=$_POST ["query"];
    $pedido=$_POST['pedido'] ;
    $resultBodega=mysqli_query($conexion,$sqlBodega); 
    
    
    //echo $sqlBodega;
    ?>
    <html lang="en">
			    <head>
			    <meta http-equiv="refresh" content="0.2; url= https://trazabilidadmasterdent.online/control/inventario.php?pedido=<?php echo $pedido?>">
			    </head>