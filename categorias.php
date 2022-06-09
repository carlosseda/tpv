<?php

	require_once 'app/Controllers/ProductCategoryController.php';

	use app\Controllers\ProductCategoryController;

    session_start();

    $_SESSION["mesa_id"] = $_GET['mesa'];

	$categoria = new ProductCategoryController();
	$categorias = $categoria->index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>diseño tpv</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Abel.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3 border titular">TPV</h1>
            </div>
            <div class="col-12 col-lg-7 col-xl-8 order-lg-1 mt-5">
                <section>
                    <h2 class="text-center">CATEGORÍAS</h2>
                    <div class="row">
                        <div class="col">
                            <ol class="breadcrumb mb-0 mt-3">
                                <li class="breadcrumb-item"><a href="mesas.php"><span><i class="icon ion-android-home me-2"></i>INICIO</span></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span><i class="icon ion-social-buffer-outline me-2"></i>Categorías</span></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <?php foreach($categorias as $categoria): ?>
                            <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="productos.php?categoria=<?php echo $categoria['id'] ?>"><img src="<?= $categoria['imagen_url']; ?>"></a>
                                <h5 class="text-center mb-0"><?= $categoria['nombre']; ?></h5>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
            
            <?php include("tickets.php"); ?>

        </div>

        <div class="modal fade" role="dialog" tabindex="-1" id="medidas">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Tamaño Nombre del producto</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center flex-column">
                            <div class="col-6 d-lg-flex m-2"><button class="btn btn-primary w-100" type="button">PEQUEÑO</button></div>
                            <div class="col-6 d-lg-flex m-2"><button class="btn btn-success w-100" type="button">MEDIANO</button></div>
                            <div class="col-6 d-lg-flex m-2"><button class="btn btn-danger w-100" type="button">GRANDE</button></div>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>