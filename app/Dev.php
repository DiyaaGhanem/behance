<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    protected $fillable = [
        'name', 'email', 'spec', 'img'
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }  
}
