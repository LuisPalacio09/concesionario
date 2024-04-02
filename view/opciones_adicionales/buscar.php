<?php
//Msg del controlador: 
    session_start();

    require_once $_SERVER["DOCUMENT_ROOT"]."concesionarioautos/models/entities/opcionadicional.php";
    $msg = @$_REQUEST["msg"];
    $o = @$_SESSION["opcion.find"];
    $o = unserialize($o); 
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
    <!-- <script src = "../js/validaciones.js"></script>  -->
</head>

<body>
    <center>
        <h1>OPCIONES ADICIONALES</h1>

        <form action="../../controllers/OpcionController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right;" class="encabezado">id:</th>
                    <td><input type="number" id="id" name="id" 
                    value="<?= @$o->id_opcion?>" required placeholder="id"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">nombre:</th>
                    <td><input type="text" id="nombre" name="nombre" 
                    value="<?= @$o->nombre?>"  placeholder="nombre"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">descripcion:</th>
                    <td><input type="text" id="descripcion" name="descripcion" 
                    value="<?= @$o->descripcion?>"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">precio:</th>
                    <td><input type="text" id="precio" name="precio" 
                    value="<?= @$o->precio?>"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">id:</th>
                    <td><input type="number" id="id" name="id_vehiculo" 
                    value="<?= @$o->id_vehiculo?>"></td>
                </tr>

                <tr>
                    <td>&nbsp</td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;" class="buttons">
                        <input type="submit" id="accion" name="accion" value="Buscar">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" id="clean" value="Limpiar">
                        <input type="submit" id="editar" name="accion" value="Editar" >
                        <input type="submit" id="eliminar" name="accion" value="Eliminar" >

                    </td>
                </tr>
            </table>
        </form>
        <span><?= ($msg != NULL || isset($msg)) ? $msg : "" ?></span>
    </center>
    <!-- <script>
        habilitarBotones();
        confirmarOperacion();
    </script> -->
</body>
</html>
