<?php
  
  if(!isset ($_SESSION['Cedula']) or !isset($_SESSION['Contrasena'])){ 
    $cedula=1993;
  $contrasena=2050;
    echo "<script>
    alert('Zona  no autorizada,por favor inicia la seccion');
    window.location='../index.php';
  
  
    
  </script>";
  
   
  }
  
  else{
    
    
    $cedula=$_SESSION['Cedula'];
    $contrasena=$_SESSION['Contrasena']; 
   $rol=$_SESSION['Rol'];
  
  $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  
  }
  
  if($rol==1 OR $rol==3 ){
    
  
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
  <style>

  </style>
</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_pedidos.php'">Nuevo Pedido</button>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_lotes.php'">Nuevo Lote</button>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_clientes.php'">Nuevo Cliente</button>

<h1></h1>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaPedidos.php'">Ver Pedidos</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/formulario_seleccionPedido.php?destino=detalles&Crear=Enviar'">Consultar/Editar Pedidos</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaLotes.php'">Ver Lotes</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaGranel.php'">Producto a Granel</button>
    
    
    


<h1>Búsqueda de Producción</h1>

<button onclick="location.href='https://trazabilidadmasterdent.online/control/referenciaColor.php'">Buscar por referencia y color</button>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/rotuloEstacion.php'">Buscar por Codigo(Id)</button>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/rotuloPedido.php'">Buscar por pedido</button>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/rotuloLote.php'">Buscar por lote </button>
<br></br>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/filtros_Rotulos/filtrados.php'">Filtros de búsqueda Avanzados</button>

</body>
</html>


<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>