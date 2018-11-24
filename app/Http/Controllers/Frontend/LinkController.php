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
        $backlinks = explode(",",$request->back_link);
        $duplicateArray = [];
        $backLinksArrays = [];
        $i = 0;
        foreach ($backlinks as $backlink){
            if (in_array($backlink,$duplicateArray)){ // if backlink exist it will continue
                continue;
            } else if(ctype_space($backlink) || $backlink == "," || empty($backlink) || !is_string($backlink)) {
                continue;
            }  else {
                array_push($duplicateArray,$backlink); // if backlink not exist it will store
                $i++;
                $backLinksList["user_id"] = auth()->id();
                $backLinksList["project_id"] = $request->project_id;
                $backLinksList["back_link"] = $backlink ;
                $backLinksList["created_at"] = now() ;
                array_push($backLinksArrays,$backLinksList);
            }
        }
        $result = $this->_link->storeLink($backLinksArrays);
         if ($result && $i > 0){
             return $i . " Links Are Stored Out Of ". count($backlinks) . " rest are duplicate or empty spaces";
         } else {
             return 0;
         }
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
