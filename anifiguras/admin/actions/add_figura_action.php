<?PHP
 require_once "../../functions/autoload.php";

 $postData = $_POST;
 $fileData = $_FILES['imagen'] ?? FALSE;
 $id = $_GET['id'] ?? FALSE;

 try {

  $figura = new Figura();


  $imagen  = (new Imagen())->subirImagen(__DIR__ . "/../../img/portada/", $fileData);

   $idFigura = $figura->insert
   ( $postData['nombre'],
   $postData['anime_id'],
   $postData['creador_id'],
   $postData['ilustrador_id'],
   $postData['fecha_anime'],
   $postData['descripcion'],
   $postData['empresa'],
   $imagen,
   $postData['precio']
  );

  if (isset($postData['anime_extra'])) {
    foreach ($postData['anime_extra'] as $anime_id) {
        $figura->add_anime($idFigura, $anime_id);
    }
}

  /* (new Figura())->insert();*/

header('Location: ../index.php?sec=admin_figura');

} catch (\Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "<pre>";
    die("No se pudo cargar el anime");
}
