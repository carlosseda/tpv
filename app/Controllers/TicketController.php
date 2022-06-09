<?php

namespace app\Controllers;

require_once 'app/Models/Ticket.php';

use app\Models\Ticket;

class TicketController {

	protected $ticket;

	public function __construct(){  

		$this->ticket = new Ticket();
	}

	public function show($table_id){
		return $this->ticket->show($table_id);
	}

	public function total($table_id){
		return $this->ticket->total($table_id);
	}
}

?>