<?php

	require_once 'app/Controllers/TableController.php';

	use app\Controllers\TableController;

    session_start();

	$mesa = new TableController();
	$mesas = $mesa->index();

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
                    <h2 class="text-center">MESAS</h2>
                    <div class="row mb-5">
                        <?php foreach($mesas as $mesa): ?>
                            <?php if( isset($_SESSION["mesa_id"]) && $_SESSION["mesa_id"] == $mesa['id']): ?>
                                <div class="col-4 gy-4"><a class="btn btn-primary w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.php?mesa=<?php echo $mesa['id'] ?>"><?= $mesa['numero']; ?></a></div>
                            <?php elseif($mesa['estado'] == 0): ?>
                                <div class="col-4 gy-4"><a class="btn btn-danger w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.php?mesa=<?php echo $mesa['id'] ?>"><?= $mesa['numero']; ?></a></div>
                            <?php else: ?>
                                <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.php?mesa=<?php echo $mesa['id'] ?>"><?= $mesa['numero']; ?></a></div>
                            <?php endif; ?>
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