<?php
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    include "modelo.php";
    include "vista.php";

    // Comprobación de la existencia de claves GET
    if (isset($_GET["accion"])) {
        $accion = $_GET["accion"];
    } else {
        if (isset($_POST["accion"])) {
            $accion = $_POST["accion"];
        } else {
            $accion = "principal";
        }
    }

    if (isset($_GET["categoria"])) {
        $categoria = $_GET["categoria"];
    } else {
        if (isset($_POST["categoria"])) {
            $categoria = $_POST["categoria"];
        } else {
            $categoria = "error";
        }
    }

    if (isset($_GET["receta"])) {
        $receta = $_GET["receta"];
    } else {
        if (isset($_POST["receta"])) {
            $receta = $_POST["receta"];
        } else {
            $receta = "error";
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

    // Rellenar la cabecera para pasársela a cada vista
    $desayuno = mseleccionarCategoria("DESAYUNO");
    $comida = mseleccionarCategoria("COMIDA");
    $cena = mseleccionarCategoria("CENA");
    $header = obtenerCategorias($desayuno,$comida,$cena);

    switch($accion){
        case "principal":
            switch($id){
                case 1:
                    vmostrarPaginaPrincipal($header);
                    break;
            }
        break;
        case "recetaEjemplo":
            vmostrarVistaEjemplo(mseleccionarDatosReceta());
        break;
        case "login":
            switch($id){
                case 1:
                    vmostrarPaginaLogin($header);
                    break;
                case 2:
                    mlogearUsuario();
                    break;
            }
        break;
        case "registro":
            switch($id){
                case 1:
                    vmostrarPaginaRegistro($header);
                    break;
                case 2:
                    mRegistrarUsuario();
                    break;
            }
        break;
        case "perfil":
            switch($id){
                case 1:
                    vmostrarPerfilUsuario($header, mobtenerInfoUsuario(), mobtenerRecetasUsuario());
                    break;
            }
            break;
        case "listado":
            vmostrarListado($header,$categoria, mobtenerListadoRecetas($categoria));
            break;
        case "editar_receta":
            vmodificarReceta($categoria);
            break;
        case "eliminar_receta":
            meliminarReceta($receta, $categoria);
            break;
    }      
?>