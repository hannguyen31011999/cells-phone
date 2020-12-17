<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{
	use SoftDeletes;

	protected $table = "review";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'user_id',
    	'product_id',
    	'product_detail_id',
        'name',
    	'email',
    	'point',
    	'content',
    	'status',
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

    public function Users()
    {
    	return $this->belongsTo('App\Model\User','user_id','id');
    }
}
