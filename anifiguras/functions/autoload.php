<?PHP 

session_start();
function autoloadClases($nombreClase){

    $archivoClase = __DIR__ ."/../classes/".$nombreClase.".php";

    if(file_exists($archivoClase)){
        require_once $archivoClase;
    }
}

spl_autoload_register('autoloadClases');

?>