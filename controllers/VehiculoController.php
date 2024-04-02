<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/Vehiculo.php";

class VehiculoController
{
    public static function ejecutarAccion()
    {
        $accion  = @$_REQUEST["accion"];

        switch ($accion) {
            case "Guardar":
                VehiculoController::guardar();
                break;

            case "Buscar":
                VehiculoController::buscar();
                break;

            case "Editar":
                VehiculoController::editar();
                break;

            case "Eliminar":
                VehiculoController::eliminar();
                break;

            case "todo":
                VehiculoController::listar_todo();
                break;

            default:
                header("Location: ../view/error.php?msg=Accion no permitida");
                exit;
        }
    }

    public static function guardar()
    {
        $id_vehiculo = @$_REQUEST["id"];
        $marca = @$_REQUEST["marca"];
        $modelo = @$_REQUEST["modelo"];
        $cilindrada = @$_REQUEST["cilindrada"];
        $precio = @$_REQUEST["precio"];

        $vh = new Vehiculo();
        $vh->id_vehiculo = $id_vehiculo;
        $vh->marca = $marca;
        $vh->modelo = $modelo;
        $vh->cilindrada = $cilindrada;
        $vh->precio = $precio;

        try {
            $vh->save();
            $total = @Vehiculo::count();
            $msg = "Vehiculo guardado, Total: $total";
            header("Location: ../view/vehiculos/agregar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), "Duplicate")) {
                $msg = "El vehiculo ya fue ingresado";
            } else {
                $msg = "Ocurrió un error al guardar el vehiculo";
            }

            header("Location: ../view/vehiculos/agregar.php?msg=$msg");
            exit;
        }
    }

    public static function buscar()
    {
        $id = @$_REQUEST["id"];

        try {
            $vh = Vehiculo::find($id);

            $_SESSION["vehiculo.find"] = serialize($vh);
            $msg = "Vehiculo encontrado";

            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msg = "El vehiculo no existe";
            } else {
                $msg = "Ocurrio un error al guardar el vehiculo";
            }

            $_SESSION["vehiculo.find"] = NULL;
            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
            exit;
        }
    }

    public static function editar()
    {
        $id = @$_REQUEST["id"];

        $vh = @$_SESSION["vehiculo.find"];

        $vh = unserialize($vh);

        if ($vh->id != $id) {
            $msg = "El codigo no corresponde al vehiculo";
            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
        }

        $marca = @$_REQUEST["marca"];
        $modelo = @$_REQUEST["modelo"];
        $cilindrada = @$_REQUEST["cilindrada"];
        $precio = @$_REQUEST["precio"];

        $vh->marca = $marca;
        $vh->modelo = $modelo;
        $vh->cilindrada = $cilindrada;
        $vh->precio = $precio;


        try {
            $vh->save();

            $_SESSION["vehiculo.find"] = serialize($vh);
            $msg = "Vehiculo editado";

            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msg = "El vehiculo no existe";
            } else {
                $msg = "Se encontró un error al editar la sucursal";
            }

            $_SESSION["vehiculo.find"] = NULL;
            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
            exit;
        }
    }

    public static function eliminar()
    {
        $id = @$_REQUEST["id"];

        $vh = @$_SESSION["vehiculo.find"];

        $vh = unserialize($vh);

        if ($vh->id != $id) {
            $msg = "El codigo no corresponde al vehiculo";
            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
        }

        try {
            $vh->delete();
            $vh = @$_SESSION["vehiculo.find"] = null;
            $total = @Vehiculo::count();
            $msg = "Vehiculo eliminado, Total: $total";

            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msg = "El vehiculo no existe";
            } else {
                $msg = "Se encontró un error al eliminar el vehiculo";
            }

            $_SESSION["vehiculo.find"] = NULL;
            header("Location: ../view/vehiculos/buscar.php?msg=$msg");
            exit;
        }
    }

    public static function listar_todo()
    {
        try {
            $vehiculos = Vehiculo::all();

            if ($vehiculos == NULL) {
                $_SESSION["vehiculo.all"] = NULL;
                $msg = "Total vehiculos: 0";
            } else {
                $total = count($vehiculos);
                $vehiculos = serialize($vehiculos);
                $_SESSION["vehiculo.all"] = $vehiculos;
            }

            $msg = "Total vehiculos: $total";
            header("Location: ../view/vehiculos/listar_todo.php?msg=$msg");
        } catch (Exception $error) {
            $_SESSION["vehiculo.all"] = NULL;
            header("Location: ../view/vehiculos/listar_todo.php?msg=Total vehiculos: 0");
        }
    }
}

VehiculoController::ejecutarAccion();
