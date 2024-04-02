<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/utils/libs/config.php";

class OpcionAdicional extends ActiveRecord\Model
{
    public static $primary_key = "id_opcion";
    public static $table_name = "opcion_adicional";
    public static $belongs_to = array(array("vehiculo"));
}
