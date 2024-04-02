<?php

//Msg del controlador: 
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/opcionadicional.php";
$msg = @$_REQUEST["msg"];
$o = @$_SESSION["opcion.all"];
$o = unserialize($o);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="with=device-with, initial-scale=1.0">
    <title>OPCIONES ADICIONALES</title>
    <link rel="stylesheet" href="/concesionarioautos/view/css/styles_listar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <center>
        <h1>OPCIONES ADICIONALES</h1>
        <hr>
        <?php
        if (count($o) <= 0) {
        ?>
            <span style="color: #900D40; background-color: #FAD7CE;">
                No existen opciones registrados
            </span>
        <?php
        } else {
        ?>
            <fieldset style="width: 30%">
                <legend>Información Opciones Adicionales: </legend>
                <table>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO</th>
                    </tr>

                    <?php
                    $o = OpcionAdicional::find('all');
                    foreach ($o as $s => $opcion) {
                    ?>
                        <tr style="text-align: left;">
                            <td><?= ($s + 1) ?></td>
                            <td><?= ($opcion->nombre) ?></td>
                            <td><?= ($opcion->descripcion) ?></td>
                            <td><?= ($opcion->precio) ?></td>
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