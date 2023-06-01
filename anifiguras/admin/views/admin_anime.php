<?PHP
$anime = (new Anime())->lista_completa();
?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Anime</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th width="20%"scope="col">Imagen</th>
                        <th scope="col">Anime</th>
                        <th scope="col">Descripción Anime</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($anime as $ani) { ?>
                    <tr>
                        <td><img src="../img/anime/<?= $ani->getImagen() ?>" alt="Imagen de <?= $ani->getAnime() ?>" class="img-fluid"> </td>
                        <td><?= $ani->getAnime() ?></td>
                        <td><?= $ani->getDescripcionAnime() ?></td>
                        <td><?= $ani->getFecha() ?></td>
                        <td>
                            <a href="index.php?sec=edit_anime&id=<?= $ani->getId() ?>" role="button"
                                class="d-block btn btn-sm mb-1">Editar Anime</a>
                            <a href="actions/del_anime_action.php?id=<?= $ani->getId() ?>" role="button" class="d-block btn btn-sm"> Eliminar</a>
                        </td>
                    </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <a href="index.php?sec=add_anime" class="btn btn-primary mt-5"> Cargar Anime</a>
        </div>


    </div>
</div>