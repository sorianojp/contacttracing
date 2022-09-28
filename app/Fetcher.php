<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fetcher extends Model
{
    protected $fillable = [
        'guardian_id',
        'lastname',
        'firstname',
        'mi',
        'address',
        'email',
        'contactno',
        'image',
        'verification'
    ];

    public function times(){
        return $this->hasMany('App\Time');
    }

    public function guardian(){
        return $this->belongsTo('App\Guardian');
    }

    public function getFullNameAttribute()
    {
        return "{$this->lastname}, {$this->firstname} {$this->mi}";
    }
}
