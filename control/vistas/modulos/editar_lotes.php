<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


$id=$_GET['id'];
$query=mysqli_query($conexion,"SELECT * FROM lotes2 WHERE id='$id'" );
$result=mysqli_num_rows($query);
if($result>0) { while ($data =mysqli_fetch_assoc($query))
{


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDITAR LOTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row"> 

        <h1 style="text-align:center">Editar</h1>
        </div>
        <div class="row">
        <div class="mb-3">
 <form action="val_Editar_Lotes.php"  method="POST">


 <label for="exampleFormControlInput1" class="form-label" hidden >id </label>
  <input type="text" value="<?php echo $data['id'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el id"   name="id" hidden >



  <label for="exampleFormControlInput1" class="form-label">nombreL</label>
  <input type="text" value="<?php echo $data['nombreL'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el Nombre"   name="nombreL"  >
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">fechaCreacion</label>
  <input type="date-time" value="<?php echo $data['fechaCreacion'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite la fecha de creacion"   name ="fechaCreacion">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">fechaActualizacion</label>
  <input type="date-time" value="<?php echo $data['fechaActualizacion'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite la fecha de actualizacion"   name ="fechaActualizacion">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">estado</label>
  <input type="text" value="<?php  $sel= $data['colorId2']; echo $data['estado'];}}?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite el estado"   name ="estado">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">colorId2</label>
<select id="colorId2" name="colorId2" class="form-control"  onclick="//prueba();">
  <?php  
  $seleccionar=mysqli_query($conexion,"SELECT * FROM colores2 WHERE id=$sel" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM colores2 " );
mysqli_close($conexion);
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>
<?php  ?> 
</div>




<div class="col-12">
    <button class="btn btn-primary" type="submit">Editar</button>
  </div>

  </form>
<script  type="text/javascript">
function prueba(){
  var Myelement = document.getElementById("colorId2");
console.log(Myelement.value);
Myelement.value =document.write("prueba");
console.log(Myelement.value);
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    
    
  </body>
  
</html>
