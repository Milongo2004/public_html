
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTA TU FALLA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>


</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-2">
        <br>
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-broadcast-pin" viewBox="0 0 16 16">
  <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM6 8a2 2 0 1 1 2.5 1.937V15.5a.5.5 0 0 1-1 0V9.937A2 2 0 0 1 6 8z"/>
</svg>

    </div>
    <div class="col-8">
        <br>
    <h2 style="text-align:center;font-family:'Verdana';"><b>REPORTA LA FALLA O EL DAÑO</b></h2> 
&nbsp;
<form action="val_fallos.php"method="GET">
  <div class="mb-3">
  <label for="nombre">Nombre de la Maquina</label><br>
<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la maquina"/>
<br><br>
<label for="fecha">¿Cuando inicio el daño?</label><br>
<input  type="date" class="form-control" id="fecha" name="fecha" placeholder="Indica la fecha en que incio el problema"/>
<br><br>
<label for="problema"></label>
<textarea name="problema" class="form-control" id="problema" placeholder="Ingresa aqui el problema." cols="60" rows=5"></textarea>
<br>
<input type="submit"/>
    </div>
    <div class="col">
        <!-- Aqui puedes poner mas codigo :) -->
    </div>
  </div>
</div>

</form>
</body>
</html>


