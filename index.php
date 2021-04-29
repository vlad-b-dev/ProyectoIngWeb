<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

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
                    break;
            }
            break;
        case "recetaEjemplo":
            vmostrarVistaEjemplo(mseleccionarDatosReceta());
<<<<<<< HEAD
            break;
        case "login":
            switch($id){
                case 1:
                    vmostrarPaginaLogin();
                    break;
                case 2:
                    mlogearUsuario();
                    break;
            }
            break;
        case "registro":
            switch($id){
                case 1:
                    vmostrarPaginaRegistro();
                    break;
                case 2:
                    mRegistrarUsuario();
=======
            break;
        case "login":
            switch($id){
                case 1:
                    vmostrarPaginaLogin();
                    break;
                case 2:
                    mlogearUsuario();
>>>>>>> 90a21265d20932c9349d8254f1194fbb8040d548
                    break;
            }
    }

?>
