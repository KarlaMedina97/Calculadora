<?php
/**
 * Description of Conexion
 *
 * 
 */
class Conexion extends PDO{
    private static $instancia=null;
    private $host="ec2-34-198-186-145.compute-1.amazonaws.com";
    private $userName="artjpzwsplviqj";
    private $password=getenv('CALCULADORA_DB_PASSWORD') ?: '';
    private $dataBase = "db9m5c4ioomblq";
    
    /**
     * conexión a base de datos.
     */
    public function __construct(){
        try{
           parent::__construct("mysql:host={$this->host};dbname={$this->dataBase}",
              $this->userName, $this->password);
          $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $ex) {
           echo $ex->getMessage();
        }
    }
    
    public static function singleton(){
        if (!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
}