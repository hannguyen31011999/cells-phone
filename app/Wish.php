<?php

class Wish{
	public $products = null;

	function __construct($wish)
	{
		if($wish){
			$this->products = $wish->products;
		}
	}

	public function addWish($product,$id)
	{
		$newProduct = ['productName'=>null,'price'=>0,'color'=>null,'image'=>null,'discount'=>0];
		if(!empty($this->products)){
			if(array_key_exists($id,$this->products))
			{
				$newProduct = $this->products[$id];
			}
		}
		$newProduct['productName'] = $product['productName'];
		$newProduct['price'] = $product['price'];
		$newProduct['color'] = $product['color'];
		$newProduct['image'] = $product['image'];
		$newProduct['discount'] = $product['discount'];
		$this->products[$id] = $newProduct;
	}

	public function deleteWish($id)
	{
		if(!empty($this->products))
		{
			if(array_key_exists($id,$this->products))
			{
				unset($this->products[$id]);
			}
		}
	}
}