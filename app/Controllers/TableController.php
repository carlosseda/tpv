<?php

namespace app\Controllers;

require_once 'app/Models/Table.php';

use app\Models\Table;

class TableController {

	protected $table;

	public function __construct(){  

		$this->table = new Table();
	}

	public function index(){
		return $this->table->index();
	}
}

?>