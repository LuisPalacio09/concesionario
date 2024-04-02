<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/Vehiculo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/OpcionAdicional.php";

$V = new Vehiculo();
$V->id_vehiculo = 3;
$V->marca = "Maserati";
$V->modelo = "Ghibli";
$V->cilindrada = 900;
$V->precio = "1.900.000.000";

try {
    $V->save();
    $total = @Vehiculo::count();
    echo "Vehiculo guardado con exito! ";
    echo "Total : $total Vehiculos";
} catch (Exception $error) {
    $msj = $error->getMessage();
    if (strstr($msj, "Duplicate")) {
        echo "El vehiculo ya existe";
    }
}
