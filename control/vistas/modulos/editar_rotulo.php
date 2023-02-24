<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

$idL=$_GET['id'];
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
  <input type="number" value="<?php echo $data['cantidadMoldes'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="ingrese la  cantidad de moldes"   name="cantMoldes"  >

</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>pedido</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM pedidos2 ORDER BY idP ASC" );
$result=mysqli_num_rows($seleccionar);



 ?>


<select id="pedido" name="pedido" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['idP'];  ?>" ><?php echo $datos['codigoP'];}  ?></option>
</select>
<?php   } ?> 
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>referencia</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM referencias2 ORDER BY id ASC" );
$result=mysqli_num_rows($seleccionar);



 ?>


<select id="referencia" name="referencia" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>" ><?php echo $datos['nombre'];}  ?></option>
</select>
<?php   } ?> 

</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>color</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM colores2 ORDER BY id ASC" );
$result=mysqli_num_rows($seleccionar);



 ?>


<select id="color" name="color" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>" ><?php echo $datos['nombre'];}  ?></option>
</select>
<?php   } ?> 
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>lote</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM lotes2 ORDER BY id ASC" );

$result=mysqli_num_rows($seleccionar);



 ?>


<select id="lote" name="lote" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>" ><?php echo $datos['nombreL'];}  ?></option>
</select>
<?php   } ?> 
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>Moldes</label>
  <input type="text" value="<?php echo $data['cantidadMoldes'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el numero de Moldes"  name="Moldes">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>casillaId</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM casillas2 ORDER BY id ASC" );
$result=mysqli_num_rows($seleccionar);



 ?>


<select id="casillaId" name="casillaId" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>" ><?php echo $datos['nombre'];}  ?></option>
</select>
<?php   } ?> 
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>juegos</label>
  <input type="text" value="<?php echo $data['juegos'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el dato de juegos"  name="juegos">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"></label>estacionActual</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM estaciones2 ORDER BY id ASC" );
mysqli_close($conexion);
$result=mysqli_num_rows($seleccionar);



 ?>


<select id="estacionActual" name="estacionActual" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>" ><?php echo $datos['nombre'];}  ?></option>
</select>
<?php   } ?> 
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
<label for="exampleFormControlInput1" class="form-label"></label>estado</label>
  <input type="text" value="<?php echo $data['estado']; }} ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite el estado"   name ="estado">
</div>

<div class="col-12">
    <button class="btn btn-primary" type="submit">GUARDAR CAMBIOS</button>
  </div>

  </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <br></br>
      <br></br>
  </body>
</html>
