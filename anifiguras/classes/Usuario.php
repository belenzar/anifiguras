<?PHP 

class Usuario{
    protected $id;
    protected $correo;
    protected $nombre_usuario; 
    protected $nombre_completo;
    protected $password;
    protected $rol;

    /**
     * @param string
    */
    
    public function usuario_x_username(string $username): ?Usuario {
       
    $conexion = (new Conexion())->getConnected();
    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario = ?";

    $PDOStatement = $conexion->prepare($consulta);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute([$username]);

    $result = $PDOStatement->fetch();
    
    if(!$result){
       return null;
    }
    return $result;
}

public function getPassword()
{
    return $this->password;
}
    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    public function getNombre_completo()
    {
        return $this->Nombre_completo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRol()
    {
        return $this->rol;
    }
    



}

?>