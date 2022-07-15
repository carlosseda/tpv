<?php

namespace app\Controllers;

require_once 'app/Models/Sale.php';
require_once 'app/Services/ExcelService.php';
require_once 'app/Services/PdfService.php';

use app\Models\Sale;
use app\Services\ExcelService;
use app\Services\PdfService;

class SaleController {

	protected $sale;

	public function __construct()
	{  
		$this->sale = new Sale();
	}

    public function index(){
		return $this->sale->index();
	}

    public function show($sale_id){
		return $this->sale->show($sale_id);
	}

    public function showProducts($sale_id){
		return $this->sale->showProducts($sale_id);
	}

	public function store($table_id, $payment_method_id, $total)
	{
        $ticket_number = $this->newTicketNumber();

		return $this->sale->store($table_id, $payment_method_id, $total, $ticket_number);
	}

	public function updateServiceDuration($sale_id, $service_duration)
	{
		return $this->sale->updateServiceDuration($sale_id, $service_duration);
	}

    public function newTicketNumber(){
        
        $date = date("ymd");
        $sale = $this->sale->lastTicketNumber();
            
        if(isset($sale['numero_ticket']) && strpos($sale['numero_ticket'], $date) !== false){
            $ticket_number = $sale['numero_ticket'] + 1; 
        } else {
            $ticket_number = $date . "0001";
        };
        
        return $ticket_number;
    }

	public function filter($table_number, $date){

		return $this->sale->filter($table_number, $date);
	}

	public function totalComparedToAverage($table_number, $date){
		return $this->sale->totalComparedToAverage($table_number, $date);
	}

	public function getChartData($chart_data){
		
		return $this->sale->getChartData($chart_data);
	}

	public function exportSaleToExcel($sale_id){

		$excel_service = new ExcelService();

		$sale = $this->sale->show($sale_id);
		$products = $this->sale->showProducts($sale_id);
		
		$excel_service->exportSaleToExcel($sale, $products);
	}

	public function exportSaleToPdf($sale_id){

		$sale = $this->sale->show($sale_id);
		$products = $this->sale->showProducts($sale_id);

		$html =
            '<html>
                <body>'.
                '<h1>Ticket de venta</h1>'.
                '<p>Numero de ticket: '.$sale['numero_ticket'].'</p>'.
                '<p>Fecha: '.$sale['fecha_emision'].'</p>'.
                '<p>Mesa: '.$sale['mesa'].'</p>'.

        $html .= 
            '<table>
                <tr>
                    <th>Cant</th>
                    <th>Descripción</th>
                    <th>Total</th>
                </tr>';

        foreach($products as $product){
            $html .=
            '<tr>
              <td>'.$product['cantidad'].'</td>
              <td>'.$product['nombre'].'</td>
              <td>'.$product['precio_base'].'</td>
            </tr>';
        }

        $html .=
			'</table>'.
			'<p>Base: '.$sale['precio_total_base'].'</p>'.
			'<p>IVA: '.$sale['precio_total_iva'].'</p>'.
			'<p>Total: '.$sale['precio_total'].'</p>'.
			'<p>Forma de pago: '.$sale['metodo_pago'].'</p>';
			'</body></html>';
		
		$pdf_service = new PdfService();
		$pdf = $pdf_service->exportToPdf($html);

		file_put_contents($_SERVER["DOCUMENT_ROOT"] . '/pdf/tickets/ticket-'.$sale['numero_ticket'].'.pdf', $pdf);

	}
}

?>