<?PHP 

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$texto = $_POST['texto'];

?>

<section class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">
            ¡Gracias por contactarnos!</h1>
        <div class="row mb-5 d-flex align-items-center">
            <p class="fs-4 text-center"><?= $nombre ?>, tu consulta fué enviada con éxito. Gracias por visitar nuestra
                página, te esperamos pronto!</p>
            <div>
                <ul class="text-center datos">
                    <li>Tu nombre: <?= $nombre ?></li>
                    <li>Tu apellido: <?= $apellido ?></li>
                    <li>Tu E-Mail: <?= $email ?></li>
                    <li>Tu Comentario: <?= $texto ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>