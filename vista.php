<?php

    function vmostrarPaginaPrincipal(){

        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("principal.html");

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

    function vmostrarPaginaLogin(){
        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaLogin.html");

        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
    }

<<<<<<< HEAD
    function vmostrarPaginaRegistro(){
        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaRegistro.html");

        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
    }

=======
>>>>>>> 90a21265d20932c9349d8254f1194fbb8040d548
?>
