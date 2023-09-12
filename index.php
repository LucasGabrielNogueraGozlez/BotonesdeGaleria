<!-- Inicio de la sesión de PHP -->
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("./controllers/new-post-photo.php");

    session_start();
    require "./controllers/posts.php";
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

?>

<!-- Inicio del Html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de fotos A.J</title>
    <link rel="icon" type="image/x-icon" href="./assets/logovierciazul.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="estilos.css"></link>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<!-- Agrega jQuery si aún no lo tienes -->



</head>
<body>
<!-- NavBar -->
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="./assets/logovierciazul.svg" width="50" alt="Logo de la página web">
            Galeria de Imágenes
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link" href="/Galeria4/index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/Galeria4/admin_albums.php">Albumes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cerrar Sesión</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">
                        <label class="form-check-label ms-3" for="lightSwitch">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                          </svg>
                        </label>
                        <input class="form-check-input" type="checkbox" id="lightSwitch"/>
                      <script src="DiaNoche.js"></script>
                </a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Busca una imagen" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>

<!-- formulario -->
<div class="container justify-content-center">
        <div class="mt-5 mx-auto">
            <div>
                <?php if(isset($_SESSION['error'])){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error']?>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['error']);
                } ?>
                <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['success']?>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']);
                } ?>
                <form action="controllers/new-post-photo.php" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-3">Elige tu foto o fotos y añade una descripción</h5>
                    <div class="d-flex justify-content-between">
                        <input type="file" class="form-control mb-3" name="files[]" multiple id="file" accept=".png, .jpg, .jpeg" style="width: 40%" required>
                        <textarea name="description" id="description" rows="1" class="form-control mb-3 mx-3" style="resize: none;" placeholder="Añade una descripción" required></textarea>
                        <button class="btn btn-primary mb-3" type="submit" style="width: 20%;" name="btn-new-post-photo">Publicar</button>       
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5 py-2">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5">
        <?php
        $conn = mysqli_connect("192.168.12.40", "XDD", "XDD", "galeria");
        $por_pagina = 12;

        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 1;
        }

        $empieza = ($pagina - 1) * $por_pagina;
        $query = "SELECT * FROM imagenes_sueltas ORDER BY id_imagen DESC LIMIT $empieza, $por_pagina"; // Cambia el ORDER BY
        $resultado = mysqli_query($conn, $query);

        while ($post = mysqli_fetch_assoc($resultado)) {
            $imagesName = explode(",", $post['imagen']);
        ?>
        <div class="col" style="width: 275px">
            <div class="carousel slide" id="carousel<?=$post['id_imagen'] ?>" data-bs-ride="false">
                <div class="carousel-inner">
                    <?php for($j = 0; $j < count($imagesName); $j++) {
                        $isActive = $j == 0 ? 'active' : '';
                    ?>
                    <div class="carousel-item <?= $isActive ?>">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal<?=$post['id_imagen']?>-<?=$j?>">
                            <div class="image-container" style="background-image: url('./assets/images/posts/<?= $imagesName[$j] ?>');"></div>
                        </a>
                    </div>
                 
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="original-description">
                     <?php if (!isset($_GET['edit-description']) || $_GET['edit-description'] != $post['id_imagen']) { ?>
                        <?= $post['descripcion'] ?>
                        </div>
                        <div class="botones-utilidades">
                            <a href="eliminar-imagen.php?id_imagen=<?=$post['id_imagen']?>&index=<?=$j?>"><i class="bi bi-trash3"></i></a>
                            <button class="btn-edit-description" data-image-id="<?=$post['id_imagen']?>"><i class="bi bi-pencil-square"></i></button>

                            <a href="./assets/images/posts/<?= $imagesName[$j] ?>" download><i class="bi bi-download"></i></a>
                        </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            
            <div class="description-edit-container" id="description-edit-<?=$post['id_imagen']?>" style="display: none;">
            <form action="editar-descripcion.php" method="POST" id="edit-form-<?= $post['id_imagen'] ?>">
    <textarea name="new-description" class="form-control"><?= $post['descripcion'] ?></textarea>
    <input type="hidden" name="id_imagen" value="<?= $post['id_imagen'] ?>">
    <input type="hidden" name="edit-description" value="<?= isset($_GET['edit-description']) ? $_GET['edit-description'] : ''; ?>">
    <input type="hidden" name="pagina_actual" value="<?= $pagina_actual ?>">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="#" class="btn btn-secondary cancel-edit" data-image-id="<?= $post['id_imagen'] ?>">Cancelar</a>
  </form>
</div>
        </div>
        <?php }            ?>
    </div>
</div>


<div class="pagination">
    <?php
    $query_total = "SELECT COUNT(*) as total FROM imagenes_sueltas";
    $resultado_total = mysqli_query($conn, $query_total);
    $row_total = mysqli_fetch_assoc($resultado_total);

    $total_imagenes = $row_total['total'];
    $total_paginas = ceil($total_imagenes / $por_pagina);

 
    // Define cuántos enlaces quieres mostrar antes y después de la página actual
    $num_enlaces_mostrados = 2;

    // Calcula el rango de páginas a mostrar
    $rango_inicio = max(1, $pagina_actual - $num_enlaces_mostrados);
    $rango_fin = min($total_paginas, $pagina_actual + $num_enlaces_mostrados);

    if ($pagina_actual > 1) {
        echo "<a href='index.php?pagina=" . ($pagina_actual - 1) . "' class='btn btn-primary'>&lt;</a>";
    }

    for ($i = $rango_inicio; $i <= $rango_fin; $i++) {
        $clase_activo = ($i == $pagina_actual) ? 'active' : '';
        echo "<a href='index.php?pagina=$i' class='btn btn-primary $clase_activo'>$i</a> ";
    }

    if ($pagina_actual < $total_paginas) {
        echo "<a href='index.php?pagina=" . ($pagina_actual + 1) . "' class='btn btn-primary'>&gt;</a>";
    }
    ?>

</div>



<!-- Moda
es -->
<?php
$resultado = mysqli_query($conn, $query); // Reiniciar el resultado
while ($post = mysqli_fetch_assoc($resultado)) {
    $imagesName = explode(",", $post['imagen']);
    foreach ($imagesName as $j => $imageName) {
?>
<!-- Código del Modal -->
<div class="modal fade" id="modal<?=$post['id_imagen']?>-<?=$j?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="carouselModal<?=$post['id_imagen']?>-<?=$j?>" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php for($k = 0; $k < count($imagesName); $k++) {
                            $isActive = $k == $j ? 'active' : '';
                        ?>
                        <div class="carousel-item <?= $isActive ?>">
                            <img src="./assets/images/posts/<?= $imagesName[$k] ?>" class="d-block w-100" alt="Imagen <?= $k ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <?php if(count($imagesName) > 1){ ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselModal<?=$post['id_imagen']?>-<?=$j?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselModal<?=$post['id_imagen']?>-<?=$j?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                    <!-- Indicadores dentro del Modal -->
                    <ol class="carousel-indicators">
                        <?php for($k = 0; $k < count($imagesName); $k++) { ?>
                            <li data-bs-target="#carouselModal<?=$post['id_imagen']?>-<?=$j?>" data-bs-slide-to="<?= $k ?>" <?= $k == 0 ? 'class="active"' : '' ?>></li>
                        <?php } ?>
                    </ol>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $(".btn-edit-description").click(function() {
        console.log("Botón de edición de descripción clickeado");

        var imageId = $(this).data("image-id");
        var descriptionEditContainer = $(`#description-edit-${imageId}`);
        var cardBody = $(this).closest('.card-body');

        // Ocultar descripción original y botones
        cardBody.find('.botones-utilidades').hide();
        cardBody.find('.original-description').hide();

        // Agregar la clase 'visible' al description-edit-container
        descriptionEditContainer.addClass('visible');

        // Mover el elemento al div.card-body correspondiente
        cardBody.append(descriptionEditContainer);

        descriptionEditContainer.toggle();
    });

    // Manejar el click en el botón "Cancelar"
    $(".cancel-edit").click(function(e) {
        e.preventDefault(); // Evitar que el enlace navegue a otra página

        var imageId = $(this).data("image-id");
        var descriptionEditContainer = $(`#description-edit-${imageId}`);
        var cardBody = descriptionEditContainer.closest('.card-body');

        // Ocultar el formulario de edición y mostrar la descripción original y botones
        descriptionEditContainer.hide();
        cardBody.find('.original-description').show();
        cardBody.find('.botones-utilidades').show();
    });
});
</script>



</body>
 </html>