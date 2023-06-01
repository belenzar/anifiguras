<?PHP 
$id = $_GET['id'] ?? FALSE;
$figura = (new Figura())->figuraId($id);

$anime = (new Anime())->lista_completa();
$creador = (new Creador())->lista_completa();
$ilustrador = (new Ilustrador())->lista_completa();


?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Figura</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_figura_action.php?id=<?= $figura->getId() ?>" method="POST"
                enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="<?= $figura->getNombre();?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="anime_id" class="form-label">Anime</label>
                    <select class="form-control" id="anime_id" name="anime_id" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <?PHP foreach ($anime as  $a){ ?>
                        <option value="<?= $a->getId() ?>"
                            <?= $a->getId() == $figura->getAnime_id() ? "selected" : "" ?>><?= $a->getAnime() ?>
                        </option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="empresa" class="form-label">Empresa</label>
                    <select class="form-control" id="empresa" name="empresa" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option <?= $figura->getEmpresa_id() == "Banpresto" ? "selected" : "" ?>>Banpresto</option>
                        <option <?= $figura->getEmpresa_id() == "Bandai" ? "selected" : "" ?>>Bandai</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="creador_id" class="form-label">Creador</label>
                    <select class="form-control" id="creador_id" name="creador_id" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <?PHP foreach ($creador as $c){ ?>
                        <option value="<?= $c->getId() ?>"
                            <?= $c->getId() == $figura->getCreador_id() ? "selected" : "" ?>>
                            <?= $c->getNombre_completo() ?></option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="ilustrador_id" class="form-label">Ilustrador</label>
                    <select class="form-control" id="ilustrador_id" name="ilustrador_id" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <?PHP foreach ($ilustrador as  $i){ ?>
                        <option value="<?= $i->getId() ?>"
                            <?= $i->getId() == $figura->getIlustrador_id() ? "selected" : "" ?>><?= $i->getNombre() ?>
                        </option>
                        <?PHP } ?>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="anime_extra" class="form-label d-block">Apariciones</label>
                    <?PHP foreach ($anime as  $a){ 
                            $apariciones_selected = explode(",", $figura->getAnime_extra());
                            ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="anime_extra[]"
                            id="anime_extra_<?= $a->getId() ?>" value="<?= $a->getId() ?>"
                            <?= in_array($a->getId(), $apariciones_selected) ? "checked" : ""?>>
                        <label class="form-check-label mb-2"
                            for="anime_extra_<?= $a->getId()?>"><?= $a->getAnime() ?></label>
                    </div>
                    <?PHP } ?>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"
                        required><?= $figura->getDescripcion();?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_anime" class="form-label">Fecha</label>
                    <input type="text" class="form-control" id="fecha_anime" name="fecha_anime"
                        value="<?= $figura->getFecha_anime();?>" required>
                    <div class="form-text">Ingresar fecha de 4 dígitos</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio"
                        value="<?= $figura->getPrecio();?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Imagen Actual</label>
                    <img src="../img/portada/<?=$figura->getImagen() ?>"
                        alt="Imágen Ilustrativa de <?=$figura->getNombre() ?>"
                        class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen" name="imagen" required
                        value="<?=$figura->getImagen() ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                <button type="submit" class="btn col-md-12 text-center btn-primary">Editar</button>

            </form>
        </div>


    </div>
</div>