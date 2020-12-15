<?php

namespace App;

class Compare{
	public $products = null;

	function __construct($compare)
	{
		if($compare){
			$this->products = $compare->products;
		}
	}

	public function addCompare($id,$product)
	{
		$newProduct = [
			'categories_name'=>null,
			'productName'=>null,
			'desc'=>null,
			'price'=>0,
			'vote'=>0,
			'color'=>null,
			'image'=>null
		];
		if(!empty($this->products)){
			if(array_key_exists($id,$this->products)){
				$newProduct = $this->products[$id];
			}
		}
		$newProduct['categories_name'] = $product['categories_name'];
		$newProduct['productName'] = $product['productName'];
		$newProduct['desc'] = $product['desc'];
		$newProduct['price'] = $product['price'];
		$newProduct['vote'] = $product['vote'];
		$newProduct['color'] = $product['color'];
		$newProduct['image'] = $product['image'];
		$this->products[$id] = $newProduct;
	}

	public function deleteCompare($id)
	{
		if(!empty($this->products)){
			if(array_key_exists($id,$this->products)){
				unset($this->products[$id]);
			}
		}
	}
}