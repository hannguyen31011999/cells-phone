<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ListImage extends Model
{
	use SoftDeletes;

    protected $table = "list_image";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'product_id',
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
}
