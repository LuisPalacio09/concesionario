<?php
// Mensaje recibido -> Controller 
$msg = @$_REQUEST["msg"];
?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta name="viewport" content="with=device-with, initial-scale=1.0">
    <title>OPCIONES ADICIONALES</title>
    <link rel="stylesheet" href="/concesionarioautos/view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <center>
        <h1>OPCIONES ADICIONALES</h1>

        <form action="../../controllers/OpcionController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right;" class="encabezado">ID:</th>
                    <td><input type="text" id="id_opcion" name="id_opcion" require placeholder="Digite el id"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">NOMBRE:</th>
                    <td><input type="text" id="nombre" name="nombre" require placeholder="Digite nombre"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">DESCRIPCION:</th>
                    <td><input type="text" id="descripcion" name="descripcion" require placeholder="Digite descripcion"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">PRECIO:</th>
                    <td><input type="text" id="precio" name="precio" require placeholder="Digite precio"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">ID:</th>
                    <td><input type="text" id="id_vehiculo" name="id_vehiculo" require placeholder="Digite el ID"></td>
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