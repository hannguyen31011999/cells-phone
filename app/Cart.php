<?php

namespace App;
use Session;
class Cart{

	public $products = null;
	public $totalPrice = 0;
	public $totalQuantity = 0;
	public $totalDiscount = 0;

	public function __construct($cart)
	{
		if($cart)
		{
			$this->products = $cart->products;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuantity = $cart->totalQuantity;
			$this->totalDiscount = $cart->totalDiscount;
		}
	}

	public function addCart($product,$id)
	{
		$newProduct = ['productName'=>null,'price'=>0,'qty'=>0,'color'=>null,'image'=>null,'discount'=>0];
		if(!empty($this->products))
		{
			if(array_key_exists($id,$this->products))
			{
				$newProduct = $this->products[$id];
			}
		}
		$newProduct['productName'] = $product['productName'];
		$newProduct['price'] = $product['price'];
		$newProduct['qty'] += $product['qty'];
		$newProduct['color'] = $product['color'];
		$newProduct['image'] = $product['image'];
		$newProduct['discount'] = $product['discount']*$product['qty'];
		$this->products[$id] = $newProduct;
		$this->totalPrice += $product['price']*$product['qty']-$newProduct['discount'];
		$this->totalDiscount += $newProduct['discount'];
		$this->totalQuantity += $product['qty'];
	}

	public function updateCart($id,$qty)
	{
		if(!empty($this->products))
		{
			if(array_key_exists($id,$this->products))
			{
				$this->totalPrice += ($qty * $this->products[$id]['price'])-($this->products[$id]['price']*$this->products[$id]['qty']);
				$this->totalDiscount += ($this->products[$id]['discount']/$this->products[$id]['qty'])*$qty - $this->products[$id]['discount'];
				$this->totalQuantity += $qty - $this->products[$id]['qty'];
				$this->products[$id]['discount'] = ($this->products[$id]['discount']/$this->products[$id]['qty'])*$qty;
				$this->products[$id]['qty'] = $qty;
			}
		}
	}

	public function deleteCart($id)
	{
		if(!empty($this->products))
		{
			if(array_key_exists($id,$this->products))
			{
				$this->totalPrice -= $this->products[$id]['price']*$this->products[$id]['qty'];
				$this->totalDiscount -= $this->products[$id]['discount'];
				$this->totalQuantity -= $this->products[$id]['qty'];
				unset($this->products[$id]);
			}
		}
	}
}

?>