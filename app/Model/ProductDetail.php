<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class ProductDetail extends Model
{
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
    ];

    public $timestamps = true;

    protected $casts = [
        'created_at'=>'datetime:d/m/Y - H:i',
        'updated_at'=>'datetime:d/m/Y - H:i'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function AttributeProducts()
    {
        return $this->hasMany('App\Model\AttributeProduct','product_detail_id','id');
    }

    public function slugs()
    {
        return $this->hasMany('App\Model\Slug','product_detail_id','id');
    }

    public function Products()
    {
        return $this->belongsTo('App\Model\Product','product_id','id');
    }

    public function CountReview()
    {
        return $this->hasMany('App\Model\Review','product_detail_id','id')->count();
    }

    public function CountStar($star)
    {
        return $this->hasMany('App\Model\Review','product_detail_id','id')
                        ->where('point',$star)
                        ->count();
    }
}
