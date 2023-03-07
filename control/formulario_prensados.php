<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


?>

<!DOCTYPE html>
<html>
<head>
 <title>FormularioPrensados</title>
</head>
<body>
	<div class="container mt-5">
        <center><h1>Formulario prensados</h1></center>
        <div class="row">

<form action="enviarDatosPrensados.php" method="GET"> 

               

                <div class="mb-3">
                    <label for="molde" class="form-label">Seleccionar Molde</label>
                    <select class="form-select" id="molde" name="molde" aria-label="Default select example">
                        <option selected>Selecciona un molde</option>
                    <?php
                        //$sql1="SELECT * from moldes2 ORDER BY idM ASC";
                    $sql1="SELECT asignaciones2.`moldeId`, moldes2.`idM`, moldes2.`nombreM` FROM asignaciones2 INNER JOIN moldes2 ON asignaciones2.`moldeId` = moldes2.`idM` WHERE asignaciones2.`estado` = 'enProceso' ORDER BY idM ASC";
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

                 <div class="mb-3">
                    <label for="juegos" class="form-label">Número de juegos</label>
                    <input type="text" class="form-control" id="juegos" name="juegos" placeholder="Digita cantidad de juegos">
                </div>

                <input type="submit" name="Enviar" >
                </div>

</body>
</html>