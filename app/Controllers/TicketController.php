<?php

namespace app\Controllers;

require_once 'app/Models/Ticket.php';

use app\Models\Ticket;

class TicketController {

	protected $ticket;

	public function __construct()
	{  
		$this->ticket = new Ticket();
	}

	public function show($table_id)
	{
		return $this->ticket->show($table_id);
	}

	public function total($table_id)
	{
		return $this->ticket->total($table_id);
	}

	public function addProduct($price_id, $table_id)
	{
		return $this->ticket->addProduct($price_id, $table_id);
	}

	public function deleteProduct($cart_id)
	{
		return $this->ticket->deleteProduct($cart_id);
	}

	public function deleteAllProducts($table_id)
	{
		return $this->ticket->deleteAllProducts($table_id);
	}

	public function closeTicket($sale_id, $table_id)
	{
		return $this->ticket->closeTicket($sale_id, $table_id);
	}

	public function getServiceDuration($sale_id){
		return $this->ticket->getServiceDuration($sale_id);
	}

	public function getChartData($chart_data){
		
		return $this->ticket->getChartData($chart_data);
	}
}

?>