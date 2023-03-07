<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
$id= $_GET['id'];
$fecha=$_GET['fecha'];
    


$query = mysqli_query($conexion, "SELECT * FROM  rotulos2  where id = '$id'AND Fecha LIKE '%$fecha%'");
$resultado = mysqli_num_rows($query);
if ($resultado > 0) {
  while  ($data = mysqli_fetch_assoc($query)) {

?>


<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>


<br><br><br><br>


<div class="forma"  style="width:600px; margin-left:400px;border-style:solid;border-width:1px;border-color:black;">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-5"style=""display: flex; style=width:400px; heigth:200px;margin-right:auto;margin-left:auto;">

     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </svg>&nbsp;&nbsp;&nbsp;&nbsp;
     <h4>BUSQUEDA DE LA FECHA <?php echo $fecha?></h4>
      </div>



  <div >


      <br><br>



        <div class="mb-3">

          <form  action="bacedit4.php"  method="POST" >
            <label for="color" class="form-label" hidden>ID</label>
            <input type="text" class="form-control"  value="<?php   echo$data['id'];?>" id="id" name="id"  hidden>

 <label for="color" class="form-label">COD_ROTULO</label>
 <input type="text" class="form-control"  value="<?php   echo$data['cod_rotulo'];?>" id="cod_rotulo" name="cod_rotulo"  required>
 <label for=referencia class="form-label">FECHA</label>
 <input type="date" class="form-control" value="<?php   echo$data['fecha']; ?>"  id="fecha" name="fecha"  required>
 <label for=referencia class="form-label">PRENSADA</label>
 <input type="text" class="form-control" value="<?php   echo$data['prensada']; ?>"  id="prensada" name="prensada"  required>
 <label for=referencia class="form-label">REFERENCIA_ID</label>

 <select id="referencia" name="referencia" class="form-control"  onclick="//prueba();">
  <?php 
  $selref=$data['referenciaId'];
  $seleccionar=mysqli_query($conexion,"SELECT * FROM referencias2 WHERE id=$selref" );
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
 <label for="color" class="form-label">LOTE</label>
 <select id="lote" name="lote" class="form-control"  onclick="//prueba();">
  <?php 
  $sellot=$data['loteId']; 
  $seleccionar=mysqli_query($conexion,"SELECT * FROM lotes2 WHERE id=$selest" );
  $result=mysqli_num_rows($seleccionar);     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombreL'];} } ?></option>
<?php
  $seleccionar=mysqli_query($conexion,"SELECT * FROM lotes2 " );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
  {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombreL'];}} ?></option>
</select>

<label for=referencia class="form-label">REFERENCIA_ID</label>

<select id="referencia" name="referencia" class="form-control"  onclick="//prueba();">
 <?php 
 $selref=$data['referenciaId'];
 $seleccionar=mysqli_query($conexion,"SELECT * FROM referencias2 WHERE id=$selref" );
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
<label for="color" class="form-label">COLOR</label>
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

<label for=referencia class="form-label">PEDIDO</label>

<select id="pedido" name="pedido" class="form-control"  onclick="//prueba();">
 <?php 
 $selped=$data['pedido'];
 $seleccionar=mysqli_query($conexion,"SELECT * FROM pedidos2 WHERE idP=$selped" );
 $result=mysqli_num_rows($seleccionar); 
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
 <option value="<?php echo $datos['idP'];  ?>"   selected ><?php echo $datos['codigoP'];} } ?></option>
<?php
 $seleccionar=mysqli_query($conexion,"SELECT * FROM  pedidos2" );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
 {
?>
<option value="<?php echo $datos['idP'];  ?>"><?php echo $datos['codigoP'];}} ?></option>
</select>


 <label for="color" class="form-label">CANTIDAD DE MOLDES</label>
 <input type="text" class="form-control"  value="<?php   echo$data['cantidadMoldes']; ?>"    id="moldes" name="moldes"  required>

 <label for=referencia class="form-label">CASILLA ID</label>

<select id="casilla" name="casilla" class="form-control"  onclick="//prueba();">
 <?php 
 $selca=$data['casillaId'];
 $seleccionar=mysqli_query($conexion,"SELECT * FROM casillas2 WHERE id=$selcaf" );
 $result=mysqli_num_rows($seleccionar); 
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
 <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
 $seleccionar=mysqli_query($conexion,"SELECT * FROM casillas2" );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
 {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>


        <label for="color" class="form-label">TURNO</label>
 <input type="text" class="form-control"  value="<?php   echo$data['turno']; ?>"    id="turno" name="turno"  required>

 <label for="color" class="form-label">JUEGOS</label>
 <input type="text" class="form-control"  value="<?php   echo$data['juegos'];?>"    id="juegos" name="juegos"  required>

 <label for=referencia class="form-label">ESTACION</label>

<select id="estacion" name="estacion" class="form-control"  onclick="//prueba();">
 <?php 
 $selest=$data['estacionId2'];
 $seleccionar=mysqli_query($conexion,"SELECT * FROM estaciones2 WHERE id=$selest" );
 $result=mysqli_num_rows($seleccionar); 
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
 <option value="<?php echo $datos['id'];  ?>"   selected ><?php echo $datos['nombre'];} } ?></option>
<?php
 $seleccionar=mysqli_query($conexion,"SELECT * FROM estaciones2" );
$result=mysqli_num_rows($seleccionar);
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
 {
?>
<option value="<?php echo $datos['id'];  ?>"><?php echo $datos['nombre'];}} ?></option>
</select>
<label for="color" class="form-label">VUELTA 1</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta1']; ?>"    id="vuelta1" name="vuelta1"  required>

 <label for="color" class="form-label">VUELTA 2</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta2']; ?>"    id="vuelta2" name="vuelta2"  required>
 <label for="color" class="form-label">VUELTA 3</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta3']; ?>"    id="vuelta3" name="vuelta3"  required>
 <label for="color" class="form-label">VUELTA  4</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta4']; ?>"    id="vuelta4" name="vuelta4"  required>
 <label for="color" class="form-label">VUELTA 5</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta5']; ?>"    id="vuelta5" name="vuelta5"  required>
 <label for="color" class="form-label">VUELTA 6</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta6'];?>"    id="vuelta6" name="vuelta6"  required>
 <label for="color" class="form-label">VUELTA 7</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta7'];?>"    id="vuelta7" name="vuelta7"  required>
 <label for="color" class="form-label">VUELTA 8</label>
 <input type="text" class="form-control"  value="<?php   echo$data['vuelta8']; ?>"    id="vuelta8" name="vuelta8"  required>
 <label for="color" class="form-label">TOTAL</label>
 <input type="text" class="form-control"  value="<?php   echo$data['total']; ?>"    id="total" name="total"  required>
 <label for="color" class="form-label">FECHA  CREACION</label>
 <input type="date-time" class="form-control"  value="<?php   echo$data['fechaCreacion'];?>"    id="fechacreacion" name="fechacreacion"  required>
 <label for="color" class="form-label">FECHA  ACTUALIZACION</label>
 <input type="text" class="form-control"  value="<?php   echo$data['fechaActualizacion']; ?>"    id="fechactualizacion" name="fechactualizacion"  required>
 <label for="color" class="form-label">ESTADO</label>
 <input type="text" class="form-control"  value="<?php   echo$data['estado']; ?>"  id="estado" name="estado"  required> <?php  }} ?>
 
<br>

 <input type="submit" value="GUARDAR CAMBIOS">

&nbsp;&nbsp;&nbsp;
        <a  href="filtrados.php">REGRESAR</a>

      </div>


  </body>
</html>

<?php

?>
