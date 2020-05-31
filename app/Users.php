<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'pocr_users';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password'
    ];

    public function users() {
        return $this->hasMany('App\Users');
    }
}
