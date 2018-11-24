<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'url', 'description', 'category_id'
    ];

    // single category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // single user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // multiple links
    public function links(){
        return $this->belongsTo(Link::class);
    }

    // all
    public function fetchAll(){
        return self::all();
    }

    // store
    public function storeProject($request){
        $project = new Project();
        $project->create($request);
    }

    // update
    public function updateProject($request,$project){
        $project->update($request);
    }

    // delete
    public function deleteProject($project){
        $project->delete();
    }
}
