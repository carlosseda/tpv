<?php

namespace app\Controllers;

require_once 'app/Models/ProductCategory.php';

use app\Models\ProductCategory;

class ProductCategoryController {

	protected $product;

	public function __construct(){  

		$this->product_category = new ProductCategory();
	}

	public function index(){
		return $this->product_category->index();
	}
}

?>