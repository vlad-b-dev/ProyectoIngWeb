<?php
    /*error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);*/

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

    if (isset($_GET["info"])) {
        $info = $_GET["info"];
    } else {
        if (isset($_POST["info"])) {
            $info = $_POST["info"];
        } else {
            $info = 1;
        }
    }

    // Rellenar la cabecera para pasársela a cada vista
    $desayuno = mseleccionarCategoria("DESAYUNO");
    $comida = mseleccionarCategoria("COMIDA");
    $cena = mseleccionarCategoria("CENA");
    $header = obtenerCategorias($desayuno,$comida,$cena);

    switch($accion){
        case "principal":
            session_start();
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
            session_start();
            switch($id){
                case 1:
                    vmostrarPerfilUsuario($header, mobtenerInfoUsuario(), mobtenerRecetasUsuario());
                    break;
                case 2:
                    vmostrarFormularioReceta($header, mobtenerCategorias());
                    break;
                case 3:
                    minsertarReceta();
                    break;
                case 4:
                    session_destroy();
                    session_start();
                    vmostrarPaginaPrincipal($header);
                    break;
            }
            break;
        case "listado":
            session_start();
            vmostrarListado($header,$categoria, mobtenerListadoRecetas($categoria));
            break;
        case "editar_receta":
            session_start();
            switch($id){
                case 1:
                    vmodificarReceta(mobtenerDatosReceta($_GET["receta"]), mobtenerIngredientesReceta($_GET["receta"]), mobtenerPasosReceta($_GET["receta"]), $_GET["receta"], mobtenerCategorias(), mobtenerImagenesReceta($_GET["receta"]),$header);
                    break;
                case 2:
                    mmodificarReceta(mobtenerDatosReceta($_GET["receta"]), mobtenerIngredientesReceta($_GET["receta"]), mobtenerPasosReceta($_GET["receta"]), $_GET["receta"]);
                    break;
            }
            break;
        case "eliminar_receta":
            meliminarReceta($receta, $categoria);
            break;
        case "mostrarReceta":
            session_start();
            vMostrarReceta($header,$id,mobtenerDatosReceta($receta), mobtenerImagenesReceta($receta),mobtenerIngredientesReceta($receta),mobtenerPasosReceta($receta),$receta);
            break;
        case "mostrarImagenes":
            session_start();
            vMostrarImagenesReceta($header,$receta, mobtenerDatosReceta($receta), mobtenerImagenesReceta($receta));
            break;
        case "buscar":
            vMostrarResultadosBusqueda(mbuscarRecetas($info));
            break;
    }      
?>