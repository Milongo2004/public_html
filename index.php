<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MASTERDENT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</head>

<body>
  <style>
    .icono {
      display: flex;
    }

    .btn-ingresar{
      display: flex;
      justify-content: center;
      margin-left: 38%;
    }
    .seccion {
      margin: 35%;
      margin-top: 0%;
      align-items: center;

    }
    .password{
      margin-left: 11%;
    }

    #boton_ingreso {
      width: 20%;
      height: 20%;
      background-color: blue;
      margin-left: 120px;
    }

    .enlace{
      text-decoration: none;
    }

  </style>
  <div class="container">
    <div class="container">
      <div class="center">

        <!-- Esta es la primera columna-->


        <div class="text-center"> 
        
     
         <br><br>
          <img src="imagenes/nuevamasterdent.png" class="img-fluid" alt="Trazabilidad" width="35%" height="35">
          <br><br>
              <h1 style=color:#17569F; class="center">TRAZABILIDAD</h1>
              <br>
         
        </div>

      </div>
    </div>

    <div class="">
      <div class="">
        <div class="">

          <section class="seccion">
            <form action="login_masterd/val_usuario.php" method="POST">
              <div class="mb-3">
                <div class="icono container center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10%" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                  </svg>
                  &nbsp;&nbsp;
                  <input type="text" class="form-control" id="usuario" aria-describedby="usuario" name="usuario" placeholder="Ingrese aqui su usuario">
                </div>
              </div>
              <br>
              <div class="mb-3">
                <div class="icono container center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10%" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                  </svg>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                     <div style="display:flex">
                  <input type="password" class="form-control" id="login_ver" name="contraseña" placeholder="Ingresa aqui tu contraseña">
                  &nbsp;&nbsp;&nbsp;<a onclick="mostrar_clave();"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
</svg></a>
</div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-ingresar center" id="boton_ingreso">Ingresar</button>
              
              <br>
              <h5 class="password"><a href="login_masterd/recuperar_Contraseña.php" target="_blank" rel="noopener noreferrer" class="enlace">¿Haz olvidado tu contraseña?</a></h5>
  
            </form>
          </section>

        </div>
      </div>

      <!-- Esta es la segunda columna-->
      <!-- Esta es la tercera columna-->

    </div>
  </div>
  

  <!-- Aqui empieza la tercera cuadricula-->
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <!-- Esta es la primera columna-->
      </div>
      <div class="col-4"> 
        
      </div>
      <div class="col">
        <!-- Esta es la tercera columna-->
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