<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

?>

<!DOCTYPE html>
<html>
<head>
 <title>FormularioMoldes</title>
</head>
<body>
	<div class="container mt-5">
        <center><h1>Formulario nuevo molde</h1></center>
        <div class="row">

<form action="enviarDatosMoldes.php" method="GET">

<div class="mb-3">
                    <label for="cod_molde" class="form-label">código de molde</label>
                    <input type="text" class="form-control" id="cod_molde" name="cod_molde" placeholder="Digita codigo de molde">
                </div>


 <div class="mb-3">
                    <label for="refs" class="form-label">Seleccionar referencia</label>
                    <select class="form-select" id="refs" name="referencia" aria-label="Default select example">
                        <option selected>Selecciona una referencia</option>
                    <?php
                        $sql1="SELECT * from referencias2 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["nombre"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <input type="submit" name="Enviar" >
                </div>

</body>
</html>