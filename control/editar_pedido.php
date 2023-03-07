<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


$idP=$_GET['id'];
$query=mysqli_query($conexion,"SELECT * FROM pedidos2 WHERE idP='$idP'" );
mysqli_close($conexion);
$result=mysqli_num_rows($query);
if($result>0) { while ($data =mysqli_fetch_assoc($query))
{


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDITAR PEDIDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row"> 

        <h1 style="text-align:center">Editar</h1>
        </div>
        <div class="row">
        <div class="mb-3">
 <form action="val_Editar_Pedido.php"  method="POST">


 <label for="exampleFormControlInput1" class="form-label" hidden >idP </label>
  <input type="text" value="<?php echo $data['idP'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el idP"   name="idP" hidden >



  <label for="exampleFormControlInput1" class="form-label">Código</label>
  <input type="text" value="<?php echo $data['codigoP'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el Codigo"   name="codigoP"  >
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label" hidden></label>Alias (como se conoce en terminación)</label>
  <input type="text" value="<?php echo $data['nota'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite el alias del pedido"   name ="nota">
</div>


    <div class="mb-3">
                <label for="linea" class="form-label">Seleccionar línea</label>
                 <select class="form-select" id="linea" name="linea" aria-label="Default select example">
                        <option selected value="
                        <?php
                        if ($data['linea']=="RESISTAL"){
                            echo "RESISTAL";
                            ?>
                            ">RESISTAL
                            <?php
                        }
                        else if ($data['linea']=="STARPLUS"){
                            echo "STARPLUS";
                            ?>
                            ">STARPLUS
                            <?php
                        }
                        else if ($data['linea']=="REVEAL"){
                            echo "REVEAL";
                            ?>
                            ">REVEAL
                            <?php
                        }
                        else if ($data['linea']=="STARVIT"){
                            echo "STARVIT";
                            ?>
                            ">STARVIT
                            <?php
                        }
                        else if ($data['linea']=="UHLERPLUS"){
                            echo "UHLERPLUS";
                            ?>
                            ">UHLERPLUS
                            <?php
                        }
                        else if ($data['linea']=="STARDENT"){
                            echo "STARDENT";
                            ?>
                            ">STARDENT
                            <?php
                        }
                        else if ($data['linea']=="ZENITH"){
                            echo "ZENITH";
                            ?>
                            ">ZENITH
                            <?php
                        }
                       
                        
                        ?>
                        </option>
                        <option value="RESISTAL">RESISTAL</option>
                        <option value="STARPLUS">STARPLUS</option>
                        <option value="REVEAL">REVEAL</option>
                        <option value="STARVIT">STARVIT</option>
                        <option value="UHLERPLUS">UHLERPLUS</option>
                        <option value="STARDENT">STARDENT</option>
                        <option value="ZENITH">ZENITH</option>
                        
                 
                    </select>
                    </div>




<?php
}
}
?>


<div class="col-12">
    <button class="btn btn-primary" type="submit">Editar</button>
  </div>

  </form>
  <br></br>
    <br></br>
      <br></br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>


