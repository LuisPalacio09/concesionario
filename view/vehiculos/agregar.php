<?php
// Mensaje recibido -> Controller 
$msg = @$_REQUEST["msg"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="with=device-with, initial-scale=1.0">
    <title>CONCESIONARIO VEHICULOS</title>
    <link rel="stylesheet" href="/concesionarioautos/view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <center>
        <h1>AÑADIR VEHICULO</h1>

        <form action="../../controllers/VehiculoController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right;" class="encabezado">ID:</th>
                    <td><input type="number" id="id" name="id" require placeholder="Digite el id"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">MARCA:</th>
                    <td><input type="text" id="marca" name="marca" require placeholder="Digite la marca"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">MODELO:</th>
                    <td><input type="text" id="modelo" name="modelo" require placeholder="Digite el modelo"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">CILINDRADA:</th>
                    <td><input type="text" id="cilindrada" name="cilindrada" require placeholder="Digite cilindrada"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">PRECIO:</th>
                    <td><input type="text" id="precio" name="precio" require placeholder="Digite el precio"></td>
                </tr>

                <tr>
                    <td>&nbsp</td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;" class="buttons">
                        <input type="submit" id="accion" name="accion" value="Guardar">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" id="clean" value="Limpiar">
                    </td>
                </tr>
            </table>
        </form>
        <span><?= ($msg != NULL || isset($msg)) ? $msg : "" ?></span>
    </center>
</body>

</html>