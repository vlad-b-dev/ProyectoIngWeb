<?php
    session_start();
    /**
     * 
     */
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

    /**
     * 
     */
    function vmostrarPaginaPrincipal($header){
        // Obtener el contenido
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("principal.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

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

    /**
     * 
     */
    function vmostrarPaginaLogin($header){
        // Obtener contenido
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaLogin.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        // Sustituir cabecera y pie
        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);
        
        echo $principal;
    }

    /**
     * 
     */
    function vmostrarPaginaRegistro($header){
        // Obtener contenido
		$footer = file_get_contents("footer.html");
        $principal = file_get_contents("plantillaRegistro.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        // Sustituir cabecera y pie
        $principal = str_replace("##header##", $header, $principal);
        $principal = str_replace("##footer##", $footer, $principal);

        echo $principal;
    }

    /**
     * 
     */
    function vmostrarReceta($header, $id, $datosReceta, $imagenesReceta,$ingredientesReceta,$pasosReceta,$idReceta)
    {
        // Obtener contenido
        if($id == 2)
        {
            $paginaReceta = file_get_contents("plantillaMostrarRecetaIngredientes.html");
        }
        else
        {
            $paginaReceta = file_get_contents("plantillaMostrarRecetaPasos.html");

        }

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        // Sustituir cabecera
        $paginaReceta = str_replace("##header##", $header, $paginaReceta);

        //Sustituir cosas propias de la pestaña
        $linkImagenes = "assets/img/recetas/";
        $paginaReceta = str_replace("##idReceta##", $idReceta, $paginaReceta);
        if($datosReceta != null){
            $paginaReceta = str_replace("##nombreReceta##", $datosReceta[0]["NOMBRE"], $paginaReceta);
        }
        else{
            $paginaReceta = str_replace("##nombreReceta##", "FALLO EN LA CARGA", $paginaReceta);
        }

        if($ingredientesReceta != null){
            $paginaReceta = str_replace("##numIngredientes##", sizeof($ingredientesReceta), $paginaReceta);
        }
        else{
            $paginaReceta = str_replace("##numIngredientes##", "0", $paginaReceta);
        }

        if($id == 2)
        {
            if($ingredientesReceta != null){
                $paginaReceta = str_replace("##numPasos##", sizeof($pasosReceta), $paginaReceta);
                
                $trozos = explode("##fila##", $paginaReceta);
                $cuerpo = "";
                for($i=0;$i<sizeof($ingredientesReceta);$i++){
                    $aux = $trozos[1];
                    $aux = str_replace("##numero##", $ingredientesReceta[$i]["NOMBRE"], $aux);
                    $aux = str_replace("##contenido##", $ingredientesReceta[$i]["CANTIDAD"], $aux);
                    $cuerpo .= $aux;
                }
            }
            else{
                $paginaReceta = str_replace("##numIngredientes##", "0", $paginaReceta);
    
                $paginaReceta = str_replace("##numPasos##", sizeof($pasosReceta), $paginaReceta);
                
                $trozos = explode("##filaPasos##", $paginaReceta);
                $cuerpo = "";
                $aux = str_replace("##numeroPaso##", "NO HAY DATOS", $aux);
                $aux = str_replace("##contenidoPaso##", "", $aux);
                $cuerpo .= $aux;
            }
            $paginaReceta = $trozos[0] . $cuerpo . $trozos[2];
        }
        else 
        {
            if($pasosReceta != null){
                $paginaReceta = str_replace("##numPasos##", sizeof($pasosReceta), $paginaReceta);
                
                $trozos = explode("##fila##", $paginaReceta);
                $cuerpo = "";
                for($i=0;$i<sizeof($pasosReceta);$i++){
                    $aux = $trozos[1];
                    $aux = str_replace("##numero##", $pasosReceta[$i]["NUMERO_PASO"], $aux);
                    $aux = str_replace("##contenido##", $pasosReceta[$i]["EXPLICACION"], $aux);
                    $cuerpo .= $aux;
                }
            }
            else{
                $paginaReceta = str_replace("##numIngredientes##", "0", $paginaReceta);
    
                $paginaReceta = str_replace("##numPasos##", sizeof($pasosReceta), $paginaReceta);
                
                $trozos = explode("##filaPasos##", $paginaReceta);
                $cuerpo = "";
                $aux = str_replace("##numeroPaso##", "NO DATA", $aux);
                $aux = str_replace("##contenidoPaso##", "", $aux);
                $cuerpo .= $aux;
            }
            $paginaReceta = $trozos[0] . $cuerpo . $trozos[2];
        }

        $linkImagenes = "assets/img/recetas/";
        if($imagenesReceta != null){
            $paginaReceta = str_replace("##imagenPrincipal##", $linkImagenes.$imagenesReceta[0]["PATH"], $paginaReceta);
        }

        echo $paginaReceta;
    }

    /**
     * 
     */
    function vmostrarPerfilUsuario($header, $info, $recetas){
        // Obtener contenido
        $footer = file_get_contents("footer.html");
        $perfil = file_get_contents("plantillaPerfil.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

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
                $aux = str_replace("##idReceta##", $recetas[$i]["IDRECETA"], $aux);
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

    /**
     * 
     */
    function vmostrarListado($header,$categoria,$recetas){
        // Obtener contenido
        $footer = file_get_contents("footer.html");
        $listado = file_get_contents("plantillaListadoRecetas.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        // Sustituir cabecera y pie
        $listado= str_replace("##header##", $header, $listado);
        $listado = str_replace("##footer##", $footer, $listado);

        //Sustituir titulos de recetas
        $trozos = explode("##fila##", $header);
        $cuerpo = ""; 
        $aux = "";

        //Sustituir cosas propias de la pestaña
        $listado= str_replace("##categoria##", $categoria, $listado);
        $linkImagenes = "assets/img/recetas/";
        $trozos = explode("##filaListado##", $listado);
        $cuerpo = "";
        if($recetas != null){
            for($i=0;$i<sizeof($recetas);$i++){
                $aux = $trozos[1];
                $aux = str_replace("##nombreReceta##", $recetas[$i]["NOMBRE"], $aux);
                $aux = str_replace("##fecha##", $recetas[$i]["CREACION"], $aux);
                $aux = str_replace("##idReceta##", $recetas[$i]["IDRECETA"], $aux);

                $codigoBoton = '<a class="action" href="index.php?accion=mostrarReceta&receta='.$recetas[$i]["IDRECETA"].'"><i class="fa fa-arrow-circle-right" style="color: var(--white);"></i></a>';
                $aux = str_replace("##botonReceta##", $codigoBoton, $aux);

                $linkImagen = mobtenerImagenesReceta($recetas[$i]["IDRECETA"]);
                $aux = str_replace("##linkImagen##",  $linkImagenes . $linkImagen[1]["PATH"], $aux);
                $cuerpo .= $aux;
            }
        }else{
            $aux = $trozos[1];
            $aux = str_replace("##nombreReceta##", "Esta categoria aún no tiene ninguna receta, se el/la primer@ en crear una :)", $aux);
            $aux = str_replace("##fecha##", "", $aux);
            $aux = str_replace("##linkImagen##",  $linkImagenes . "imagenNoRecetas.jpg", $aux);
            $aux = str_replace("##botonReceta##", "", $aux);
            $cuerpo .= $aux;
        }
        echo $trozos[0] . $cuerpo . $trozos[2];
    }

    /**
     *
     */
    function vmostrarFormularioReceta($header, $categorias){
        $formulario = file_get_contents("plantillaFormularioReceta.html");
        $footer = file_get_contents("footer.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        $formulario = str_replace("##header##", $header, $formulario);
        $formulario = str_replace("##footer##", $footer, $formulario);

        //sustituir categorias
        $trozos = explode("##fila##", $formulario);
        $cuerpo = "";
        while($datos=$categorias->fetch_assoc()){
            $aux = $trozos[1];
            $aux = str_replace("##value##", $datos["NOMBRE"], $aux);
            $aux = str_replace("##categoria##", $datos["NOMBRE"], $aux);
            $cuerpo .= $aux;
        }
        echo $trozos[0] . $cuerpo . $trozos[2];
    }

    /**
     * 
     */
    function vmostrarImagenesReceta($header, $receta, $datosReceta, $imagenesReceta){
        // Obtener contenido
        $footer = file_get_contents("footer.html");
        $galeria = file_get_contents("plantillaGaleriaReceta.html");

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        // Sustituir cabecera y pie
        $galeria= str_replace("##header##", $header, $galeria);
        $galeria = str_replace("##footer##", $footer, $galeria);


        //Sustituir cosas propias de la pestaña
        $galeria= str_replace("##categoria##", $categoria, $galeria);
        $galeria = str_replace("##nombreReceta##", $datosReceta[0]["NOMBRE"], $galeria);
        $linkImagenes = "assets/img/recetas/";
        $trozos = explode("##filaGaleria##", $galeria);
        $cuerpo = "";
        if($imagenesReceta != null){
            for($i=0;$i<sizeof($imagenesReceta);$i++){
                $aux = $trozos[1];
                $aux = str_replace("##linkImagen##", $linkImagenes . $imagenesReceta[$i]["PATH"], $aux);
                $cuerpo .= $aux;
            }
        }else{
            $aux = $trozos[1];
            $aux = "NO HAY IMAGENES DISPONIBLES";
            $cuerpo .= $aux;
        }
        echo $trozos[0] . $cuerpo . $trozos[2];
    }

    /**
     * 
     */
    function vMostrarResultadosBusqueda($info){
        // Obtener contenido
        $busqueda = file_get_contents("buscar.html");

        //Sustituir titulos de recetas
        $trozos = explode("##fila##", $busqueda);
        $cuerpo = ""; 
        $aux = "";
        if($info != ""){
            for($i = 0; $i < sizeof($info); $i++){
                $aux = $trozos[1];
                $aux = str_replace("##nombrereceta##", $info[$i]["NOMBRE"], $aux);
                $cuerpo .= $aux;
            }
        }else{
            $aux = $trozos[1];
            $aux = str_replace("##nombrereceta##", "no hay", $aux);
            $cuerpo .= $aux;
        }

        echo $trozos[0] . $cuerpo . $trozos[2];
    }

    /**
     *
     */
    function vmodificarReceta($datos, $ingredientes, $pasos, $id, $categorias, $imagenes,$header){

        $formulario = file_get_contents("plantillaModificarReceta.html");
        $formulario = str_replace("##idReceta", $id, $formulario);
        $formulario = str_replace("##nombre##", $datos[0]["NOMBRE"], $formulario);

        //comprobar usuario
        $trozos = explode("##usuario##", $header);
        if(isset($_SESSION["userId"])){
            $trozos[2] = str_replace("##username##", $_SESSION["userName"], $trozos[2]);
            $header = $trozos[0] . $trozos[2] . $trozos[3];
        }else{
            $header = $trozos[0] . $trozos[1] . $trozos[3];
        }

        $formulario = str_replace("##header##", $header, $formulario);
        $footer = file_get_contents("footer.html");
        $formulario = str_replace("##footer##", $footer, $formulario);

        $trozos = explode("##fila##", $formulario);
        $cuerpo = "";

        //reemplazar categorias
        while($cat = $categorias->fetch_assoc()){
            $aux = $trozos[1];
            if($cat["NOMBRE"] == $datos[0]["CATEGORIA"]){
                $aux = str_replace("##categoria##", $cat["NOMBRE"], $aux);
                $aux = str_replace("##value##", $cat["NOMBRE"], $aux);
                $aux = str_replace("##selected##", "selected", $aux);
            }
            else{
                $aux = str_replace("##categoria##", $cat["NOMBRE"], $aux);
                $aux = str_replace("##value##", $cat["NOMBRE"], $aux);
                $aux = str_replace("##selected##", "", $aux);
            }
            $cuerpo .= $aux;
        }

        $file = $trozos[0] . $cuerpo . $trozos[2];
        $file = str_replace("##numIng##", sizeof($ingredientes), $file);
        $trozos = explode("##filaIngredientes##", $file);
        $cuerpo = "";

        //reemplazar ingredientes
        for($i = 0; $i < sizeof($ingredientes); $i++){
            $aux = $trozos[1];
            $aux = str_replace("##nombreIngrediente##", $ingredientes[$i]["NOMBRE"], $aux);
            $aux = str_replace("##cantidad##", $ingredientes[$i]["CANTIDAD"], $aux);
            $aux = str_replace("##idNomIng", "nomIngrediente" . ($i+1), $aux);
            $aux = str_replace("##idCant", "cantIngrediente" . ($i+1), $aux);
            $aux = str_replace("##idIngLabel", "labelNombre" . ($i+1), $aux);
            $aux = str_replace("##idCantLabel", "labelCantidad" . ($i+1), $aux);
            $aux = str_replace("##nameCant", "cantidad" . ($i+1), $aux);
            $aux = str_replace("##nameIng", "nombreIngrediente" . ($i+1), $aux);
            $cuerpo .= $aux;
        }

        $file =  $trozos[0] . $cuerpo . $trozos[2];

        $file = str_replace("##numPasos##", sizeof($pasos), $file);
        $trozos = explode("##filaPasos##", $file);
        $cuerpo = "";

        //reemplazar pasos
        for($i = 0; $i < sizeof($pasos); $i++){
            $aux = $trozos[1];
            $aux = str_replace("##paso##", $pasos[$i]["NUMERO_PASO"], $aux);
            $aux = str_replace("##exp##", $pasos[$i]["EXPLICACION"], $aux);
            $aux = str_replace("##idNumPaso", "numPaso" . ($i+1), $aux);
            $aux = str_replace("##idlabPaso", "labelPaso" . ($i+1), $aux);
            $aux = str_replace("##namePaso", "numPaso" . ($i+1), $aux);
            $aux = str_replace("##idExp", "explicacion" . ($i+1), $aux);
            $aux = str_replace("##idlabExp", "labelExplicacion" . ($i+1), $aux);
            $aux = str_replace("##nameExp", "explicacion" . ($i+1), $aux);
            $cuerpo .= $aux;
        }
        $file = $trozos[0] . $cuerpo . $trozos[2];

        $trozos = explode("##filaImg##", $file);
        $cuerpo = "";
        if($imagenes != null){      // puede que no se hayan subido imágenes
            for($i = 0; $i < sizeof($imagenes); $i++){
                $aux = $trozos[1];
                $aux = str_replace("##ruta##", "assets/img/recetas/" . $imagenes[$i]["PATH"], $aux);
                $cuerpo .= $aux;
            }
        }else{
            $aux = $trozos[1];
            $aux = str_replace("##ruta##", "La receta no tiene imágenes", $aux);
            $cuerpo .= $aux;
        }
        echo $trozos[0] . $cuerpo . $trozos[2];
    }
?>
