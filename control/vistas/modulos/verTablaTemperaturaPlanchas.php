<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TemperaturaPrensas</title>
    
    <!---->
    <!--<link rel="stylesheet" href="cssProyecto/estilosTablas.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <link href="cssProyecto/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="cssProyecto/slide.css">
    <!--bootstrap-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../resources/estilos.css">
    <!--Fin-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    <br>
    
    <table border="1">
        <tr>
            <td ROWSPAN="3"> MASTERDENT</td>
            <td ROWSPAN="3"><h2>CONTROL DE VULCANIZADORAS</td>
            <td>Cod F-PR-01</td>
        </tr>
        <tr><td>Versión 002</td></tr>
        <tr><td>24-ene-22</td></tr>
            
            
        </tr>
    </table>
        
    </table>

    <!--<h1>CONTROL DE VULCANIZADORAS <h3> Cod F-PR-01  Versión 002   24-ene-22</h3></h1>-->
    
    <br>

    
        <table border="1">
            <tr>
                <td>id</td>
                <td>Prensa</td>
                <td>Zona</td>
                <td>Temperatura Indicador</td>
                <td>Set Point</td>
                <td>Temperatura Patrón</td>
                <td>Accion Set Point</td>
                <td>Corriente</td>
                <td>Fecha y Hora</td>
                <td>Acción</td>
            </tr>
            
            <?php
            $sql="SELECT * FROM temperaturaPrensas ORDER BY id DESC ";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['prensa'] ?></td>
                <td><?php echo $mostrar['zona'] ?></td>
                <td><?php echo $mostrar['tempIndicador'] ?></td>
                <td><?php echo $mostrar['setPoint'] ?></td>
                <td><?php echo $mostrar['tempPatron'] ?></td>
                <td><?php echo $mostrar['accion'] ?></td>
                <td><?php echo $mostrar['corriente'] ?></td>
                <td><?php echo $mostrar['fechaCreacion'] ?></td>
                <td><a href="#" data-href="eliminar_registro_temperatura.php?id=<?php echo $mostrar['id']; ?>" data-rg="<?= $mostrar['id'] ?>" id="delRg" data-toggle="modal" class="btn btn-danger" data-target="#confirm-delete">Eliminar</a></td>
                
            </tr>
            <?php
            }
            ?>
        </table>
        <script type="text/javascript">
        $(document).on("click", "#delRg", function(event) {
            event.preventDefault();

            let ifRegistro = $(this).attr('data-rg');

            $.ajax({
                url: "https://trazabilidadmasterdent.online/control/eliminar_registro_temperatura.php",
                data: {
                    id: ifRegistro
                },
                success: function(result) {

                    console.log(result);
                    location.reload();
                    


                },
                error: function(request, status, error) {
                    console(request.responseText);
                    console(error);
                }
            });

        });
    </script>

<br></br>
    
</body>
</html>