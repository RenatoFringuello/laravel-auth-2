<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        $projects = Project::orderBy('end_date', 'ASC')->paginate(24);//24 è divisibile per 2 per 3 e per 4 (nota le classi col-x col-b-x inserite)

        return view('guest.projects.index', compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('guest.projects.show', compact('project'));
    }
}
