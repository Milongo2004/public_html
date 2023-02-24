<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$idL=$_GET['id'];

 $fecha=$_GET ["fecha"];
        //echo $fecha;
        $turno=$_GET ["turno"];
        //echo $turno;
        $prensada=$_GET ["prensada"];
        //echo $prensada;
        
        //limito el tamaño de los datos

$fecha = substr($fecha, int -12);
$turno = substr($turno, int -10);
$prensada = substr($prensada, int -2);
        
        //elimino los espacios en blanco del string turno.
        
        $turno=trim($turno," ");


$query=mysqli_query($conexion,"SELECT * FROM rotulos2 WHERE id='$idL'" );
$result=mysqli_num_rows($query);
if($result>0) { while ($data =mysqli_fetch_assoc($query))
{


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDITAR ROTULOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row"> 

        <h1 style="text-align:center">Editar</h1>
        </div>
        <div class="row">
        <div class="mb-3">
 <form action="val_Editar_Rotulos.php"  method="POST">


 <label for="exampleFormControlInput1" class="form-label" hidden >id </label>
  <input type="text" value="<?php echo $data['id'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el id"   name="id" hidden >

  <label for="exampleFormControlInput1" class="form-label">Codigo Rotulo</label>
  <input type="text" value="<?php echo $data['cod_rotulo'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el codigo"   name="codigoRotulo"  >


  <label for="exampleFormControlInput1" class="form-label">fecha</label>
  <input type="date" value="<?php echo $data['fecha'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba la Fecha"   name="fecha"  >
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>prensada</label>
  <input type="text" value="<?php echo $data['prensada'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el nombre de la Prensada"  name="prensada">
</div>
<div>
<label for="exampleFormControlInput1" class="form-label">cantidad de Moldes</label>
  <input type="number" value="<?php echo $data['cantidadMoldes'];  ?>" class="form-control" autofocus id="exampleFormControlInput1" placeholder="ingrese la  cantidad de moldes"   name="cantMoldes"  >

</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>pedido</label>
<select id="pedido" name="pedido" class="form-control"  onclick="//prueba();">
  <?php  
$pedsel=$data['pedido'];
  $seleccionar=mysqli_query($conexion,"SELECT * FROM pedidos2 WHERE idP=$pedsel" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['idP'];  ?>"   selected ><?php echo $datos['codigoP'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM pedidos2 " );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['idP'];  ?>"><?php echo $datos['codigoP'];}} ?></option>
</select>
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>referencia</label>
<select id="referencia" name="referencia" class="form-control"  onclick="//prueba();">
  <?php  
  $refsel=$data['referenciaId'];
  $seleccionar=mysqli_query($conexion,"SELECT * FROM referencias2 WHERE id=$refsel" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM referencias2" );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>

</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>color</label>
<select id="color" name="color" class="form-control"  onclick="//prueba();">
  <?php  
  $selcol=$data['colorId'];
  $seleccionar=mysqli_query($conexion,"SELECT * FROM colores2 WHERE id=$selcol" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM colores2 " );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>lote</label>
<select id="lote" name="lote" class="form-control"  onclick="//prueba();">
  <?php 
  $sello=$data['loteId'];
  $seleccionar=mysqli_query($conexion,"SELECT * FROM lotes2 WHERE id=$sello" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombreL'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM lotes2 " );;
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombreL'];}} ?></option>
</select>
</div>

<!--<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>Moldes</label>
  <input type="text" value="<?php //echo $data['cantidadMoldes'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de Moldes"  name="Moldes">
</div>-->

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>casillaId</label>
<select id="casillaId" name="casillaId" class="form-control"  onclick="//prueba();">
  <?php  
  $selca=$data['casillaId'];
  $seleccionar=mysqli_query($conexion,"SELECT * FROM casillas2 WHERE id=$selca" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM casillas2 " );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>juegos</label>
  <input type="text" value="<?php echo $data['juegos'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el dato de juegos"  name="juegos">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>estacionActual</label>
<select id="estacionActual" name="estacionActual" class="form-control"  onclick="//prueba();">
  <?php 
  $selest=$data['estacionId2']; 
  $seleccionar=mysqli_query($conexion,"SELECT * FROM estaciones2 WHERE id=$selest" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM estaciones2 " );
mysqli_close($conexion);
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>
</div>

<div>
<label for="exampleFormControlInput1" class="form-label">Turno</label>
  <input type="text" value="<?php echo $data['turno'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el turno"   name="turno"  >

</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta1</label>
  <input type="text" value="<?php echo $data['vuelta1'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta1">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta2</label>
  <input type="text" value="<?php echo $data['vuelta2'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta2">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta3</label>
  <input type="text" value="<?php echo $data['vuelta3'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta3">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta4</label>
  <input type="text" value="<?php echo $data['vuelta4'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta4">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta5</label>
  <input type="text" value="<?php echo $data['vuelta5'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta5">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta6</label>
  <input type="text" value="<?php echo $data['vuelta6'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta6">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta7</label>
  <input type="text" value="<?php echo $data['vuelta7'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta7">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>vuelta8</label>
  <input type="text" value="<?php echo $data['vuelta8'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de vuelta"  name="vuelta8">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>total</label>
  <input type="number" value="<?php echo $data['total'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el total"  name="total">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>fechaCreacion</label>
  <input type="date-time" value="<?php echo $data['fechaCreacion'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite la fecha de creacion"   name ="fechaCreacion"readonly>
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>fechaActualizacion</label>
  <input type="date-time" value="<?php echo $data['fechaActualizacion'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite la fecha de actualizacion"   name ="fechaActualizacion">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>Nota</label>
  <input type="date-time" value="<?php echo $data['nota'];  ?>" class="form-control"  id="exampleFormControlInput1" placeholder="Actualice la nota"   name ="nota">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>estado</label>
  <input type="text" value="<?php echo $data['estado']; }} ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite el estado"   name ="estado">
</div>





<div class="col-12">
    <button class="btn btn-primary" type="submit">GUARDAR CAMBIOS</button>
  </div>

  </form>
  
  <br></br>
   <br></br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

