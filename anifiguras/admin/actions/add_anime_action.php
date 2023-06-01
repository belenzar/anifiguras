<?PHP
 require_once "../../functions/autoload.php";

 $postData = $_POST;
 $fileData = $_FILES['imagen'] ?? FALSE;
 //$id = $_GET['id'] ?? FALSE;

 try {
   $imagen  = (new Imagen())->subirImagen(__DIR__ . "/../../img/anime/", $fileData);

   (new Anime())->insert(
    $postData['nombre'],
    $postData['descripcion'],
    $postData['fecha'],
    $postData['nombre'],
    $imagen);


header('Location: ../index.php?sec=admin_anime');
   /* (new Anime())->insert($postData['nombre'], $postData['descripcion'], $postData['fecha'], "");
    header('Location: ../index.php?sec=admin_anime');*/
} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo cargar el anime");
}

