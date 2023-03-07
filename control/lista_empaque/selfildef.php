<?php
    if(isset($_GET['Seleccionado'])){
      $Seleccionado=$_GET['Seleccionado'];
    if($Seleccionado==2){
      

    ?>
    <br><br><br><br><br><br><br><br>
    <button type="button"  style="margin-left:80%;"><a href="filtrados.php">REGRESAR</a></button>
      <div style="border-style:solid;border-color:orangered;border-width:1px;padding:15px;width:40%;height:15%;margin:auto;">
      <div class="mb-3" >
      <form action="valcheckbox.php" method="POST"> 
      <label for="fecha" class="form-label"> Seleccione una Fecha</label>
 <input type="Date" class="form-control" id="fecha" name="fecha" placeholder="Ingresa la fecha"  required>




<br><br>

  <div  style="display: flex; ">
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="10" id="flexCheckDefault"  name="color"  >
  <label class="form-check-label" for="flexCheckDefault">
    COLOR
  </label>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-check">
<input class="form-check-input" type="checkbox" value="20" id="flexCheckDefault"  name="referencia" >
<label class="form-check-label" for="flexCheckDefault">
  REFERENCIA
</label>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-check">
<input class="form-check-input" type="checkbox" value="30" id="flexCheckDefault" name="lote" >
<label class="form-check-label" for="flexCheckDefault">
  LOTE
</label>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-check">
<input class="form-check-input" type="checkbox" value="40" id="flexCheckDefault"   name="pedido">
<label class="form-check-label" for="flexCheckDefault">
  PEDIDO
</label>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
}
?>
</div>
</div>
<?php
if($Seleccionado==1){

?>
<br><br><br><br><br><br><br><br>
<?php 
if(isset($_GET['err'])){

  
  echo "<h1  style='color:red;text-align:center;'> LA  FECHA  DESDE DEBE SER MENOR QUE LA DE HASTA, POR  FAVOR INTENTA  NUEVAMENTE</h1>";
  
}
?>
<br>
<button type="button"  style="margin-left:80%;"><a href="filtrados.php">REGRESAR</a></button>
  <div class="mb-3" style="border-style:solid;border-color:orangered;border-width:1px;padding:15px;width:40%;height:20%;margin:auto;">
<h4> SELECIONA  UN RANGO DE FECHAS</h4>
  <form action="b_rfech/valcheckbox.php" method="POST"> 
  <label for="fecha" class="form-label">DESDE</label>
<input type="Date" class="form-control" id="desde" name="desde"  required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="fecha" class="form-label">HASTA</label>
<input type="Date" class="form-control" id="hasta" name="hasta"  required>



<br><br>

<div  style="display: flex; ">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="10" id="flexCheckDefault"  name="color"  >
<label class="form-check-label" for="flexCheckDefault">
COLOR
</label>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-check">
<input class="form-check-input" type="checkbox" value="20" id="flexCheckDefault"  name="referencia" >
<label class="form-check-label" for="flexCheckDefault">
REFERENCIA
</label>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-check">
<input class="form-check-input" type="checkbox" value="30" id="flexCheckDefault" name="lote" >
<label class="form-check-label" for="flexCheckDefault">
LOTE
</label>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="form-check">
<input class="form-check-input" type="checkbox" value="40" id="flexCheckDefault"   name="pedido">
<label class="form-check-label" for="flexCheckDefault">
PEDIDO
</label>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<button type="submit" class="btn btn-primary">Enviar</button>

</form>

<?php
}
?>
</div>
<?php
    }
?>