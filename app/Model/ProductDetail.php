<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductDetail extends Model
{
    //
    use SoftDeletes;
    protected $table = "product_detail";

    protected $primaryKey = "id";

    protected $fillable = [
    	'id',
    	'product_id',
    	'price_product',
    	'qty',
    	'rom',
    	'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $timestamps = true;

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
