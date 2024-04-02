<?php

//Msg del controlador: 
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/Vehiculo.php";
$msg = @$_REQUEST["msg"];
$vh = @$_SESSION["vehiculo.all"];
$vh = unserialize($vh);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="with=device-with, initial-scale=1.0">
    <title>Concesionario Autos</title>
    <link rel="stylesheet" href="/concesionarioautos/view/css/styles_listar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <center>
        <h1>REPORTE DE VEHICULOS</h1>
        <hr>
        <?php
        if (count($vh) <= 0) {
        ?>
            <span style="color: #900D40; background-color: #FAD7CE;">
                No existen vehiculos registrados
            </span>
        <?php
        } else {
        ?>
            <fieldset style="width: 30%">
                <legend>Información Vehiculo: </legend>
                <table>
                    <tr>
                        <th>#</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>CILINDRADA</th>
                        <th>PRECIO</th>

                    </tr>

                    <?php
                    $vh = Vehiculo::find('all');
                    foreach ($vh as $s => $vehiculo) {
                    ?>
                        <tr style="text-align: left;">
                            <td><?= ($s + 1) ?></td>
                            <td><?= ($vehiculo->marca) ?></td>
                            <td><?= ($vehiculo->modelo) ?></td>
                            <td><?= ($vehiculo->cilindrada) ?></td>
                            <td><?= ($vehiculo->precio) ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </fieldset>
        <?php
        }
        ?>

        <span style="color:red;"><?= ($msg != NULL || isset($msg)) ? $msg : "" ?></span>

    </center>