<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	protected $table = "province";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'name',
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

    public function Districts()
    {
        return $this->hasMany('App\Model\District','province_id','id');
    }
}
