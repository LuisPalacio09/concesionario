<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/Vehiculo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/OpcionAdicional.php";

$o = new OpcionAdicional();
$o->id_opcion = 3;
$o->nombre = "Tapetes";
$o->descripcion = "Tapetes carro en caucho color negro";
$o->precio = 900000;
$o->id_vehiculo = 3;

try {
    $o->save();
    $total = @OpcionAdicional::count();
    echo "Opcion adicional guardada con exito ";
    echo "Total: $total opciones adicionales";
} catch (Exception $error) {
    $msj = $error->getMessage();
    if (strstr($msj, "Duplicate")) {
        echo "La opcion adicional ya existe";
    }
}
