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

	public function show($category_id){
		return $this->product_category->show($category_id);
	}

	public function store($id, $name, $image_url){

		
		// return $this->product_category->store($id, $name, $image_url);
	}

	public function delete($category_id){
		return $this->product_category->delete($category_id);
	}
}

?>