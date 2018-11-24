<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Link;
use App\Model\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends FrontendController
{
    private $_project;
    private $_link;
    public function __construct(Project $project, Link $link){
        $this->_project = $project;
        $this->_link    = $link;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->_project->fetchByLoggedInUser();
        $links    = $this->_link->fetchByLoggedInUser();
        return view("frontend.link.index",compact("projects","links"));
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
        $request["user_id"] = auth()->id();
        $this->_link->storeLink($request->all());
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
    public function update(Request $request, Link $link)
    {
        $request["user_id"] = auth()->id();
        $this->_link->updateLink($request->all(),$link);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $this->_link->deleteLink($link);
    }
}
