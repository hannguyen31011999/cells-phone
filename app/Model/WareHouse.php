<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class WareHouse extends Model
{
	use SoftDeletes;

    protected $table = "warehouse";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'user_id',
    	'attribute_product_id',
    	'price',
    	'qty',
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
