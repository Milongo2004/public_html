<?php
  
session_start();
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
  
  if($rol==1 OR $rol==3 ){
    
  
  ?>
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ProgProduccion</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 </head>
 <body>
     
     <center><h1>Programación de Producción</h1></center>
     <div class="container mt-5">
        
            
              <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>   
               <button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/progProduccion2.php'">Nueva Programación</button>
               <button onclick="location.href='https://trazabilidadmasterdent.online/control/registroProducidos/registroProducidos1.php'">Producidos</button>
                <button onclick="location.href='https://trazabilidadmasterdent.online/control/filtros_Rotulos/filtrados.php'">Filtros de búsqueda</button>
                <button onclick="location.href='https://trazabilidadmasterdent.online/control/progProduccion/formularioImprimirProg.php'">Imprimir</button>
                <button onclick="location.href='../progProduccion/invima.php'">INVIMA</button>
                
                <!--<button onclick="location.href='https://trazabilidadmasterdent.online/control/interaccion_arduino.php?pre_php=0&hum_php=1.00&temp_php=0&proceso_php=9&dist_php=&rotulo_php=&menorRotulo_php=477&mayorRotulo_php=453">interacción arduino</button>-->
                
                
          
             </body>
</html>

<?php
}

else {
  echo"<h1>No estoy autorizado para ingresar a esta pagina.</h1>";
}
?>
