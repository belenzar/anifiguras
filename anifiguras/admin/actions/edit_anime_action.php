<?PHP
 require_once "../../functions/autoload.php";

 $postData = $_POST;
 $id = $_GET['id'] ?? FALSE;
 $fileData = $_FILES['imagen'] ?? FALSE;

 try {

    $anime = new Anime();
    if (!empty($fileData['tmp_name'])) {
        $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/anime/", $fileData);
        $anime->reemplazar_imagen($imagen, $id);
    }
    $anime->edit($postData['nombre'], $postData['descripcion'], $postData['fecha'], $id);
    header('Location: ../index.php?sec=admin_anime');
} catch (\Exception $e) {
    die("No se pudo cargar el personaje");
}