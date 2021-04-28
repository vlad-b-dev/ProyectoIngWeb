<?php
    function vmostrarPaginaPrincipal(){

        $header = file_get_contents("header.html");
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("principal.html");
		$principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        echo $principal;
    }

?>
