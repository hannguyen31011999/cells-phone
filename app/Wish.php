<?php
namespace App;

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
		$newProduct = ['productName'=>null,'price'=>0,'image'=>null,'color'=>null];
		if(!empty($this->products)){
			if(array_key_exists($id,$this->products))
			{
				$newProduct = $this->products[$id];
			}
		}
		$newProduct['productName'] = $product['productName'];
		$newProduct['price'] = $product['price'];
		$newProduct['image'] = $product['image'];
		$newProduct['color'] = $product['color'];
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