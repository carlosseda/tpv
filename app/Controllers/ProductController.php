<?php

namespace app\Controllers;

require_once 'app/Models/Product.php';

use app\Models\Product;

class ProductController {

	protected $product;

	public function __construct(){  

		$this->product = new Product();
	}

	public function filterCategory($category_id){
		return $this->product->filterCategory($category_id);
	}
}

?>