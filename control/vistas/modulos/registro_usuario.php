<?php
if(!isset ($_SESSION['Cedula']) or !isset($_SESSION['Contrasena'])){ 
  $cedula=1993;
$contrasena=2050;
  echo "<script>
  alert('Zona  no autorizada,por favor inicia la seccion');
  window.location='../index.php';


  
</script>";

 
}

else{
  
  
  $cedula=$_SESSION['Cedula'];
  $contrasena=$_SESSION['Contrasena']; 
 $rol=$_SESSION['Rol'];

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

}

if($rol==3 ){
  
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO USUARIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
  <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
  <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
</svg>
    </div>
<div class="col-6">
<h5 style="text-align:center;font-family:'Verdana';"><b>FORMULARIO DE REGISTRO</b></h5> 
<form action="vistas/modulos/val_registrouser.php"method="GET">
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Nombres Completos</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="nombres" placeholder="Ingrese sus nombres completos">

  </div>
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Apellidos Completos</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="apellidos" placeholder="Ingrese sus apellidos completos">

  </div>
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Cedula</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="cedula" placeholder="Ingrese su numero de cedula completo">

  </div>

  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Ingrese sus correo electronico">
  </div>

  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Telefono</label>
    <input type="tel" class="form-control" id="exampleInputPassword1" name="telefono" placeholder="Ingrese sus numero de contacto">

  </div>

  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Cargo</label>
    <select class="form-select" name="rol" aria-label="Default select example">
  <option value="0" selected>Seleccione una opcion</option>
  <option value="1">Primera Base</option>
  <option value="2">Operador</option>
</select>

  </div>

  <div class="mb-3" hidden>
  <label for="exampleInputPassword1" class="form-label">Estado</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="estado" value=1>

  </div>

  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
     <div style="display:flex">
    <input type="password" class="form-control" id="login_ver" name="contraseña" placeholder="Ingrese su contraseña">
 &nbsp;&nbsp;&nbsp;<a onclick="mostrar_clave();"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
</svg></a>
</div> 
    
  </div>

  <button type="submit" class="btn btn-primary">Registrar</button>
</form>

    </div>
    <div class="col">
      <!-- Aqui va la tercera columna-->
    </div>
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




</body>
</html>
<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>