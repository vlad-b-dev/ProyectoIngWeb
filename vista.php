<?php

    function obtenerCategorias($datosCategoriaDesayuno,$datosCategoriaComida,$datosCategoriaCena){
        // Obtener el contenido
        $header = file_get_contents("header.html");
        // Sustituir los datos
        $trozos = explode("##fila##", $header);
        $cuerpo = ""; 
        $aux = "";
        for($i = 0; $i < sizeof($datosCategoriaDesayuno); $i++){
            $aux = $trozos[1];
            $aux = str_replace("##categoriaDesayuno##", $datosCategoriaDesayuno[$i]["NOMBRE"], $aux);
            $cuerpo .= $aux;
        }

        $cuerpo2 = ""; 
        $aux = "";
        for($i = 0; $i < sizeof($datosCategoriaComida); $i++){
            $aux = $trozos[3];
            $aux = str_replace("##categoriaComida##", $datosCategoriaComida[$i]["NOMBRE"], $aux);
            $cuerpo2 .= $aux;
        }

        $cuerpo3 = ""; 
        $aux = "";
        for($i = 0; $i < sizeof($datosCategoriaCena); $i++){
            $aux = $trozos[5];
            $aux = str_replace("##categoriaCena##", $datosCategoriaCena[$i]["NOMBRE"], $aux);
            $cuerpo3 .= $aux;
        }

        // Devolver el header montando el contenido
        return $trozos[0].$cuerpo.$trozos[2].$cuerpo2.$trozos[4].$cuerpo3.$trozos[6];
    }

    
    function vmostrarPaginaPrincipal($header){
        // Obtener el contenido
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("principal.html");

        // Sustituir cabecera y pie
		$principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
        
    }
    

    function vmostrarVistaEjemplo($resultado){

        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $recetaEjemplo = file_get_contents("recetaEjemplo.html");

		$recetaEjemplo = str_replace("##header##", $header, $recetaEjemplo);
        $recetaEjemplo = str_replace("##footer##", $footer, $recetaEjemplo);
        $recetaEjemplo = str_replace("##nombreReceta##",$resultado["NOMBRE"], $recetaEjemplo);
        
        echo $recetaEjemplo;
    }


    function vmostrarPaginaLogin($header){
        // Obtener contenido
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaLogin.html");

        // Sustituir cabecera y pie
        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
    }


    function vmostrarPaginaRegistro($header){
        // Obtener contenido
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaRegistro.html");
        
        // Sustituir cabecera y pie
        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);

        echo $principal;
    }

    function vmostrarPerfilUsuario($header, $info, $recetas){
        // Obtener contenido
        $footer = file_get_contents("footer.html");
        $perfil = file_get_contents("plantillaPerfil.html");
        // Sustituir cabecera y pie
        $perfil= str_replace("##header##", $header, $perfil);
        $perfil = str_replace("##footer##", $footer, $perfil);
        //Sustituir datos de usuario
        $perfil = str_replace("##nombre##", $info[0]["NOMBRE"], $perfil);
        $perfil = str_replace("##email##", $info[0]["CORREO"], $perfil);
        //Sustituir recetas
        $trozos = explode("##fila##", $perfil);
        $cuerpo = "";
        if($recetas != null){
            for($i=0;$i<sizeof($recetas);$i++){
                $aux = $trozos[1];
                $aux = str_replace("##nombreReceta##", $recetas[$i]["NOMBRE"], $aux);
                $aux = str_replace("##categoria##", $recetas[$i]["CATEGORIA"], $aux);
                $aux = str_replace("##fecha##", $recetas[$i]["CREACION"], $aux);
                $cuerpo .= $aux;
            }
        }else{
            $aux = $trozos[1];
            $aux = str_replace("##nombreReceta##", "No tiene recetas.", $aux);
            $aux = str_replace("##categoria##", "-", $aux);
            $aux = str_replace("##fecha##", "-", $aux);
            $cuerpo .= $aux;
        }
        echo $trozos[0] . $cuerpo . $trozos[2];
    }

    function vmostrarListado($categoria){
        // Obtener contenido
        $header = file_get_contents("header.html");
        $footer = file_get_contents("footer.html");
        $listado = file_get_contents("listadoRecetas.html");
        
        //Sustituir titulos de recetas
        $trozos = explode("##fila##", $header);
        $cuerpo = ""; 
        $aux = "";
        /*
        for($i = 0; $i < sizeof($datosRecetasParaCategoria); $i++){
            $aux = $trozos[1];
            $aux = str_replace("##categoriaDesayu##", $datosRecetasParaCategoria [$i]["NOMBRE"], $aux);
            $cuerpo .= $aux;
        }*/





        //Sustituir cosas propias de la pestaña
        $listado= str_replace("##categoria##", $categoria, $listado);
        // Sustituir cabecera y pie
        $listado= str_replace("##header##", $header, $listado);
        $listado = str_replace("##footer##", $footer, $listado);
        
        echo $listado;
    }
?>
