<?php

    function vmostrarPaginaPrincipal($datosCategoriaDesayuno,$datosCategoriaComida,$datosCategoriaCena){

        // Obtener el contenido
        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("principal.html");

        // Sustituir cabecera y pie
		$principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);

        // Sustituir los datos
        $trozos = explode("##fila##", $principal);
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

        // Imprimir el contenido
        echo $trozos[0].$cuerpo.$trozos[2].$cuerpo2.$trozos[4].$cuerpo3.$trozos[6];
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

    function vmostrarPaginaLogin(){
        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaLogin.html");

        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
    }

    function vmostrarPaginaRegistro(){
        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaRegistro.html");

        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
    }

?>
