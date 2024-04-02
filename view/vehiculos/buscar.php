<?php
//Msg del controlador: 
    session_start();

    require_once $_SERVER["DOCUMENT_ROOT"]."concesionarioautos/models/entities/Vehiculo.php";
    $msg = @$_REQUEST["msg"];
    $vh = @$_SESSION["vehiculo.find"];
    $vh = unserialize($vh); 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="with=device-with, initial-scale=1.0">
    <title>CONCESIONARIO VEHICULO</title>
    <link rel="stylesheet" href="/concesionarioautos/view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- <script src = "../js/validaciones.js"></script>  -->
</head>

<body>
    <center>
        <h1>BUSCAR VEHICULO</h1>

        <form action="../../controllers/VehiculoController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right;" class="encabezado">id:</th>
                    <td><input type="text" id="id" name="id" 
                    value="<?= @$vh->id?>" required placeholder="id"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">MARCA:</th>
                    <td><input type="text" id="marca" name="marca" 
                    value="<?= @$vh->marca?>"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">MODELO:</th>
                    <td><input type="text" id="modelo" name="modelo" readonly
                    value="<?= @$vh->modelo?>"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">CILINDRADA:</th>
                    <td><input type="text" id="cilindrada" name="cilindrada" readonly
                    value="<?= @$vh->cilindrada?>"></td>
                </tr>

                <tr>
                    <th style="text-align: right;" class="encabezado">PRECIO:</th>
                    <td><input type="text" id="precio" name="precio" readonly
                    value="<?= @$vh->precio?>"></td>
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
