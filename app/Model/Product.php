<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
    protected $table = "product";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'categories_id',
    	'discount_id',
    	'product_name',
        'color',
        'desc',
    	'screen',
    	'screen_resolution',
    	'operating_system',
    	'version_operating_system',
    	'cpu',
    	'gpu',
    	'ram',
    	'camera_fr',
    	'camera_ba',
    	'video',
    	'pin',
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
        return $this->hasMany("App\Model\ProductDetail",'product_id','id');
    }

    public function ListImages()
    {
        return $this->hasMany('App\Model\ListImage','product_id','id');
    }

    public function CountProductDetails()
    {
        return $this->hasMany("App\Model\ProductDetail",'product_id','id')->count();
    }
}
