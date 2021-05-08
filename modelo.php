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
        echo $nombre;
        echo $email;
        echo $password;

        // Conexión a la base de datos
        $conexion = DBConexion::getInstance();

        // Realizar la consulta
        $sql = "INSERT INTO USUARIO (NOMBRE,CORREO,PASSWORD) VALUES (?,?,?)";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('sss', $nombre, $email, $password);
        $conexion->ejecutar($sql_prepared);

        // Confirmar registro y llevar a la cuenta
        echo "<script>
            alert('Usuario registrado');
            location.href ='index.php?accion=perfil&id=1';
        </script>";
    }

    /**
     * 
     */
    function mobtenerInfoUsuario(){
        $id = 1;
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
        $id = 1;
        //$id = 1;
        $conexion = DBConexion::getInstance();
        $sql = "SELECT NOMBRE, CATEGORIA, CREACION FROM RECETA WHERE IDUSUARIO = ?";
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $id);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        if($resultado->num_rows > 1){
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
        $sql = "DELETE FROM RECETA WHERE NOMBRE = ? AND CATEGORIA = ?";
        //$sql_prepared = $conexion->prepare($sql);
        //$sql_prepared->bind_param('ss', $receta, $categoria);
        //$conexion->ejecutar($sql_prepared);
        echo "<script>
        location.href ='index.php?accion=perfil&id=1';
        </script>";
    }

    /**
     * 
     */
    function mobtenerListadoRecetas($categoria){
        $conexion = DBConexion::getInstance();
        $sql = "SELECT DISTINCT R.NOMBRE, R.IDRECETA, R.CREACION, F.PATH FROM RECETA R, FOTO F  WHERE CATEGORIA = ?";
       /* $sql = "SELECT RECETA.NOMBRE, RECETA.IDRECETA, FOTO.PATH
  FROM RECETA
  LEFT
  JOIN FOTO
    ON FOTO.IDRECETA = RECETA.IDRECETA
   AND FOTO.IDFOTO =
        ( SELECT TOP 1
                 IDFOTO
            FROM FOTO
           WHERE FOTO.IDRECETA = RECETA.IDRECETA
       )
";*/

        
        $sql_prepared = $conexion->prepare($sql);
        $sql_prepared->bind_param('s', $categoria);
        $conexion->ejecutar($sql_prepared);
        $resultado = $conexion->obtener_resultados($sql_prepared);
        if($resultado->num_rows > 1){
            $datos = $conexion->obtener_filas($resultado);
            return $datos;
        }else{
            return null;
        }
    }
?>