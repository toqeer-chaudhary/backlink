<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Link;
use App\Model\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Excel;
use File;

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
        if ($request->hasFile("backLinkFile")){
          return $this->import($request);
        } else {
           return $this->validateAndStoreLinks($request);
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

    // function to validate and store links
    public function validateAndStoreLinks($request){
        $backlinks = explode("\n",$request->back_link);
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
             return $i . " Links Are Stored Out Of ". count($backlinks);
         } else {
             return 0;
         }
    }

    // function to read data from excel file
    public function import($request){
        //validate the xls file
        if($request->hasFile('backLinkFile')){
            $extension = File::extension($request->file("backLinkFile")->getClientOriginalname());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file("backLinkFile")->getRealPath(); // getting path of excel file
                $data = Excel::load($path, function($reader) {})->get(); // getting data from excel file

                if(!empty($data) && $data->count()){
                    // initializing the variables only if the condition true
                    $backLinksArrays = [];
                    $duplicateArray = [];
                    $i = 0;
                    foreach ($data as $key => $value) {
                        $backlink = $value->backlinks;  // retrieving the required result from the data
                        if (ctype_space($backlink) || $backlink == "," || empty($backlink) || !is_string($backlink)) {
                            continue;
                        } elseif (in_array($backlink,$duplicateArray)) {
                            // checking if data is dubplicated
                            continue;
                        } else {
                            // if data is not duplicated then store it in duplicate array and store the data
                            // further in database
                            $i++;
                            array_push($duplicateArray,$backlink); // if backlink not exist it will store
                            $backLinksList["user_id"] = auth()->id();
                            $backLinksList["project_id"] = $request->project_id;
                            $backLinksList["back_link"] = $backlink ;
                            $backLinksList["created_at"] = now() ;
                            array_push($backLinksArrays,$backLinksList); // array of rows/objects
                        }
                    }
                    $result = $this->_link->storeLink($backLinksArrays); // storing data in db
                    if ($result && $i > 0){
                        return " " . $i . " Links Are Stored Out Of ". $data->count();
                    } else {
                        return 0;
                    }
                }
            } else {
                return redirect()->back()->with("error", "Only Excel file required");
            }
        }
    }

    // testing{
        function check_url($url = "https://www.youtube.com") {
//
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $headers = curl_getinfo($ch);
            dd($headers);
            curl_close($ch);

            return $headers['http_code'];
        }
}
