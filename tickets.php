<?php

	require_once 'app/Controllers/TicketController.php';

	use app\Controllers\TicketController;

	$ticket = new TicketController();

    if(isset($_GET['mesa'])){
        $productos_ticket = $ticket->show($_GET['mesa']);
    }else{
        $productos_ticket = null;
    }
   
?>

<div class="col-12 col-lg-5 col-xl-4 mt-5">
    <aside>
        <h2 class="text-center">TICKET MESA 1</h2>
        <ul class="list-group shadow mt-4">
            <?php if($productos_ticket != null): ?>
                <?php foreach($productos_ticket as $producto_ticket): ?>
                    <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button" data-product="<?= $producto_ticket['id']; ?>"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/cocacola.png">
                        <div class="flex-grow-1"><span class="categoria-prod"><?= $producto_ticket['categoria']; ?></span>
                            <h4 class="nombre-prod mb-0"><?= $producto_ticket['nombre']; ?></h4><span class="medida-prod">20 ml.</span>
                        </div>
                        <p class="precio-prod"><?= $producto_ticket['precio_base']; ?></p>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay productos añadidos al ticket</p>
            <?php endif; ?>
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
                            <h5 class="text-center text-white mb-0 pb-1"><?= $producto_ticket['base_imponible']; ?></h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 border-start pb-1">21%</h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 bg-dark pb-1"><?= $producto_ticket['total']; ?></h5>
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