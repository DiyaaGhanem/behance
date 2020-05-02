<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'desc'
    ];

    public function devs()
    {
        return $this->belongsToMany('App\Dev');
    }

    public function imgs()
    {
        return $this->hasMany('App\ProjectImg');
    }
}
