<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $table = "district";

    protected $primaryKey = "id";


    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'province_id',
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

    public function Wards()
    {
        return $this->hasMany('App\Model\Ward','district_id','id');
    }
}
