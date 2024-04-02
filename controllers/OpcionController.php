<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "concesionarioautos/models/entities/opcionadicional.php";

class OpcionController
{
    public static function ejecutarAccion()
    {
        $accion  = @$_REQUEST["accion"];

        switch ($accion) {
            case "Guardar":
                OpcionController::guardar();
                break;

            case "Buscar":
                OpcionController::buscar();
                break;

            case "Editar":
                OpcionController::editar();
                break;

            case "Eliminar":
                OpcionController::eliminar();
                break;

            case "todo":
                OpcionController::listar_todo();
                break;

            default:
                header("Location: ../view/error.php?msg=Accion no permitida");
                exit;
        }
    }

    public static function guardar()
    {
        $id_opcion = @$_REQUEST["id_opcion"];
        $nombre = @$_REQUEST["nombre"];
        $descripcion = @$_REQUEST["descripcion"];
        $precio = @$_REQUEST["precio"];
        $id_vehiculo = @$_REQUEST["id_vehiculo"];

        $o = new OpcionAdicional();
        $o->id_opcion = $id_opcion;
        $o->nombre = $nombre;
        $o->descripcion = $descripcion;
        $o->precio = $precio;
        $o->id_vehiculo = $id_vehiculo;

        try {
            $o->save();
            $total = @OpcionAdicional::count();
            $msg = "Opcion adicional guardado, Total: $total";
            header("Location: ../view/opciones_adicionales/agregar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), "Duplicate")) {
                $msg = "La opcion adicional ya fue ingresado";
            } else {
                $msg = "Ocurrió un error al guardar la opcion adicional";
            }

            header("Location: ../view/opciones_adicionales/agregar.php?msg=$msg");
            exit;
        }
    }

    public static function buscar()
    {
        $id = @$_REQUEST["id"];

        try {
            $o = OpcionAdicional::find($id);

            $_SESSION["opcion.find"] = serialize($o);
            $msg = "Opcion encontrado";

            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msg = "La Opcion no existe";
            } else {
                $msg = "Ocurrio un error al buscar la Opcion";
            }

            $_SESSION["opcion.find"] = NULL;
            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
            exit;
        }
    }

    public static function editar()
    {
        $id = @$_REQUEST["id"];

        $o = @$_SESSION["opcion.find"];

        $o = unserialize($o);

        if ($o->id != $id) {
            $msg = "El codigo no corresponde a la opcion";
            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
        }

        $id_opcion = @$_REQUEST["id_opcion"];
        $nombre = @$_REQUEST["nombre"];
        $descripcion = @$_REQUEST["descripcion"];
        $precio = @$_REQUEST["precio"];
        $id_vehiculo = @$_REQUEST["id_vehiculo"];

        $o->id_opcion = $id_opcion;
        $o->nombre = $nombre;
        $o->descripcion = $descripcion;
        $o->precio = $precio;
        $o->id_vehiculo = $id_vehiculo;


        try {
            $o->save();

            $_SESSION["opcion.find"] = serialize($o);
            $msg = "Opcion editada";

            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msg = "La opcion no existe";
            } else {
                $msg = "Se encontró un error al editar la sucursal";
            }

            $_SESSION["opcion.find"] = NULL;
            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
            exit;
        }
    }

    public static function eliminar()
    {
        $id = @$_REQUEST["id"];

        $o = @$_SESSION["opcion.find"];

        $o = unserialize($o);

        if ($o->id != $id) {
            $msg = "El codigo no corresponde a la opcion";
            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
        }

        try {
            $o->delete();
            $o = @$_SESSION["opcion.find"] = null;
            $total = @OpcionAdicional::count();
            $msg = "Opcion eliminada, Total: $total";

            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
            exit;
        } catch (Exception $error) {
            if (strstr($error->getMessage(), $id)) {
                $msg = "La opcion no existe";
            } else {
                $msg = "Se encontró un error al eliminar la opcion";
            }

            $_SESSION["opcion.find"] = NULL;
            header("Location: ../view/opciones_adicionales/buscar.php?msg=$msg");
            exit;
        }
    }

    public static function listar_todo()
    {
        try {
            $opciones = OpcionAdicional::all();

            if ($opciones == NULL) {
                $_SESSION["opcion.all"] = NULL;
                $msg = "Total opciones: 0";
            } else {
                $total = count($opciones);
                $opciones = serialize($opciones);
                $_SESSION["opcion.all"] = $opciones;
            }

            $msg = "Total opciones: $total";
            header("Location: ../view/opciones_adicionales/listar_todo.php?msg=$msg");
        } catch (Exception $error) {
            $_SESSION["opcion.all"] = NULL;
            header("Location: ../view/opciones_adicionales/listar_todo.php?msg=Total vehiculos: 0");
        }
    }
}

OpcionController::ejecutarAccion();
