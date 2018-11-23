<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Link;
use App\Model\Post;
use App\Model\Project;
use App\Model\Role;
use App\Model\Tag;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends BackendController
{
    private $_user      ;
    private $_project   ;
    private $_link      ;
    private $_role      ;
    private $_category  ;

    public function __construct(User $user, Project $project, Link $link, Category $category){
        $this->_user        = $user;
        $this->_project     = $project;
        $this->_link        = $link;
        $this->_category    = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $users       = $this->_user->fetchAll();
        $projects    = $this->_project->fetchAll();
        $links       = $this->_link->fetchAll();
        $categories  = $this->_category->fetchAll();

        return view("backend.admin.index",compact("users","projects","links","categories"));
    }

    public function index()
    {
        $users = $this->_user->fetchAll();
        return view("backend.user.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->_user->toggleUser($id);
    }
}
