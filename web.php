<?php

    require_once 'app/Controllers/TicketController.php';
    require_once 'app/Controllers/SaleController.php';
    require_once 'app/Controllers/TableController.php';
    require_once 'app/Controllers/ProductCategoryController.php';

    use app\Controllers\ProductCategoryController;
    use app\Controllers\TicketController;
    use app\Controllers\SaleController;
    use app\Controllers\TableController;

    header("Content-Type: application/json");

    if(isset($_GET['data'])){
        $json = json_decode($_GET['data']);
    }else{
        $json = json_decode(file_get_contents('php://input'));
    }

    file_put_contents("fichero.txt", $json->route);


    if(isset($json->route)) {

        switch($json->route) {

            case 'addProduct':

                $ticket = new TicketController();
                $table = new TableController();

                $new_product = $ticket->addProduct($json->price_id, $json->table_id);
                $total = $ticket->total($json->table_id);
                $table->updateState($json->table_id, 0);

                $response = array(
                    'status' => 'ok',
                    'newProduct' => $new_product,
                    'total' => $total
                );

                echo json_encode($response);

                break;

            case 'deleteProduct':

                $ticket = new TicketController();
                $table = new TableController();

                $ticket->deleteProduct($json->cart_id);
                $total = $ticket->total($json->table_id);

                if(empty($total)){
                    $table->updateState($json->table_id, 1);
                }

                $response = array(
                    'status' => 'ok',
                    'total' => $total
                );

                echo json_encode($response);

                break;

            case 'deleteAllProducts':

                $ticket = new TicketController();
                $table = new TableController();

                $ticket->deleteAllProducts($json->table_id);
                $table->updateState($json->table_id, 1);

                $response = array(
                    'status' => 'ok',
                );

                echo json_encode($response);

                break;

            case 'payTicket':

                $ticket = new TicketController();
                $sale = new SaleController();
                $table = new TableController();

                $total = $ticket->total($json->table_id);
                $sale_id = $sale->store($json->table_id, $json->payment_method_id, $total);
                $ticket->closeTicket($sale_id, $json->table_id);
                $data = $ticket->getServiceDuration($sale_id);
                $sale->updateServiceDuration($sale_id, $data['service_duration']);
                $table->updateState($json->table_id, 1);

                $response = array(
                    'status' => 'ok',
                );

                echo json_encode($response);

                break;
            
            case 'getSaleChartData':
                
                $sale = new SaleController();
                $data = $sale->getChartData($json->chart_data);
                
                foreach($data as $value){
                    $response['labels'][] = isset($value['labels']) ? $value['labels'] : null;
                    $response['data'][] = isset($value['data']) ? $value['data'] : null;
                    $response['quantity'][] = isset($value['quantity']) ? $value['quantity'] : null;
                }

                echo json_encode($response);
                
                break;

            case 'getTicketChartData':

                $ticket = new TicketController();
                $data = $ticket->getChartData($json->chart_data);
                
                foreach($data as $value){
                    $response['labels'][] = isset($value['labels']) ? $value['labels'] : null;
                    $response['data'][] = isset($value['data']) ? $value['data'] : null;
                    $response['quantity'][] = isset($value['quantity']) ? $value['quantity'] : null;
                }

                echo json_encode($response);
                
                break;

            case 'exportSaleToExcel':

                $sale = new SaleController();
                // $excel = $sale->exportSaleToExcel($json->sale_id);
                $sale->exportSaleToPdf($json->sale_id);
                
                $response = array(
                    'status' => 'ok',   
                );

                echo json_encode($response);
                
                break;

            case 'storeTable':

                $table = new TableController();
                $new_table = $table->store($json->id, $json->numero, $json->ubicacion, $json->pax);

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id,
                    'newElement' => $new_table
                );

                echo json_encode($response);

                break;
            
            case 'showTable':

                $table = new TableController();
                $table = $table->show($json->id);

                $response = array(
                    'status' => 'ok',
                    'element' => $table,
                );

                echo json_encode($response);

                break;
            
            case 'deleteTable':

                $table = new TableController();
                $table->delete($json->id);

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id
                );

                echo json_encode($response);

                break;
            
            case 'storeCategory':

                $category = new ProductCategoryController();
                $new_category = $category->store($json->nombre, $json->imagen_url);

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id,
                    'newElement' => $new_table
                );

                echo json_encode($response);

                break;
            
            case 'showCategory':

                $category = new ProductCategoryController();
                $category = $category->show($json->id);

                $response = array(
                    'status' => 'ok',
                    'element' => $table,
                );

                echo json_encode($response);

                break;
            
            case 'deleteCategory':

                $category = new ProductCategoryController();
                $category->delete($json->id);

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id
                );

                echo json_encode($response);

                break;
        }

    } else {
        echo json_encode(array('error' => 'No action'));
    }    
?>