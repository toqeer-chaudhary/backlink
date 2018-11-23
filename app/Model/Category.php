<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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
        'user_id', 'name'
    ];

    // Post
    public function projects() {
        return $this->hasMany(Project::class);
    }

    // User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // all categories
    public function fetchAll(){
        return Self::all();
    }

    // posts against the category
    public function fetchPostsByCategoryId($categoryId) {
        $category = Self::find($categoryId);
        if ($category) {
            return $category->projects()->paginate(2);
        } else {
            return view("error.pageNotFound");
        }
    }

    public function storeCategory($request){
        $category = new Category();

        $category->user_id = auth()->id();
        $category->name = $request->name;
        $category->save();
    }

    public function editCategory($request){
        $category = self::find($request->categoryId);

        $category->user_id = auth()->id();
        $category->name = $request->name;
        $category->update();
    }

    public function deleteCategory($categoryId){
        $category = self::find($categoryId);
        $category->delete();
    }
}
