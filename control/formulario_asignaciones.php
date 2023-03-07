<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


?>

<!DOCTYPE html>
<html>
<head>
 <title>FormularioAsignaciones</title>
</head>
<body>
	<div class="container mt-5">
        <center><h1>Formulario nueva asignación</h1></center>
        <div class="row">

<form action="enviarDatosAsignacion.php" method="GET"> 

                <div class="mb-3">
                    <label for="rotulo" class="form-label">Seleccionar Rótulo</label>
                    <select class="form-select" id="rotulo" name="rotulo" aria-label="Default select example">
                        <option selected>Selecciona un rótulo</option>
                    <?php
                        $sql1="SELECT * from rotulos2 ORDER BY id ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["id"].'">'.$mostrar["cod_rotulo"].'</option>';
                    ?>
                    <?php
                        }
                    ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="molde" class="form-label">Seleccionar Molde</label>
                    <select class="form-select" id="molde" name="molde" aria-label="Default select example">
                        <option selected>Selecciona un molde</option>
                    <?php
                        $sql1="SELECT * from moldes2 WHERE estado = 'libre' ORDER BY idM ASC";
                        $result=mysqli_query($conexion,$sql1);
                        
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <?php
                        echo '<option value="'.$mostrar["idM"].'">'.$mostrar["nombreM"].'</option>';
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