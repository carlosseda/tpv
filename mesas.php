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

            <div class="col-12 col-lg-5 col-xl-4 mt-5">
                <aside>
                    <h2 class="text-center">TICKET MESA 1</h2>
                    <ul class="list-group shadow mt-4">
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/cocacola.png">
                            <div class="flex-grow-1"><span class="categoria-prod">Refrescos</span>
                                <h4 class="nombre-prod mb-0">Coca-Cola</h4><span class="medida-prod">20 ml.</span>
                            </div>
                            <p class="precio-prod">2.70 €</p>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/heineken.jpeg">
                            <div class="flex-grow-1"><span class="categoria-prod">Bebida alcohólica</span>
                                <h4 class="nombre-prod mb-0">Cerveza Heineken</h4><span class="medida-prod">33 ml.</span>
                            </div>
                            <p class="precio-prod">3.50 €</p>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/nestea.jpeg">
                            <div class="flex-grow-1"><span class="categoria-prod">Refrescos</span>
                                <h4 class="nombre-prod mb-0">Nestea</h4><span class="medida-prod">33 ml.</span>
                            </div>
                            <p class="precio-prod">2.90 €</p>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/patatilla-jamon.jpeg">
                            <div class="flex-grow-1"><span class="categoria-prod">Aperitivos</span>
                                <h4 class="nombre-prod mb-0">Bolsa patatilla sabor jamón</h4><span class="medida-prod">150 gr.</span>
                            </div>
                            <p class="precio-prod">3.00 €</p>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/copa-vino.jpeg">
                            <div class="flex-grow-1"><span class="categoria-prod">Bebida alcohólica</span>
                                <h4 class="nombre-prod mb-0">Copa de vino</h4><span class="medida-prod">20 ml.</span>
                            </div>
                            <p class="precio-prod">4.50 €</p>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket shadow-sm" src="assets/img/cocacola.png">
                            <div class="flex-grow-1"><span class="categoria-prod">Refrescos</span>
                                <h4 class="nombre-prod mb-0">Coca-Cola</h4><span class="medida-prod">20 ml.</span>
                            </div>
                            <p class="precio-prod">3.50 €</p>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/cafe-con-leche.jpeg">
                            <div class="flex-grow-1"><span class="categoria-prod">Bebida caliente</span>
                                <h4 class="nombre-prod mb-0">Café con leche</h4><span class="medida-prod">25 ml.</span>
                            </div>
                            <p class="precio-prod">2.10 €</p>
                        </li>
                    </ul>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="bg-secondary">
                                <div class="row justify-content-between g-0">
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 pt-1">B. Imponible</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 border-start pt-1">IVA</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 bg-dark pt-1">TOTAL</h5>
                                    </div>
                                </div>
                                <div class="row justify-content-between g-0">
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 pb-1">74.30 €</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 border-start pb-1">21%</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 bg-dark pb-1">102.45 €</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-6">
                            <div><a class="btn btn-danger btn-lg w-100" role="button" href="#myModal" data-bs-toggle="modal">ELIMINAR</a>
                                <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Eliminar ticket</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-muted">Está a punto de borrar el pedido sin ser cobrado. ¿Está completamente seguro de realizar esta acción?</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button><button class="btn btn-success" type="button">ELIMINAR</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div><a class="btn btn-success btn-lg w-100" role="button" href="#myModal-2" data-bs-toggle="modal">COBRAR</a>
                                <div class="modal fade" role="dialog" tabindex="-1" id="myModal-2">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Metodo de pago</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row align-items-center flex-column">
                                                    <div class="col-6 d-lg-flex m-2"><button class="btn btn-primary w-100" type="button">EFECTIVO</button></div>
                                                    <div class="col-6 d-lg-flex m-2"><button class="btn btn-success w-100" type="button">TARJETA CRÉDITO</button></div>
                                                    <div class="col-6 d-lg-flex m-2"><button class="btn btn-danger w-100" type="button">BIZUM</button></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>