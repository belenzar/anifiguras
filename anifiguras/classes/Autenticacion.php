<?PHP 

class Autenticacion{



    public function log_in(string $usuario, string $password) {

        $datosUsuario = (new Usuario())->usuario_x_username($usuario);

        if (password_verify($password, $datosUsuario->getPassword())){
             
            $datosLogin['username'] = $datosUsuario->getNombre_usuario();
            $datosLogin['id'] = $datosUsuario->getId();
            $datosLogin['rol'] = $datosUsuario->getRol();
            $_SESSION['loggedIn'] = $datosLogin; 
            return $datosLogin['rol'];
        } else {
            echo"<p>intruso</p>";
            return NULL;
        }

    }

    public function log_out(){
        if (isset($_SESSION['loggedIn'])){
            unset($_SESSION['loggedIn']);
        };
    }

    public function verify()
    {
        if (isset($_SESSION['loggedIn'])){

            return true;
        }else{
            header('location: index.php?sec=login');
        }
    }
}

?>