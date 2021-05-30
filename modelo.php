<?php
    include "DBConexion.php";

    /**
     * @param tipo 
     */
    function mseleccionarCategoria($tipo){
        // Conexión a la base de datos
        $conexion = DBConexion::getInstance();

        // Realizar la consulta
        $sql = "SELECT NOMBRE FROM CATEGORIA WHERE TIPO = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $tipo);
        $conexion->ejecutar($sql_prepared);                            
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);
        return $datos;
    }

    /**
     * 
     */
    function mseleccionarDatosReceta(){
        //$conexion = DBConexion::getInstance();
        $conexion = mysqli_connect("localhost","root","","db_groupdelta");
        $consulta = "select * from RECETA where IDRECETA = 2";
        if($resultado=$conexion->query($consulta))
        {
            while($datos = $resultado->fetch_assoc()){
                return $datos;
            }
        }
    }

    /**
     * 
     */
    function mlogearUsuario(){
        // Obtener los datos del formulario de login
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Conexión a la base de datos
        $conexion = DBConexion::getInstance();

        // Realizar la consulta
        $sql = "SELECT * FROM USUARIO WHERE CORREO = ? AND PASSWORD = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('ss', $email, $password);
        $conexion->ejecutar($sql_prepared);                            
        $resultado = $conexion->obtener_resultados($sql_prepared);      /// para insert, delete, update no hace falta
        $datos = $conexion->obtener_filas($resultado);
    
        // Si hay algún usuario con esos datos, le lleva a su cuenta
        if($datos == null){              /// para insert, delete, update no hace falta
            echo "<script>
                alert('Usuario no encontrado');
                location.href ='index.php?accion=login&id=1';
            </script>";
        }else{
            session_abort();
            session_start();
            $_SESSION["userId"] = $datos[0]["IDUSUARIO"];
            $_SESSION["userName"] = $datos[0]["NOMBRE"];
            echo "<script>
                alert('Usuario registrado');
                location.href ='index.php?accion=perfil&id=1';
            </script>";
        }
    }
    
    /**
     * 
     */
    function mRegistrarUsuario(){
        // Obtener los datos del formulario de login
        $nombre = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Conexión a la base de datos
        $conexion = DBConexion::getInstance();

        // Realizar la consulta
        $sql = "INSERT INTO USUARIO (NOMBRE,CORREO,PASSWORD) VALUES (?,?,?)";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('sss', $nombre, $email, $password);
        $conexion->ejecutar($sql_prepared);

        $sql = "SELECT MAX(IDUSUARIO) ID FROM USUARIO";
        $sql_prepared = $conexion->prepare($sql);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);

        session_abort();
        session_start();
        $_SESSION["userId"] = $datos[0]["ID"];

        $sql = "SELECT NOMBRE FROM USUARIO WHERE IDUSUARIO = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $resultado[0]["ID"]);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);

        $_SESSION["userName"] = $datos[0]["NOMBRE"];

        // Confirmar registro y llevar a la cuenta
        echo "<script>
            location.href ='index.php?accion=perfil&id=1';
        </script>";
    }

    /**
     * 
     */
    function mobtenerInfoUsuario(){
        $id = $_SESSION["userId"];
        $conexion = DBConexion::getInstance();
        $sql = "SELECT NOMBRE, CORREO FROM USUARIO WHERE IDUSUARIO = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $id);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);
        return $datos;
    }

    /**
     * 
     */
    function mobtenerRecetasUsuario(){
        $id = $_SESSION["userId"];
        $conexion = DBConexion::getInstance();
        $sql = "SELECT IDRECETA, NOMBRE, CATEGORIA, CREACION FROM RECETA WHERE IDUSUARIO = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $id);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        if($resultado->num_rows >= 1){
            $datos = $conexion->obtener_filas($resultado);
            return $datos;
        }else{
            return null;
        }
    }

    /**
     * 
     */
    function meliminarReceta($receta, $categoria){
        $conexion = DBConexion::getInstance();

        // Eliminar los pasos
        $sql = "DELETE FROM PASOS WHERE IDRECETA = (SELECT DISTINCT RECETA.IDRECETA
                                                    FROM PASOS, RECETA
                                                    WHERE PASOS.IDRECETA=RECETA.IDRECETA AND RECETA.NOMBRE = ? AND RECETA.CATEGORIA = ?)";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('ss', $receta, $categoria);
        $conexion->ejecutar($sql_prepared);

        // Eliminar los ingredientes
        $sql = "DELETE FROM INGREDIENTES WHERE IDRECETA = (SELECT DISTINCT RECETA.IDRECETA
                                                            FROM INGREDIENTES, RECETA
                                                            WHERE INGREDIENTES.IDRECETA=RECETA.IDRECETA AND RECETA.NOMBRE = ? AND RECETA.CATEGORIA = ?)";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('ss', $receta, $categoria);
        $conexion->ejecutar($sql_prepared);

        // Eliminar fotos
        $sql = "DELETE FROM FOTO WHERE IDRECETA = (SELECT DISTINCT RECETA.IDRECETA
                                                    FROM FOTO, RECETA
                                                    WHERE FOTO.IDRECETA=RECETA.IDRECETA AND RECETA.NOMBRE = ? AND RECETA.CATEGORIA = ?)";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('ss', $receta, $categoria);
        $conexion->ejecutar($sql_prepared);

        // Eliminar la receta
        $sql = "DELETE FROM RECETA WHERE NOMBRE = ? AND CATEGORIA = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('ss', $receta, $categoria);
        $conexion->ejecutar($sql_prepared);

        echo "<script>
        location.href ='index.php?accion=perfil&id=1';
        </script>";
    }

    /**
     * 
     */
    function mobtenerListadoRecetas($categoria){
        $conexion = DBConexion::getInstance();
        $sql = "SELECT  R.NOMBRE, R.IDRECETA, R.CREACION FROM RECETA R WHERE CATEGORIA = ?";
        
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $categoria);
        
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        if($resultado->num_rows >= 1){
            $datos = $conexion->obtener_filas($resultado);
            return $datos;
        }else{
            return null;
        }
    }

    /**
     * 
     */
    function mobtenerImagenesReceta($idReceta){
        $conexion = DBConexion::getInstance();
        $sql = "SELECT F.PATH FROM FOTO F WHERE F.IDRECETA = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('i', $idReceta);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);
        return $datos;
    }

    /**
     *
     */
    function mobtenerCategorias(){
        $conexion = DBConexion::getInstance();
        $sql = "SELECT NOMBRE FROM CATEGORIA";
        $sql_prepared = $conexion->prepare($sql);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        return $resultado;
    }

    /**
     *
     */
    function minsertarReceta(){
        $conexion = DBConexion::getInstance();

        // Obtener los datos del formulario
        $nombreReceta = $_POST["nombreReceta"];
        $categoria = $_POST["categoria"];
        $idUsuario = $_SESSION["userId"];
        $fecha = date('Y-m-d');

        // Datos de las imágenes
        $ficherotmp = $_FILES['file']['tmp_name'];              
        $nombreArchivo = $_FILES['file']['name']; 

        //Insertar en RECETA[idreceta, categoria, idusuario, nombre, creacion]
        $sql = "INSERT INTO RECETA (CATEGORIA, IDUSUARIO, NOMBRE, CREACION) VALUES (?, ?,?, ?)";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('ssss', $categoria, $idUsuario, $nombreReceta, $fecha);
        $conexion->ejecutar($sql_prepared);

        //Obtener IDRECETA
        $sql = "SELECT MAX(IDRECETA) ID FROM RECETA";
        $sql_prepared = $conexion->prepare($sql);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $idReceta = $resultado->fetch_assoc()["ID"];

        //Insertar en INGREDIENTES[idreceta, nombre, cantidad]
        /*$numIngredientes = $_POST["numIngredientes"];
        for($i = 1; $i <= $numIngredientes; $i++){
            $nombreIngrediente = $_POST["nombreIngrediente".$i];
            $cantidad = $_POST["cantidad".$i];
            $sql = "INSERT INTO INGREDIENTES  VALUES (?, ?, ?)";
            $sql_prepared = $conexion->prepare($sql);
            $sql_prepared->bind_param('sss', $idReceta, $nombreIngrediente, $cantidad);
            $conexion->ejecutar($sql_prepared);
        }

        //Insertar en PASOS[idreceta, num_paso, explicacion]
        $numPasos = $_POST["numPasos"];
        for($i=1; $i <= $numPasos; $i++){
            $numPaso = $_POST["numPaso".$i];
            $explicacion = $_POST["explicacion".$i];
            
            $sql = "INSERT INTO PASOS  VALUES (?, ?, ?)";
            $sql_prepared = $conexion->prepare($sql);
            $sql_prepared->bind_param('sss', $idReceta, $numPaso, $explicacion);
            $conexion->ejecutar($sql_prepared);
        }*/

        // Insertar imágenes
        $sql = "SELECT MAX(IDFOTO) AS ULTIMO FROM FOTO";
        $sql_prepared = $conexion->prepare($sql);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);

        // Renombrar imagen
        $archivo_extension = "";
        $ruta = "assets/img/recetas/";
        $nuevoNombre = $datos[0]["ULTIMO"] + 1;
        $archivo_extension = "imagen" . $nuevoNombre . '.jpg';            
        $ruta = $ruta . $archivo_extension;       

        // Mover a la carpeta img/
        if(move_uploaded_file($ficherotmp, $ruta)){
            // Realizar consulta de inserción
            $sql = "INSERT INTO FOTO VALUES(?, ?,?)";
            $sql_prepared = $conexion->prepare($sql);
            $sql_prepared->bind_param('sss', $nuevoNombre, $idReceta, $archivo_extension);
            $conexion->ejecutar($sql_prepared);
        }

        // Volver al perfil
        echo "<script>
            location.href ='index.php?accion=perfil&id=1';
            </script>";
    }

    /**
     * 
     */
    function mbuscarRecetas($info){
        $conexion = DBConexion::getInstance();

        $sql = "SELECT NOMBRE 
                FROM RECETA 
                WHERE NOMBRE LIKE CONCAT('%',?,'%')";

        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $info);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);

        return $datos;
    }

    /**
     *
     */
    function mobtenerDatosReceta($id){
        $conexion = DBConexion::getInstance();

        $sql = "SELECT NOMBRE, CATEGORIA FROM RECETA WHERE IDRECETA = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $id);

        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);
        return $datos;
    }

    /**
     * 
     */
    function mobtenerIngredientesReceta($id){
        $conexion = DBConexion::getInstance();

        $sql = "SELECT NOMBRE, CANTIDAD FROM INGREDIENTES WHERE IDRECETA = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $id);

        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);

        return $datos;
    }

    /**
     * 
     */
    function mobtenerPasosReceta($id){
        $conexion = DBConexion::getInstance();

        $sql ="SELECT NUMERO_PASO, EXPLICACION FROM PASOS WHERE IDRECETA = ? ORDER BY NUMERO_PASO";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $id);

        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        $datos = $conexion->obtener_filas($resultado);

        return $datos;
    }

    /**
     * 
     */
    function mmodificarReceta($datos, $ingredientes, $pasos, $id){
        // Obtener los nuevos datos
        print_r($ingredientes);
        print_r($pasos);
        $nombreNuevaReceta = $_POST["nombreReceta"];
        $nuevaCategoria = $_POST["categoria"];
        $numIngredientes = $_POST["numIngredientes"];
        $numPasos = $_POST["numPasos"];

        $conexion = DBConexion::getInstance();

        // Actualizar la tabla receta
        if($datos[0]["NOMBRE"] != $nombreNuevaReceta){
            $sql = "UPDATE RECETA SET NOMBRE = ? WHERE IDRECETA = ?";
            $sql_prepared = $conexion->prepare($sql);
            $sql_prepared->bind_param('ss', $nombreNuevaReceta, $id);
            $conexion->ejecutar($sql_prepared);
        }

        if($datos[0]["CATEGORIA"] != $nuevaCategoria){
            $sql = "UPDATE RECETA SET CATEGORIA = ? WHERE IDRECETA = ?";
            $sql_prepared = $conexion->prepare($sql);
            $sql_prepared->bind_param('ss', $nuevaCategoria, $id);
            $conexion->ejecutar($sql_prepared);
        }

        // Actualizar la tabla con los pasos
        for($i = 0; $i <$numPasos; $i++){
            // Ir obteniendo los pasos
            $explicacion = $_POST["explicacion".($i+1)];

            if($explicacion != $pasos[$i]["EXPLICACION"]){
                $sql = "UPDATE PASOS SET EXPLICACION = ? 
                    WHERE IDRECETA = ? AND NUMERO_PASO = ?";
                $sql_prepared = $conexion->prepare($sql);
                $sql_prepared->bind_param('sss', $explicacion, $id, $pasos[$i]["NUMERO_PASO"]);
                $conexion->ejecutar($sql_prepared);
            }
        }

        // Actualizar la tabla con los ingredientes
        for($i = 0; $i < sizeof($ingredientes); $i++){
            // Ir obteniendo los ingredientes
            $nombreIngrediente = $_POST["nombreIngrediente".($i+1)];
            $cantidad = $_POST["cantidad".($i+1)];

            if($nombreIngrediente != $ingredientes[$i]["NOMBRE"]){
                $sql = "UPDATE INGREDIENTES SET NOMBRE = ? 
                    WHERE IDRECETA = ? AND NOMBRE = ?";
                $sql_prepared = $conexion->prepare($sql);
                $sql_prepared->bind_param('sss', $nombreIngrediente, $id, $ingredientes[$i]["NOMBRE"]);
                $conexion->ejecutar($sql_prepared);
            }

            if($cantidad != $ingredientes[$i]["CANTIDAD"]){
                $sql = "UPDATE INGREDIENTES SET CANTIDAD = ? 
                    WHERE IDRECETA = ? AND NOMBRE = ? AND CANTIDAD = ?";
                $sql_prepared = $conexion->prepare($sql);
                $sql_prepared->bind_param('ssss', $cantidad, $id, $ingredientes[$i]["NOMBRE"], $ingredientes[$i]["CANTIDAD"]);
                $conexion->ejecutar($sql_prepared);
            }
        }

        echo "<script>
                location.href ='index.php?accion=perfil&id=1';
            </script>";

    }
?>
