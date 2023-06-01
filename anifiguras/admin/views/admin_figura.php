<?PHP

$figura = (new Figura())->figurasTotal();
?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Figuras</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th width="15%" scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Anime</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Apariciones</th>
                        <th scope="col">Creador</th>
                        <th scope="col">Ilustrador</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($figura as $fig) { ?>
                    <tr>
                        <td><img src="../img/portada/<?= $fig->getImagen() ?>" alt="Imagen de <?= $fig->getNombre() ?>"
                                class="img-fluid"> </td>
                        <td><?= $fig->getNombre() ?></td>
                        <td><?= $fig->getFecha_anime() ?></td>
                        <td><?= $fig->getAnime() ?></td>
                        <td><?= $fig->getEmpresa_id() ?></td>
                        <td><?= $fig->getDescripcion() ?></td>
                        <td>
                            <?PHP                               
                            foreach ($fig->getAnime_extra() as $PS) {                                
                                echo "<p>" . $PS->getAnime() . "</p>";
                            }
                            ?>
                        </td>
                        <td><?= $fig->getCreador() ?></td>
                        <td><?= $fig->getIlustrador() ?></td>
                        <td><?= $fig->getPrecio() ?></td>
                        <td>
                            <a href="index.php?sec=edit_figura&id=<?= $fig->getId() ?>" role="button"
                                class="d-block btn btn-sm btn-warning mb-1">Editar figura</a>
                            <a href="actions/del_figura_action.php?id=<?= $fig->getId() ?>" role="button"
                                class="d-block btn btn-sm btn-danger"> Eliminar</a>
                        </td>
                    </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <a href="index.php?sec=add_figura" class="btn btn-primary mt-5"> Cargar Figura</a>
        </div>


    </div>
</div>