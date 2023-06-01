<?PHP
 $animeSeleccionado = $_GET['an'] ?? FALSE;
 $objetoFigura = new Figura();
 $productos = $objetoFigura->figuraAnime($animeSeleccionado);
?>

<div class="row">
    <h1 class="text-center">Figuras en venta</h1>
    <?PHP if (count($productos)) { ?>
    <?PHP foreach ($productos as $figure){ ?>
    <div class="col-sm-4 mb-2 card-figura">
        <div class="card">
        <h2 class="text-center"><?= $figure->getAnime();?></h2>
            <img src="img/portada/<?= $figure->getImagen(); ?>" class="card-img-top" alt="Figura de <?= $figure->getNombre(); ?>">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span> Nombre: </span><?= $figure->getNombre();?></li>
                    <li class="list-group-item"><span> Fecha Animé: </span><?= $figure->getFecha_anime();?></li>
        
                    <li class="list-group-item"><span> Empresa: </span><?= $figure->getEmpresa();?></li>
                </ul>
                <p class="card-text text-left"><?= $figure->caracteristicaCorta();?></p>
            </div>
            <div class="card-body price text-center">
                <p>$ <?= $figure->getPrecio();?></p>
                <a href="index.php?sec=figura&id=<?= $figure->getId(); ?> " class="btn">Ver más</a>
            </div>
        </div>
    </div>
    <?PHP } ?>
    <?PHP }else{ ?>
    <div class="col">
        <p class="text-center existente">Página no existente</p>
    </div>
    <?PHP } ?>
</div>