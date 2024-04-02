<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/utils/libs/config.php";

class Vehiculo extends ActiveRecord\Model
{
 public static $primary_key = "id_vehiculo";
    public static $table_name = "vehiculo";
    public static $has_many = array(array('opcion_adicional', 'class_name' => 'OpcionAdicional'));

}
