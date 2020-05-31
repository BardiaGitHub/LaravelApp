<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;

class Texts extends Model
{
    protected $table = 'pocr_texts';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'userid',
        'text',
        'date'
    ];

    public function texts() {
        return $this->hasMany('App\Texts');
    }
    
    public function userid() {
        return $this->belongsTo('App\Users', 'userid');
    }
}
