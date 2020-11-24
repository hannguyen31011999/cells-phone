<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Discount extends Model
{
    //
	use SoftDeletes;

    protected $table = "discount";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'discount_name',
    	'discount_type',
    	'discount_value',
    	'discount_end',
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
