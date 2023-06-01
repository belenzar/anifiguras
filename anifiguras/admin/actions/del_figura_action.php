<?PHP
 require_once "../../functions/autoload.php";

 $id = $_GET['id'] ?? FALSE;
 $figuras = (new Figura())->figuraId($id);

echo "<pre>";
print_r ($figuras);
echo"</pre>";

try{
    if (!empty($figuras->getImagen())) {
       (new Imagen())->borrarImagen(__DIR__ . "/../../img/portada/" . $figuras->getImagen());
    }
    $figuras->delete();
    header('Location: ../index.php?sec=admin_figura'); 
} catch (\Exception $e) {
    echo "<pre>";
print_r ($e->getMessage());
echo"</pre>";
    die ("no se pudo cargar");
}