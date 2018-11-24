<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'is_admin', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Tag
    public function tags() {
        return $this->hasMany(Tag::class);
    }

    // Post
    public function projects() {
        return $this->hasMany(Project::class);
    }

    // links
    public function links() {
        return $this->hasMany(Link::class);
    }

    // single user
    public function findUser($id){
        return self::find($id);
    }

    // all users
    public function fetchAll(){
        return self::all();
    }

    // toggle the user list
    public function toggleUser($id){
        $user = self::findUser($id);
        if ($user->status == 0){ // if blocked
            $user->status = 1; // then unblock
            $user->update();
            return $user->status ;
        } else {
            $user->status = 0; // blocked
            $user->update();
            return $user->status ;
        }
    }

}
