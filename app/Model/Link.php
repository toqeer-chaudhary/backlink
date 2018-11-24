<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'project_id', 'back_link','user_id'
    ];

    // single category
    public function project(){
        return $this->belongsTo(Project::class);
    }

    // single user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // all
    public function fetchAll(){
        return self::all();
    }

    public function fetchByLoggedInUser(){
        return auth()->user()->links;
    }

    // store
    public function storeLink($request){
        $link = new Link();
        $link->create($request);
    }

    // update
    public function updateLink($request,$link){
        $link->update($request);
    }

    // delete
    public function deleteLink($project){
        $project->delete();
    }
}
