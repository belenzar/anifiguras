<?PHP 

class Conexion {
    protected const DB_SERVER = 'localhost';
    protected const DB_USER = 'root';
    protected const DB_PASS = '';
    protected const DB_NAME = 'anifiguras';

    public const DB_DSN = 'mysql:host='. self::DB_SERVER .';dbname='. self::DB_NAME.';charset-utf8mb4';

    protected PDO $dBase;

    public function __construct(){
        try {
           $this->dBase = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
        } catch (Exception $e) {
        
            die; /* Se puede poner un mensaje dentro del die () entre "*/
        }
    }
    
    public function getConnected():  PDO{
        return $this->dBase;
    }
}

?>