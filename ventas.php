<?php
    require_once 'app/Controllers/SaleController.php';
    require_once 'app/Controllers/TableController.php';

    use app\Controllers\SaleController;
    use app\Controllers\TableController;

    $sale = new SaleController();
    $table = new TableController();

    $table_number = !empty($_GET['mesa']) ? $_GET['mesa'] : null;
    $date = !empty($_GET['fecha']) ? $_GET['fecha'] : date("Y-m-d");

    $sales = $sale->filter($table_number, $date);
    $total_ticket = $sale->totalComparedToAverage($table_number, $date);
    $tables = $table->index();

    if(isset($_GET['venta'])){
        $sale_bill = $sale->show($_GET['venta']);
        $products = $sale->showProducts($_GET['venta']);
    }
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
                    <?php if(isset($sale_bill)): ?>
                        <h2 class="text-center">VENTA <?=  $sale_bill['numero_ticket'] ?></h2>
                    <?php else: ?>
                        <h2 class="text-center">NINGUNA VENTA SELECCIONADA</h2>
                    <?php endif; ?>

                    <?php if(isset($sale_bill)): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="export-sale-to-excel" data-sale="<?= $sale_bill['id'] ?>">
                                            <svg viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M21.17 3.25Q21.5 3.25 21.76 3.5 22 3.74 22 4.08V19.92Q22 20.26 21.76 20.5 21.5 20.75 21.17 20.75H7.83Q7.5 20.75 7.24 20.5 7 20.26 7 19.92V17H2.83Q2.5 17 2.24 16.76 2 16.5 2 16.17V7.83Q2 7.5 2.24 7.24 2.5 7 2.83 7H7V4.08Q7 3.74 7.24 3.5 7.5 3.25 7.83 3.25M7 13.06L8.18 15.28H9.97L8 12.06L9.93 8.89H8.22L7.13 10.9L7.09 10.96L7.06 11.03Q6.8 10.5 6.5 9.96 6.25 9.43 5.97 8.89H4.16L6.05 12.08L4 15.28H5.78M13.88 19.5V17H8.25V19.5M13.88 15.75V12.63H12V15.75M13.88 11.38V8.25H12V11.38M13.88 7V4.5H8.25V7M20.75 19.5V17H15.13V19.5M20.75 15.75V12.63H15.13V15.75M20.75 11.38V8.25H15.13V11.38M20.75 7V4.5H15.13V7Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Datos de la venta</h5>
                                        <p class="card-text">
                                            <strong>Mesa:</strong> <?= $sale_bill['mesa'] ?><br>
                                            <strong>Método de pago:</strong> <?= $sale_bill['metodo_pago'] ?><br>
                                            <strong>Total base:</strong> <?= $sale_bill['precio_total_base'] ?><br>
                                            <strong>Total IVA:</strong> <?= $sale_bill['precio_total_iva'] ?><br>
                                            <strong>Total:</strong> <?= $sale_bill['precio_total'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
 
                    <?php if(isset($products)): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center"scope="col"></th>
                                    <th class="text-center" scope="col">Nombre</th>
                                    <th class="text-center" scope="col">Precio Base</th>
                                    <th class="text-center" scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product): ?>
                                    <tr>
                                        <td class="text-center"><img class="img-ticket" src="<?= $product['imagen_url']; ?>"></td>
                                        <td class="text-center"><?= $product['nombre']; ?></td>
                                        <td class="text-center"><?= $product['precio_base']; ?> €</td>
                                        <td class="text-center"><?= $product['cantidad']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </section>
            </div>

            <div class="col-12 col-lg-5 col-xl-4 mt-5">
                <aside>
                    <h2 class="text-center">VENTAS</h2>

                    <form action="ventas.php" method="GET">

                        <div class="row mt-3 mb-3">
                            <div class="col-6">
                                <p>Filtrar por fecha:</p>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="date" name="fecha" value="<?php echo $date ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-6">
                                <p>Filtrar por mesa:</p>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <select name="mesa" class="form-control">
                                        <option value="">Todas</option>
                                        <?php foreach($tables as $table): ?>
                                            <option value="<?= $table['numero'] ?>" <?= $table['numero'] == $table_number ? 'selected':'' ?>>
                                                <?= $table['numero'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                            </div>
                        </div>

                    </form>

                    <div class="list-group">
                        <?php if(isset($sales)): ?>
                            <?php foreach($sales as $sale): ?>

                                <?php if(isset( $_GET['venta']) && $sale['id'] == $_GET['venta'] ): ?>
                                    <a class="sale-item list-group-item list-group-item-action active" href="ventas.php?venta=<?php echo $sale['id'] ?>&fecha=<?php echo $date ?>&mesa=<?php echo $table_number ?>" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Ticket: <?=  $sale['numero_ticket'] ?></h5>
                                            <small>Hora: <?=  $sale['hora_emision'] ?></small>
                                            <small>Mesa: <?=  $sale['numero'] ?></small>
                                        </div>
                                        <p class="mb-1"><?=  $sale['precio_total'] ?> €</p>
                                    </a>
                                <?php else: ?>
                                    <a class="sale-item list-group-item list-group-item-action" href="ventas.php?venta=<?php echo $sale['id'] ?>&fecha=<?php echo $date ?>&mesa=<?php echo $table_number ?>" aria-current="true">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Ticket: <?=  $sale['numero_ticket'] ?></h5>
                                            <small>Hora: <?=  $sale['hora_emision'] ?></small>
                                            <small>Mesa: <?=  $sale['numero'] ?></small>
                                        </div>
                                        <p class="mb-1"><?=  $sale['precio_total'] ?> €</p>
                                    </a>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <div class="bg-secondary" id="refresh-price">
                                <div class="row justify-content-between g-0">
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 pt-1">Total Ingresos</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 pt-1">Media del día</h5>
                                    </div>
                                    <div class="row justify-content-between g-0">
                                        <div class="col">
                                            <h5 class="text-center text-white mb-0 pb-1">
                                                <?php if(!empty($total_ticket['total'])): ?>
                                                    <?php echo $total_ticket['total'] ?> €
                                                <?php else: ?>
                                                    0 €
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-center text-white mb-0 border-start pb-1">
                                                <?php if(!empty($total_ticket['media'])): ?>
                                                    <?php echo $total_ticket['media'] ?> €
                                                <?php else: ?>
                                                    0 €
                                                <?php endif; ?>
                                            </h5>
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
    <script type="module" src="dist/main.js"></script>
</body>

</html>