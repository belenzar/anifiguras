<?PHP 

class Figura{
   protected $id;
   protected $nombre;
   protected $fecha_anime; 
   protected $anime_id;
   protected $creador_id;
   protected $ilustrador_id;
   protected $anime_extra;
   protected $empresa;
   protected $descripcion;
   protected $imagen;
   protected $precio;

protected $createValues = ['id', 'nombre','fecha_anime','anime_id','creador_id','ilustrador_id','empresa','descripcion','imagen','precio'];


   public function createFigura($figuraData): Figura
   {

    $figura = new self();
    foreach ($this->createValues as $value){
        $figura->{$value} = $figuraData[$value];
    }

    $PSIds = explode(",", $figuraData['anime_extra']);
    $anime_extra = [];
    if (!empty($PSIds[0])) {
        foreach ($PSIds as $PSId) {
            $anime_extra[] = (new Anime())->get_id(intval($PSId));
        }
    }
    $figura->anime_extra = $anime_extra;

    return $figura;
   }
   /**
    * Me trae todas las figuras que tengo en stock
    */
   public function figurasTotal(): array{

    $resultado = [];

     $conexion = (new Conexion())->getConnected();
     $consulta = "SELECT figuras.*, GROUP_CONCAT(tags_anime.anime_id) AS anime_extra FROM figuras LEFT JOIN tags_anime ON tags_anime.figura_id = figuras.id GROUP BY figuras.id";

     $PDOStatement = $conexion->prepare($consulta);
     $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
     $PDOStatement->execute();

     while ($result = $PDOStatement->fetch()) {
        $resultado[] = $this->createFigura($result); 
     }
     
     return $resultado;
   }


   /*Función que me separa las figuras por Animé*/
   public function figuraAnime(int $anime): array{
      $figuras = [];

      $conexion = (new Conexion())->getConnected();
      $consulta = "SELECT * FROM figuras WHERE anime_id = $anime";
 
      $PDOStatement = $conexion->prepare($consulta);
      $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
      $PDOStatement->execute();

      $figuras = $PDOStatement->fetchAll();

 
      return $figuras;

   }



   /*Función que me trae una figura en particular */

   public function figuraId($idFigura): ?Figura {
      
      $conexion = (new Conexion())->getConnected();
      $consulta = "SELECT figuras.*, GROUP_CONCAT(tags_anime.anime_id) AS anime_extra FROM figuras LEFT JOIN tags_anime ON tags_anime.figura_id = figuras.id WHERE figuras.id = :idFigura GROUP BY figuras.id";

   
 
      $PDOStatement = $conexion->prepare($consulta);
      $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
      $PDOStatement->execute(["idFigura" => $idFigura]);

      $result = $PDOStatement->fetch();
      
      if(!$result){
         return null;
      }
      return $result;
   }

   /*Función que me trae las primeras 15 palabras de las características */

   public function caracteristicaCorta(int $palabras = 15): string{
      $parrafo = $this->descripcion;
     
      $array = explode(" ", $parrafo);
      if(count($array)<=$palabras){
          $resultado = $parrafo;
      } else {
          array_splice($array, $palabras);
          $resultado = implode(" ", $array). "...";
      }
      return $resultado;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFecha_anime()
    {
        return $this->fecha_anime;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCreador()
    {
        $creador = (new Creador())->get_id($this->creador_id);
        $nombreCreador = $creador->getNombre_completo();
        return $nombreCreador;
    }

    public function getIlustrador()
    {
        $Ilustrador = (new Ilustrador())->get_ilustrador($this->ilustrador_id);
        $nombreIlustrador = $Ilustrador->getNombre();
        return $nombreIlustrador;
    }

    public function getAnime()
    {
        $anime = (new Anime())->get_id($this->anime_id);
        $nombreAnime = $anime->getAnime();
        return $nombreAnime;
    }

    public function getCreador_id()
    {
        return $this->creador_id;
    }

    public function getIlustrador_id()
    {
        return $this->ilustrador_id;
    }

    public function getAnime_id()
    {
        return $this->anime_id;
    }

    public function getEmpresa_id()
    {
        return $this->empresa;
    }

    public function getAnime_extra()
    {
        return $this->anime_extra;
    }

    public function getAnime_ids() :array
    {
        $result = [];
        foreach ($this->anime_extra as $value) {
            $result[] = intval($value->getId());
        }
        return $result;
    }

    public function insert($nombre, $anime_id, $creador_id, $ilustrador_id, $fecha_anime, $descripcion, $imagen, $empresa, $precio)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "INSERT INTO `figuras` VALUES (NULL, :nombre, :anime_id, :creador_id, :ilustrador_id, :fecha_anime, :descripcion, :imagen, :empresa, :precio)";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(
            [  'nombre'=> $nombre,
            'anime_id'=> $anime_id, 
            'creador_id'=> $creador_id,
            'ilustrador_id'=> $ilustrador_id,
            'fecha_anime'=> $fecha_anime,
            'descripcion'=> $descripcion,
            'imagen'=> $imagen,
            'empresa'=> $empresa,
            'precio'=> $precio,
            ]

        );
       
       return $conexion->lastInsertId();

    }

    public function edit($nombre, $anime_id, $creador_id, $ilustrador_id, $fecha_anime, $descripcion, $empresa, $precio, $id)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "UPDATE `figuras` SET nombre = :nombre, anime_id = :anime_id, creador_id = :creador_id, ilustrador_id = :ilustrador_id, fecha_anime = :fecha_anime, descripcion = :descripcion, empresa = :empresa, precio = :precio WHERE id = :id";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(

            [  
            'id'=> $id,
            'nombre'=> $nombre,
            'anime_id'=> $anime_id, 
            'creador_id'=> $creador_id,
            'ilustrador_id'=> $ilustrador_id,
            'fecha_anime'=> $fecha_anime,
            'descripcion'=> $descripcion,
            'empresa'=> $empresa,
            'precio'=> $precio,
            ]

        );

    }

    public function reemplazar_imagen($imagen, $id)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "UPDATE `figuras` SET imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(
            [
                'id' => $id,
                'imagen' => $imagen
            ]
        );
    }

    public function add_anime($figura_id, $anime_id)
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "INSERT INTO `tags_anime` VALUES (NULL, :figura_id, :anime_id)";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute(
            [
                'figura_id' => $figura_id,
                'anime_id' => $anime_id
            ]
        );
    }

    public function clear_anime($figura_id)
    {
        $conexion = (new Conexion())->getConnected();
        $query = "DELETE FROM `tags_anime` WHERE figura_id = :figura_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'figura_id' => $figura_id
            ]
        );
    }

    public function delete()
    {
        $conexion = (new Conexion())->getConnected();
        $consulta = "DELETE FROM `figuras` WHERE id = ?";

        $PDOStatement = $conexion->prepare($consulta);
        $PDOStatement->execute([$this->id]);
    }

   }
?>

