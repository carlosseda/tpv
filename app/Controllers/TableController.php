<?php

require_once 'app/Models/Table.php';

use app\Models\Table;

class TabletController {

	protected $table;

	public function __construct(){  

		$this->table = new Table();
	}

	public function index(){
		return $this->table->index();
	}
}

?>