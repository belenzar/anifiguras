<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar nuevo Anime</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_anime_action.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" required>
                    <div class="form-text">Ingresar fecha de 4 dígitos</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                <button type="submit" class="btn col-md-12 text-center btn-primary">Subir</button>

            </form>
        </div>
    </div>
</div>