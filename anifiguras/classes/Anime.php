<?PHP 
class Anime {
    protected $id;
    protected $anime;
    protected $descripcion_anime; 
    protected $imagen; 
    protected $fecha; 


    public function lista_completa(): array
    {
 
        $resultado = [];

        $conexion = (new Conexion())->getConnected();
        $consulta = "SELECT * FROM anime";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    public function getId()
    {
        return $this->id;
    }


    public function get_id(int $id): ?Anime
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "SELECT * FROM anime WHERE `id` = $id";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }


    public function getAnime()
    {
        return $this->anime;
    }

    public function getDescripcionAnime()
    {
        return $this->descripcion_anime;
    }
    
    public function getImagen()
    {
        return $this->imagen;
    }

    public function getFecha()
    {
        return $this->fecha;
    }


    public function insert($anime, $descripcion_anime, $imagen, $fecha)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "INSERT INTO `anime` VALUES (NULL, :anime, :descripcion_anime, :imagen, :fecha)";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(
            [  'anime'=> $anime,
            'descripcion_anime'=> $descripcion_anime, 
            'imagen'=> $imagen,
            'fecha'=> $fecha,
            ]

        );

    }

    public function edit($anime, $descripcion_anime, $fecha, $id)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "UPDATE `anime` SET anime = :anime, descripcion_anime = :descripcion_anime, fecha = :fecha WHERE id = :id";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(
            [  'id'=> $id,
             'anime'=> $anime,
            'descripcion_anime'=> $descripcion_anime, 
            'fecha'=> $fecha
            ]

        );

    }

    public function reemplazar_imagen($imagen, $id)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "UPDATE `anime` SET imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(
            [
                'id' => $id,
                'imagen' => $imagen
            ]
        );
    }

    public function delete()
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "DELETE FROM `anime` WHERE id = ?";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute([$this->id]);
    }
}