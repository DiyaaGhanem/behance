<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImg extends Model
{
    protected $fillable = [
        'name', 'project_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
