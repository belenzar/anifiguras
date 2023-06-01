<?PHP 
$id = $_GET['id'] ?? FALSE;
$ani = (new Anime())->get_id($id);

?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar Anime</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_anime_action.php?id=<?= $ani->getId() ?>" method="POST"
                enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $ani->getAnime();?>"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"
                        required><?= $ani->getDescripcionAnime();?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" value="<?= $ani->getFecha();?>"
                        required>
                    <div class="form-text">Ingresar fecha de 4 dígitos</div>
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