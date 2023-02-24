<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</head>
<body>
    
<div class="container text-center">
  <div class="row">
    <div class="col">
        <br><br>
    <img src="../imagenes/masterdent.png" class="img-fluid" alt="Logo Masterdent" style="margin-left:-30px;">
    </div>
    <div class="col">
        <br><br><br><br><br><br>
        <h3 style="text-align:center; font-family:'Gill Sans MT'; color:#2925A9;">Recuperar Contraseña</h3>
    <form action="val_contraseña.php" method="POST">
  <div class="mb-3">
    <div style="display:flex;">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" color="#2925A9" class="bi bi-unlock-fill" viewBox="0 0 16 16">
  <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
</svg>
&nbsp;&nbsp;
    <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese su usuario">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    </div>
    <div class="col">
      <!-- Esta es la tercera columna-->
    </div>
  </div>
</div>





</body>
</html>