<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col">
      <!--Aqui esta la primera columna-->
    </div>
    <div class="col">
        <br><br>
         <h1>CAMBIO DE CLAVE</h1>
       <br><br>
    <form action="cambio_clave.php" method="POST">
  <div class="mb-3">
      <input type="text" name="id" value="<?php $id=$_GET['a26031997'];echo $id;?>"hidden>
      
    <label for="exampleInputPassword1" class="form-label">Nueva Contraseña</label>
     <div style="display:flex">
    <input type="password" class="form-control" name="contraseña" id="login_ver">
     &nbsp;&nbsp;&nbsp;<a onclick="mostrar_clave();"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
</svg></a>
</div>

    

  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirmar</label>
     <div style="display:flex">
    <input type="password" class="form-control" name="connfirmar" id="confirmo_clave">
     &nbsp;&nbsp;&nbsp;<a onclick="confirmo_dato();"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
</svg></a>
</div>
  </div>
  
  <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
</form>

    </div>
    <div class="col">
      <!--Aqui esta la tercera columna-->
    </div>
  </div>
</div>

  <script type="text/javascript" >

function   mostrar_clave(){ 
  var cambiardatos=document.getElementById("login_ver");

  if (cambiardatos.type=="password") {
    cambiardatos.type="text";
  }
  else {
    cambiardatos.type="password";
  }
 
} 
  </script>
  
  
  
  <script type="text/javascript" >

function   confirmo_dato(){ 
  var cambiardatos=document.getElementById("confirmo_clave");

  if (cambiardatos.type=="password") {
    cambiardatos.type="text";
  }
  else {
    cambiardatos.type="password";
  }
 
} 
  </script>
</body>
</html>