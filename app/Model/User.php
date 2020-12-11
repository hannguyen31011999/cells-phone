<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    //
    use SoftDeletes;

    protected $table = "user";

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'fullname',
        'gender',
        'birth_date',
        'phone',
        'address',
        'point',
        'status',
        'role',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
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
