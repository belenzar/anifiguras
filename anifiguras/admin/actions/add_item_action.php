<?PHP
 require_once "../../functions/autoload.php";

 $id = $_GET['id'] ?? FALSE;
 $q = $_GET['q'] ?? 1;

 if($id){
    (new Carrito())->add_item($id, $q);
    header('location: ../../index.php?sec=carrito');
 }
