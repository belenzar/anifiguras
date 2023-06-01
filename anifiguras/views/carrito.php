<?PHP
$miCarrito = new Carrito;
$items = $miCarrito->get_Carrito();
?>

<div class="row">
    <h1 class="text-center">Carrito de compras</h1>

    <?PHP if (count($items)) { ?>
    <form action="admin/actions/update_items_action.php" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="15%">Portada</th>
                    <th scope="col">Datos del producto</th>
                    <th scope="col" width="15%">Cantidad</th>
                    <th class="text-end" scope=" col" width="15%">Precio Unitario</th>
                    <th class="text-end" scope="col" width="15%">Subtotal</th>
                    <th class="text-end" scope="col" width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <?PHP foreach ($items as $key => $items){ ?>
                <tr>
                    <td><img src="img/portada/<?= $items['imagen'] ?>"
                            alt="Imágen Illustrativa de <?= $items['producto'] ?>" class="img-fluid rounded shadow-sm">
                    </td>

                    <td class="align-middle">
                        <h2 class="h5"><?= $items['producto'] ?></h2>
                        <p><?= $items['producto'] ?></p>
                    </td>

                    <td class="align-middle">
                        <label for="q_<?= $key ?>" class="visually-hidden">Cantidad</label>
                        <input type="number" class="form-control" value="<?= $items['cantidad'] ?>" id="q_<?= $key ?>"
                            name="q[<?= $key ?>]">
                    </td>

                    <td class="text-end align-middle">
                        <p class="h5 py-3">$<?= number_format($items['precio'], 2, ",", ".") ?></p>
                    </td>

                    <td class="text-end align-middle">
                        <p class="h5 py-3"> $<?= number_format($items['cantidad'] * $items['precio'], 2, ",", ".") ?>
                        </p>
                    </td>
                    <td class="text-end align-middle">
                        <a href="admin/actions/remove_items_action.php?id=<?= $key ?>"
                            class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>

                <?PHP } ?>

                <tr>
                    <td colspan="4" class="text-end">
                        <h2 class="h5 py-3">Total:</h2>
                    </td>
                    <td class="text-end">
                        <p class="h5 py-3">ARS <?= number_format($miCarrito->precio_total(), 2, ",", ".") ?></p>
                    </td>
                    <td></td>
                </tr>
            </tbody>

        </table>



        <div class="d-flex justify-content-end gap-2">
            <input type="submit" value="Actualizar Cantidades" class="btn btn-warning">
            <a href="index.php?sec=catalogo_completo" role="button" class=" btn btn-danger">Seguir comprando</a>
            <a href="admin/actions/clear_items_action.php" role="button" class="btn btn-danger">Vaciar Carrito</a>
            <a href="#" role="button" class="btn btn-primary">Finalizar Compra</a>
        </div>

    </form>

    <?PHP }else{ ?>
    <div class="col">
        <p class="text-center existente">Su carrito está vacío</p>
    </div>
    <?PHP } ?>
</div>