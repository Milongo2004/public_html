<?php

$mes = "mes";
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
?>


<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>


<br><br><br><br>
 
 <html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<br>
<button type="button"  style="margin-left:80%;"><a  href="../progProduccion/progProduccion1.php">REGRESAR</a></button>
<br>

<div class="forma"  style="width:600px; margin-left:400px;border-style:solid;border-width:1px;border-color:black;">
  <br><br>
  <div class="container">
    <div class="row align-items-start">
      <div class="col-5"style="display:flex;width: 400px;heigth:200px;margin-right:auto;margin-left:auto;">

     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </svg>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
    <h4>BUSQUEDA INVIMA</h4> &nbsp;&nbsp;&nbsp;&nbsp;
      </div>

  <form action="consultar_mes.php"method="GET">
  <select name="Selecciono_ano"class="form-select" aria-label="Default select example">
  <option value="22">2022</option>
  <option value="23">2023</option>
  <option value="24">2024</option>
  <option value="25">2025</option>
  <option value="26">2026</option>
  <option value="27">2027</option>
  <option value="28">2028</option>
  <option value="29">2029</option>
  <option value="30">2030</option>
  <option value="31">2031</option>
  <option value="32">2032</option>
  <option value="33">2033</option>
  
</select> <br>

    <select name="Seleccionado"class="form-select" aria-label="Default select example">
         <option value="">Seleccione el Mes</option>
  <option value="01">Enero</option>
  <option value="02">Febrero</option>
  <option value="03">Marzo</option>
  <option value="04">Abril</option>
  <option value="05">Mayo</option>
  <option value="06">Junio</option>
  <option value="07">Julio</option>
  <option value="08">Agosto</option>
  <option value="09">Septiembre</option>
  <option value="10">Octubre</option>
  <option value="11">Noviembre</option>
  <option value="12">Diciembre</option>

</select> <br>


<input type="submit"value='Enviar'>


</form>
    </div>
    
</body>
</html>

<?php
?>