<?php
    include "DBConexion.php";

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
        
        // Si hay algún usuario con esos datos, le lleva a su cuenta
        if($datos = $conexion->obtener_filas($resultado)){              /// para insert, delete, update no hace falta
            echo "<script>
                alert('Usuario registrado');
            </script>";
            // Llevar a la cuenta
        }else{
            echo "<script>
                alert('Usuario no encontrado');
                location.href ='index.php?accion=login&id=1';
            </script>";
        }
    }

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
        </script>";
    }
?>