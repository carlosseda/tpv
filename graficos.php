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
                
                    <canvas id="chart" width="400" height="300"></canvas>

                </section>
            </div>

            <div class="col-12 col-lg-5 col-xl-4 mt-5">
                <aside>
                    <h2 class="text-center">ESTADÍSTICAS</h2>

                    <div class="list-group">

                        <div class="chart-item list-group-item list-group-item-action" data-route="getSaleChartData" data-chart="sales_by_hour" data-type="line" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Ventas por horas</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getSaleChartData" data-chart="sales_by_day" data-type="line" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Ventas diarias</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getSaleChartData" data-chart="sales_by_month" data-type="line" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Ventas mensuales</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getSaleChartData" data-chart="sales_by_year" data-type="line" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Ventas anuales</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getSaleChartData" data-chart="popular_payment_methods" data-type="pie" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Métodos de pago más usados</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getSaleChartData" data-chart="average_service_duration" data-type="bar" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Tiempo medio del servicio por mesa</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getTicketChartData" data-chart="best_categories" data-type="pie" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Categorías más vendidas</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getTicketChartData" data-chart="best_dishes" data-type="bar" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Platos más vendidos</h5>
                            </div>
                        </div>

                        <div class="chart-item list-group-item list-group-item-action" data-route="getTicketChartData" data-chart="best_drinks" data-type="bar" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Bebidas más vendidas</h5>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>

    <script type="module" src="dist/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>