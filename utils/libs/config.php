<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/utils/libs/orm/ActiveRecord.php";
ActiveRecord\Config::initialize(function ($cfg) {
  $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities");
  $cfg->set_connections(
    array(
      'development' => 'mysql://root:root@localhost/concesionario',

    )
  );
});
