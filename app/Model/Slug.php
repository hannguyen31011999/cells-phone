<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
	protected $table = "slug";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'product_id',
    	'product_detail_id',
        'url',
    	'image',
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

    public function ProductDetails()
    {
        return $this->belongsTo('App\Model\ProductDetail','product_detail_id','id');
    }

    public function Products()
    {
        return $this->belongsTo('App\Model\Product','product_id','id');
    }
}
