<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
	use SoftDeletes;
	protected $table = "order";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
        'id',
    	'customer_id',
    	'payment',
    	'note',
    	'email',
    	'name',
    	'phone',
    	'address',
    	'status',
        'price_ship',
    	'total_price',
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

    public function OrderDetails()
    {
        return $this->hasMany("App\Model\OrderDetail",'order_id','id');
    }

    public function CountOrderDetails()
    {
        return $this->hasMany("App\Model\OrderDetail",'order_id','id')->count();
    }

    public function Users()
    {
        return $this->belongsTo("App\Model\User",'customer_id','id');
    }
}
