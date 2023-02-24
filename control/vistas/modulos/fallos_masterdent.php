
<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

?>

<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>


<br><br>
 
 <html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<div class="forma"  style="width:600px; margin-left:400px;border-style:solid;border-width:1px;border-color:black;">
  <br><br>
  <div class="container">
    <div class="row align-items-start">
      <div class="col-5"style="display:flex;width: 400px;heigth:200px;margin-right:auto;margin-left:auto;">

  <br>
    <h4>FALLOS MASTERDENT</h4> &nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <br>

  <form action="https://trazabilidadmasterdent.online/control/vistas/solicitud_fallo.php"method="GET">
  
    <select name="Seleccionado"class="form-select" aria-label="Default select example">
         <option value="">Seleccione la Estación</option>
  <option value="1">Moldeado</option>
  <option value="2">Acabado</option>
  <option value="3">Separado</option>
  <option value="4">Emplaquetado Interno</option>
  <option value="5">Emplaquetado Interno</option>
  <option value="6">Revisión</option>
  <option value="7">Almacén</option>
  
</select> <br>
<input type="submit"value='Enviar'>
</form>
    </div>
    
</body>
</html>

<?php
?>
