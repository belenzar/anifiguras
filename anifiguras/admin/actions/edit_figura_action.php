<?PHP
 require_once "../../functions/autoload.php";

 $postData = $_POST;
 $fileData = $_FILES['imagen'] ?? FALSE;
 $id = $_GET['id'] ?? FALSE;

 echo "<pre>";
 print_r($postData);
 echo"</pre>";

 try {

    $figura = new Figura();

    $figura->clear_anime($id);
    if (isset($postData['anime_extra'])) {
      foreach ($postData['anime_extra'] as $anime_id) {
          $figura->add_anime($id, $anime_id);
      }
  }


    if(!empty($fileData['tmp_name'])){
       if (!empty($postData['imagen'])){
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/portada/". $postData['imagen']);
        }

          $imagen = (new Imagen())->subirImagen(__DIR__ . "/../../img/portada/", $fileData);
          $figura->reemplazar_imagen($imagen, $id);
        }

  

   $figura->edit(
    $postData['nombre'],
    $postData['anime_id'],
    $postData['creador_id'],
    $postData['ilustrador_id'],
    $postData['fecha_anime'],
    $postData['descripcion'],
    $postData['empresa'],
    $postData['precio'],
    $id
    );


header('Location: ../index.php?sec=admin_figura');

} catch (\Exception $e) {
    die("No se pudo cargar el anime");
}
