<?php

namespace app\Controllers;

require_once 'app/Models/Table.php';

use app\Models\Table;

class TableController {

	protected $table;

	public function __construct(){  

		$this->table = new Table();
	}

	public function index()
	{
		return $this->table->index();
	}

	public function show($table_id){
		return $this->table->show($table_id);
	}

	public function store($id, $number, $ubication, $pax){
		return $this->table->store($id, $number, $ubication, $pax);
	}

	public function delete($table_id){
		return $this->table->delete($table_id);
	}

	public function updateState($table_id, $state){
		return $this->table->updateState($table_id, $state);
	}
}

?>