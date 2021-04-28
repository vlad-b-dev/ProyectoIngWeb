<?php
    require "DBConexion.class.php";
    function mseleccionarDatosReceta(){

        $conexion = DBConexion::getInstance();
        $consulta = "select * from RECETA where IDRECETA = 2";
        if($resultado=$conexion->query($consulta))
        {
               return $resultado;
        }
    }
?>