<?php
    include "modelo.php";
    include "vista.php";

    if (isset($_GET["accion"])) {
        $accion = $_GET["accion"];
    } else {
        if (isset($_POST["accion"])) {
            $accion = $_POST["accion"];
        } else {
            $accion = "principal";
        }
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
        } else {
            $id = 1;
        }
    }

    switch($accion){
        case "principal":
            switch($id){
                case 1:
                    vmostrarPaginaPrincipal();
            }
            break;
    }

?>
