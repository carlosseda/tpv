<?php

namespace app\Controllers;

require_once 'app/Models/Product.php';

use app\Models\Product;

class ProductController {

	protected $product;

	public function __construct(){  

		$this->product = new Product();
	}

	public function index($category_id){
		return $this->product->index($category_id);
	}

	public function getCategory($category_id){
		return $this->product->getCategory($category_id);
	}
}

?>