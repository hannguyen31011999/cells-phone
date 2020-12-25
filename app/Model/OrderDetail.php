<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetail extends Model
{
	use SoftDeletes;
	protected $table = "order_detail";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
        'id',
    	'order_id',
    	'attribute_product_id',
        'product_name',
    	'qty',
    	'product_price',
        'discount',
    	'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'created_at'=>'datetime:d/m/Y - H:i',
        'updated_at'=>'datetime:d/m/Y - H:i'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
