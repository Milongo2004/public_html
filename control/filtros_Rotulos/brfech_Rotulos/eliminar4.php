<?php
if($_GET['desde']<$_GET['hasta']){
  
if(!isset($_GET["id"])){

  header("location: ../selfildef.php?Seleccionado=1&err=93jd");
  
  }
  $desde=$_GET['desde'];
    $hasta=$_GET['hasta'];
    $id=$_GET["id"];
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
  ?>

<html>
<head>
  <title>CONFIRMACION ELIMINAR DEFINITIVAMENTE </title>
  </head>
  <body>
    <style>
    #alerta{
          color: red;
          animation-name: alerta;
          animation-duration: 1s;
          animation-delay: 1s;
          animation-iteration-count: infinite;
      }
      @keyframes alerta {
          from {color: red;}
          25%{
              color: blue;
          }
          50%{
              color: red;
          }
          75%{
              color: blue;
          }

      }
      to{
          color: blue;
      }

      #bordes{

        color: red;
        animation-name: bordes;
        animation-duration: 1s;
        animation-delay: 1s;
        animation-iteration-count: infinite;
    }
    @keyframes bordes {
        from {color: red;}
        25%{
            color: blue;
        }
        50%{
            color: red;
        }
        75%{
            color: blue;
        }

    }
    to{
        color: blue;
    }

    #botones:hover{
      background-color:red;
      color:white;

    }


    </style>
    <div  style=" background-color:black;color:white;width: 500px; height:500px;margin-left:35%;margin-top:4%;border-style:double solid;" >
      <h3 style="text-align:center;" id="bordes"> ¿ESTAS SEGURO DE ELIMINAR ESTE DATO PARA SIEMPRE? </h3>
      <div  style="margin-left:30%;"><svg xmlns="http://www.w3.org/2000/svg" width="160" height="160"   id="alerta" fill="currentColor"  color="red" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
  <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
  <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
</svg></div>
<p style="font-size:20px;">  Si eliminas este  Rotulo no podra  recuperarse, esto significa que toda la informacion relacionada  con este  desaparecera  de la base de datos del sistema de forma permanente. </p>
<br><br>

<form action="eliminardefinitivo.php" method="GET">
<input type="text" name="id"  value="<?php  echo $id;?>"  hidden>
    <?php
     $query=mysqli_query($conexion,"SELECT rotulos2.*, colores2.nombre AS color, lotes2.*,referencias2.nombre AS referencia, pedidos2.* FROM rotulos2 INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id`  INNER JOIN lotes2  ON rotulos2.`loteId`=lotes2.`id` INNER JOIN referencias2 ON rotulos2.`referenciaId`=referencias2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido`=pedidos2.`idP` WHERE rotulos2.id LIKE '$id'");
     $resultado = mysqli_num_rows($query);
     if ($resultado > 0) {
     while  ($data = mysqli_fetch_assoc($query)) {
     $color=$data['color'];
     $referencia=$data['referencia'];
     $lote=$data['nombreL'];
     $pedido=$data['codigoP'];
     
    ?>
    <input type="text" name="hasta"  value="<?php  echo $hasta;?>"   hidden >
    <input type="text" name="desde"  value="<?php  echo $desde;?>"   hidden >
      <input type="text" name="color"  value="<?php  echo $color;?>"   hidden >
      <input type="text" name="referencia"  value="<?php echo $referencia;?>"  hidden>
      <input type="text" name="lote"  value="<?php echo $lote;?>"   hidden>
      <input type="text" name="pedido"  value="<?php  echo $pedido;?>"  hidden >
<?php  }}  ?>
<div  style="display:flex;">
&nbsp;&nbsp;&nbsp;
<input type="submit"   value="ACEPTAR" style="width:150px;height:50px;" id="botones">
</form>
&nbsp;&nbsp;&nbsp;

<form action="consultarcolor.php" method="GET">
  <input type="text" name="id"  value="<?php  echo $id;?>"  hidden>
    <?php
     $query=mysqli_query($conexion,"SELECT rotulos2.*, colores2.nombre AS color, lotes2.*,referencias2.nombre AS referencia, pedidos2.* FROM rotulos2 INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id`  INNER JOIN lotes2  ON rotulos2.`loteId`=lotes2.`id` INNER JOIN referencias2 ON rotulos2.`referenciaId`=referencias2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido`=pedidos2.`idP` WHERE rotulos2.id LIKE '$id'");
     mysqli_close($conexion);
     $resultado = mysqli_num_rows($query);
     if ($resultado > 0) {
     while  ($data = mysqli_fetch_assoc($query)) {
     $color=$data['color'];
     $referencia=$data['referencia'];
     $lote=$data['nombreL'];
     $pedido=$data['codigoP'];
     
    ?>
        <input type="text" name="hasta"  value="<?php  echo $hasta;?>"   hidden>
    <input type="text" name="desde"  value="<?php  echo $desde;?>"  hidden  >
      <input type="text" name="color"  value="<?php  echo $color;?>"  hidden >
      <input type="text" name="referencia"  value="<?php  echo $referencia;?>"  hidden>
      <input type="text" name="lote"  value="<?php  echo $lote;?>"   hidden>
      <input type="text" name="pedido"  value="<?php  echo $pedido;?>"  hidden >
<?php }}  ?>
      <input  type="submit" value="CANCELAR"  style="width:150px;height:50px;" id="botones">
</div>
</form>

  </div>


  </body>



</html>



<?php

}

else{
echo "VUELVE A INTENTARLO";

}


?>
