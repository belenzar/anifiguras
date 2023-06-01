<?PHP 

class Carrito{
   
    public function add_item($productoID, $cantidad){
        $itemData = (new Figura)->figuraId($productoID);
        if($itemData){
            $_SESSION['carrito'][$productoID] = [
                'producto' => $itemData->getNombre(),
                'precio'=> $itemData->getPrecio(),
                'imagen'=> $itemData->getImagen(),
                'cantidad'=> $cantidad
            ];
        }
    }

    public function update_quantities(array $cantidades)
    {
        foreach ($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }

    public function get_carrito()
    {
        if(!empty($_SESSION['carrito'])){
            return $_SESSION['carrito'];
        } else {
            return []; 
         }
    }

    public function clear_items()
    {
        $_SESSION['carrito'] = [];
    }

    public function precio_total()
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }
    
    public function remove_item(string $productoID)
    {
        if (isset($_SESSION['carrito'][$productoID])) {
            unset($_SESSION['carrito'][$productoID]);
        }
    }


}