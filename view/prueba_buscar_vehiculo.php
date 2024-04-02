<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/utils/libs/config.php";



$id_vehiculo = 1;

    try {
        echo "<h1>Datos del vehiculo: </h1>";
    
        $id_vehiculo = 1;
        $V = Vehiculo::find($id_vehiculo);
    
        echo "<b>ID:</b> $V->id_vehiculo <br>";
        echo "<b>MARCA:</b> $V->marca <br>";
        echo "<b>MODELO: </b> $V->modelo<br>";
        echo "<b>CILINDRADA: </b> $V->cilindrada<br>";
        echo "<b>PRECIO:</b> $V->precio<br>";
    
        // Listar opciones adicionales
        $OpcionesAdicionales = OpcionAdicional::find('all', array('conditions' => array('ID_Vehiculo' => $id_vehiculo)));
        $num_de_opciones_adicionales = count($OpcionesAdicionales);
        echo "<br>";
        echo "OPCIONES ADICIONALES: $num_de_opciones_adicionales <br>";
        $suma_total_opciones_adicionales = 0;
    
        foreach ($OpcionesAdicionales as $i => $o) {
            echo "-----------------------------<br>";
            echo "OPCION ADICIONALES N°" . ($i + 1) . "<br>";
            echo "-----------------------------<br>";
            echo "<b>ID</b> $o->id_opcion<br>"; // Aquí se utiliza el nombre de columna correcto
            echo "<b>NOMBRE</b> $o->nombre<br>";
            echo "<b>DESCRIPCION</b> $o->descripcion<br>";
            echo "<b>PRECIO</b> $o->precio<br>";
            $suma_total_opciones_adicionales += $o->precio;
        }
        echo "<b>TOTAL OPCIONES ADICIONALES</b> $suma_total_opciones_adicionales";
    } catch (Exception $error) {
        echo $error->getMessage();
    }
    ?>