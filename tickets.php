<?php

	require_once 'app/Controllers/TicketController.php';
    require_once 'app/Controllers/TableController.php';

	use app\Controllers\TicketController;
    use app\Controllers\TableController;

    if(isset($_GET['mesa'])){

        $ticket = new TicketController();
        $table = new TableController();

        $mesa = $table->show($_GET['mesa']);
        $productos_ticket = $ticket->show($_GET['mesa']);
        $total_ticket = $ticket->total($_GET['mesa']);
    }else{
        $mesa = null;
    };
?>

<div class="col-12 col-lg-5 col-xl-4 mt-5">
    <aside>
        <?php if(isset($mesa)): ?>
            <h2 class="text-center">TICKET MESA <?php echo $mesa['numero']; ?></h2>
        <?php else: ?>
            <h2 class="text-center">TICKET MESA</h2>
        <?php endif; ?>

        <ul class="list-group shadow mt-4">
            <?php if(isset($productos_ticket) && $productos_ticket != null): ?>
                <?php foreach($productos_ticket as $producto_ticket): ?>
                    <li class="list-group-item d-flex align-items-center"><button class="delete-product btn btn-light btn-sm me-2" type="button" data-product="<?= $producto_ticket['id']; ?>" data-table="<?php echo $mesa['id'] ?>"><i class="la la-close"></i></button><img class="img-ticket" src="<?= $producto_ticket['imagen_url']; ?>">
                        <div class="flex-grow-1"><span class="categoria-prod"><?= $producto_ticket['categoria']; ?></span>
                            <h4 class="nombre-prod mb-0"><?= $producto_ticket['nombre']; ?>
                        </div>
                        <p class="precio-prod"><?= $producto_ticket['precio_base']; ?> €</p>
                    </li>
                <?php endforeach; ?>
                <p class="no-products text-center d-none">No hay productos añadidos al ticket</p>
            <?php else: ?>
                <p class="no-products text-center">No hay productos añadidos al ticket</p>
            <?php endif; ?>

            <?php if(isset($mesa['id'])): ?>
                <li class="add-product-layout list-group-item d-flex align-items-center d-none"><button class="delete-product btn btn-light btn-sm me-2" type="button" data-product="" data-table="<?php echo $mesa['id'] ?>"><i class="la la-close"></i></button><img class="img-ticket" src="">
                    <div class="flex-grow-1"><span class="categoria-prod"></span>
                        <h4 class="nombre-prod mb-0"></h4>
                    </div>
                    <p class="precio-prod"></p>
                </li>
            <?php endif; ?>
        </ul>

        <div class="row mt-3">
            <div class="col">
                <div class="totals bg-secondary">
                    <div class="row justify-content-between g-0">
                        <div class="col">
                            <h5 class="text-center text-white mb-0 pt-1">B. Imponible</h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 border-start pt-1"> 
                                IVA (
                                    <span class="iva-percent">
                                        <?php if(!empty($total_ticket['iva'])): ?>
                                            <?= $total_ticket['iva'] ?>
                                        <?php endif; ?>
                                    </span>
                                ) %
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 bg-dark pt-1">TOTAL</h5>
                        </div>
                    </div>
                    <div class="row justify-content-between g-0">
                        <div class="col">
                            <h5 class="text-center text-white mb-0 pb-1">
                                <span class="base">
                                    <?php if(!empty($total_ticket['base_imponible'])): ?>
                                        <?= $total_ticket['base_imponible']; ?> 
                                    <?php else: ?>
                                        0 
                                    <?php endif; ?>
                                </span>
                                €
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 border-start pb-1">
                                <span class="iva">
                                    <?php if(!empty($total_ticket['iva_total'])): ?> 
                                        <?= $total_ticket['iva_total']; ?>
                                    <?php else: ?>
                                        0 
                                    <?php endif; ?>
                                </span>
                                €
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 bg-dark pb-1">
                                <span class="total">
                                    <?php if(!empty($total_ticket['total'])): ?> 
                                        <?= $total_ticket['total']; ?>
                                    <?php else: ?>
                                        0 
                                    <?php endif; ?>
                                </span>
                                €
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(isset($mesa)): ?> 
            <div class="row mt-3 mb-3">
                <div class="col-6">
                    <a class="btn btn-danger btn-lg w-100" role="button" href="#myModal" data-bs-toggle="modal">ELIMINAR</a>
                    <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Eliminar ticket</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-muted">Está a punto de borrar el pedido sin ser cobrado. ¿Está completamente seguro de realizar esta acción?</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button>
                                    <button class="delete-all-products btn btn-success" data-table="<?php echo $mesa['id'] ?>" type="button" data-bs-dismiss="modal">ELIMINAR</button>
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
                                            <div class="col-6 d-lg-flex m-2"><button class="payment-button btn btn-primary w-100" data-table="<?php echo $mesa['id'] ?>" data-payment="1" type="button" data-bs-dismiss="modal">EFECTIVO</button></div>
                                            <div class="col-6 d-lg-flex m-2"><button class="payment-button btn btn-success w-100" data-table="<?php echo $mesa['id'] ?>" data-payment="2" type="button" data-bs-dismiss="modal">TARJETA CRÉDITO</button></div>
                                            <div class="col-6 d-lg-flex m-2"><button class="payment-button btn btn-danger w-100" data-table="<?php echo $mesa['id'] ?>" data-payment="3" type="button" data-bs-dismiss="modal">BIZUM</button></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </aside>
</div>