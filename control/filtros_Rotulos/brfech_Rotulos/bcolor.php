<?php

if($_GET['desde']>$_GET['hasta']){
  header("location: ../selfildef.php?Seleccionado=1&err=93jd");
  
}

$desde=$_GET['desde'];
$hasta=$_GET['hasta'];
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
    <div class="col-5"style=""display: flex; width:400px;heigth: 200px;margin-right:auto;margin-left:auto;">

     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </svg>&nbsp;&nbsp;&nbsp;&nbsp;
  <h4>BUSQUEDA ENTRE EL RANGO DE FECHA <?php echo $desde.'  '.$hasta ?></h4>
      </div>



  <div >


      <br><br>
    <form action="consultarcolor.php"method="GET">
        <div class="mb-3">
 <label for="color" class="form-label">COLOR</label>
 <input type="text" class="form-control" id="color" name="color" placeholder="Ingresa el  Color">
 <input type="date" name="desde" value="<?php $desde=$_GET['desde']; echo $desde ?>"  hidden>
<input type="date" name="hasta" value="<?php $hasta=$_GET['hasta']; echo $hasta ?>" hidden>




        </div>

        <input type="submit" value="Enviar">
        &nbsp;&nbsp;&nbsp;
                <a  href="filtrados.php">REGRESAR</a>

      </div>
  </body>
</html>

<?php
?>