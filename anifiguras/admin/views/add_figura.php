<?PHP
 
 require_once "../functions/autoload.php";

$anime = (new Anime())->lista_completa();
$creador = (new Creador())->lista_completa();
$ilustrador = (new Ilustrador())->lista_completa();


 ?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administrar figuras</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_figura_action.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_anime" class="form-label">Fecha</label>
                    <input type="number" class="form-control" id="fecha_anime" name="fecha_anime" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="anime_id" class="form-label">Anime</label>
                    <select class="form-control" id="anime_id" name="anime_id" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <?PHP foreach ($anime as  $a){ ?>
                        <option value="<?= $a->getId() ?>"><?= $a->getAnime() ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="creador_id" class="form-label">Creador</label>
                    <select class="form-control" id="creador_id" name="creador_id" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <?PHP foreach ($creador as $c){ ?>
                        <option value="<?= $c->getId() ?>"><?= $c->getNombre_completo() ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ilustrador_id" class="form-label">Ilustrador</label>
                    <select class="form-control" id="ilustrador_id" name="ilustrador_id" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <?PHP foreach ($ilustrador as  $i){ ?>
                        <option value="<?= $i->getId() ?>"><?= $i->getNombre() ?></option>
                        <?PHP } ?>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="anime_extra" class="form-label d-block">Apariciones</label>
                    <?PHP foreach ($anime as $a){?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="anime_extra[]"
                            id="anime_extra_<?= $a->getId() ?>" value="<?= $a->getId() ?>">
                        <label class="form-check-label mb-2"
                            for="anime_extra_<?= $a->getId()?>"><?= $a->getAnime() ?></label>
                    </div>
                    <?PHP } ?>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="empresa" class="form-label">Empresa</label>
                    <select class="form-control" id="empresa" name="empresa" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="">Bandai</option>
                        <option value="">Banpresto</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea type="number" class="form-control" rows="7" id="descripcion" name="descripcion"></textarea>
                </div>

                <button type="submit" class="btn col-md-12 text-center btn-primary">Subir</button>

            </form>
        </div>
    </div>
</div>