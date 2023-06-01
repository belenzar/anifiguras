<?PHP
  $id = $_GET['id'] ?? FALSE;
 $objetoFigura = new Figura();
 $figure = $objetoFigura->figuraId($id);
 
?>

<div class="container">
    <?PHP if (isset($figure)) { ?>
    <div>
        <div class="card mx-auto" style="max-width: 50%;">
            <img src="img/portada/<?= $figure->getImagen(); ?>"  style="width: 70%;" class="mx-auto card-img-top"
                alt="Figura de <?= $figure->getNombre(); ?>">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span> Nombre: </span><?= $figure->getNombre();?></li>
                    <li class="list-group-item"><span> Fecha Animé: </span><?= $figure->getFecha_anime();?></li>
                    <li class="list-group-item"><span> Nombre: </span><?= $figure->getNombre();?></li>
                    <li class="list-group-item"><span>Creador:</span> <?= $figure->getCreador();?> </li>
                    <li class="list-group-item"><span> Ilustrador: </span><?= $figure->getIlustrador();?></li>
                    <li class="list-group-item"><span> Empresa: </span><?= $figure->getEmpresa();?></li>
                </ul>
                <p class="card-text text-left"><?= $figure->getDescripcion();?></p>
            </div>
            <div class="card-body price text-center">
                <p>$ <?= $figure->getPrecio();?></p>
                <form action="<?= $userData ? "admin/actions/add_item_action.php" : "index.php?sec=login" ?>" method="GET" class="row">
                    <div class="<?= $userData ? "" : "d-none" ?> col-6 d-flex align-items-center">
                        <label for="q" class="fw-bold me-2">Cantidad: </label>
                        <input type="number" class="form-control" value="1" name="q" id="q">
                    </div>
                    <div class="col-6">
                        <input type="submit" value="COMPRAR" class=" <?= $userData ? "" : "d-none" ?> btn btn-danger fw-bold">
                        <input type="hidden" value="<?= $id ?>" name="<?= $userData ? "id" : "" ?>" id="id">
                    </div>

                    <div class="<?= $userData ? "d-none" : "" ?>">
                        <a class="link" href="index.php?sec=login">Comprar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?PHP }else{ ?>
    <div class="col">
        <p class="text-center existente">No se encontró la figura buscada.</p>
    </div>
    <?PHP } ?>
</div>