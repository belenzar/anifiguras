<div class="container text-center">
    <h1>¡Contactate con nosotros!</h1>
</div>

<div class="formulario row mb-5 d-flex align-items-center">
    <form class="row g-3" action="index.php?sec=datos_form" method="POST">
        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>

        <div class="col-md-6 mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
        </div>

        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="col-md-6 mb-3">
            <label for="texto" class="form-label">Dejanos tu comentario</label>
            <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
        </div>
        <button type="submit" value="enviar">Enviar</button>
    </form>
</div>