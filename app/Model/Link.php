<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'project_id', 'url'
    ];

    // single category
    public function project(){
        return $this->belongsTo(Project::class);
    }

    // all
    public function fetchAll(){
        return self::all();
    }
}
