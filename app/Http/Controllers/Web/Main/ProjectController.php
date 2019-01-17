<?php

namespace App\Http\Controllers\Web\Main;

use App\Http\Resources\ProjectResource;
use App\Project;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.projects.list',['projects'=>Project::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('main.projects.page',['project'=>$project]);
    }
}
