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

    function mobtenerInfoUsuario(){
        //$id = 7;
        //$conexion = DBConexion::getInstance();
        /*$conexion = mysqli_connect("localhost", "root", "", "practica_final");
        $consulta = "SELECT NOMBRE, CORREO FROM USUARIO WHERE IDUSUARIO = " .$id;
        echo $consulta;
        $resultados = $conexion->query($consulta);
        print_r($resultados);
        return $resultados;*/
    }

    function mobtenerRecetasUsuario($id){

    }
?>