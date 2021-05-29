<?php
/**
 * Class DBConexion
 *
 * Seguimos el patrón Singleton pues realmente solo interesa
 * que haya una única instancia de la base de datos. Esto nos
 * permite conectarnos a la base de datos en cualquier punto
 * del código sin necesidad de crear más conexiones o tener
 * que pasarla por parámetro.
 */
class DBConexion {

    private $servidor="localhost";
    private $usuario="root";
    private $password=" ";
    private $base_datos="db_groupdelta";

    private $conexion;

    static $_instancia;

    /**
     * DBConexion constructor.
     */
    private function __construct()
    {
        $this->conectar();
    }


    /**
     * @return DBConexion
     *
     * Función encargada de crear, si es necesario, el objeto.
     * Esta es la función que debemos llamar desde fuera de la
     * clase para instanciar el objeto, y así, poder utilizar sus métodos.
     */
    public static function getInstance(){
        if (!(self::$_instancia instanceof self)){
            self::$_instancia = new self();
        }
        return self::$_instancia;
    }

    /**
     *
     * Realizar la conexión con la base de datos.
     */
    private function conectar(){
        //$conexion = mysqli_connect("dbserver","grupo11", "ailieWei2S","db_grupo11"); // nube
        $this->conexion = mysqli_connect($this->servidor,$this->usuario, $this->password,$this->base_datos); // local

        // Comprobar si ha ido mal la conexión
        if(mysqli_connect_errno()){
            echo "ha ido  mal" . mysqli_connect_error();
            exit();
        }
    }

    /**
     * @param $consulta
     * Método para hacer queries seguras
     */
    public function prepare($consulta){
        return $this->conexion->prepare($consulta);
    }

    /**
     * @param $consulta
     * @return bool|resource
     *
     * Método para ejecutar una sentencia sql
     */
    public function ejecutar($consulta){
        $consulta->execute();
    }

    /**
     * @param $consulta
     * @return bool|resource
     *
     * Método para obtener resultados de un select
     */
    public function obtener_resultados($consulta){
        return $consulta->get_result();
    }

    /*Método para obtener una fila de resultados de la sentencia sql*/
    /**
     * @param $resultado
     * @return array|false
     */
    public function obtener_filas($resultado){
        $i = 0;
        if($resultado != null){
            while($datos = $resultado->fetch_assoc()){
                $datos_resultado[$i] = $datos;
                $i = $i + 1;
            }
            return $datos_resultado;
        }else{
            return null;
        }
       
    }
}

?>
