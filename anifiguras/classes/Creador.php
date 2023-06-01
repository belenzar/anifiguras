<?PHP 
class Creador {
    protected $id;
    protected $nombre;
    protected $biografia; 
    protected $foto_perfil;

    public function lista_completa(): array
    {
 
        $resultado = [];

        $conexion = (new Conexion())->getConnected();
        $consulta = "SELECT * FROM creador";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }


    public function get_id(int $id): ?Creador
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "SELECT * FROM creador WHERE id = $id";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }


    public function getNombre_completo()
    {
        return $this->nombre;
    }


    public function getBiografia()
    {
        return $this->biografia;
    }


    public function getFoto_perfil()
    {
        return $this->foto_perfil;
    }

    public function getId()
    {
        return $this->id;
    }
}


