<?PHP
 require_once "../../functions/autoload.php";

 $id = $_GET['id'] ?? FALSE;
 $anime = (new Anime())->get_id($id);

echo "<pre>";
print_r ($anime);
echo"</pre>";

try{
    if (!empty($anime->getImagen())) {
       (new Imagen())->borrarImagen(__DIR__ . "/../../img/anime/" . $anime->getImagen());
    }
    $anime->delete();
    header('Location: ../index.php?sec=admin_anime'); 
} catch (\Exception $e) {
    echo "<pre>";
print_r ($e->getMessage());
echo"</pre>";
    die ("no se pudo cargar");
}