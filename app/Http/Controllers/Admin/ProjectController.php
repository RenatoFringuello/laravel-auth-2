<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    /**
     * return the data validated
     *
     * @param Request $request
     * @return Array
     */
    protected function getValidatedData(Request $request){
        $validation = [
            'title' => "required|max:50",
            'author_name' => 'required|max:100',
            'author_lastname' => 'required|max:100',
            'content' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'date|nullable',
        ];
        $validationMessages = [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.max' => 'Hai inserito troppi caratteri in title',
            'author_name.required' => 'Il nome dell\'autore è un campo obbligatorio',
            'author_name.max' => 'Hai inserito troppi caratteri per il nome',
            'author_lastname.required' => 'Il cognome dell\'autore è un campo obbligatorio',
            'author_lastname.max' => 'Hai inserito troppi caratteri il cognome',
            'content.required' => 'Il contenuto del progetto è un campo obbligatorio',
            'start_date.required' => 'La data di inizio è un campo obbligatorio',
            'start_date.date' => 'La data di inizio che hai scritto non esiste in nessun calendario neanche in quello dei maya',
            'end_date.date' => 'La data di fine che hai scritto non esiste. Lascia il campo vuoto se il lavoro non è finito',
        ];
        return $request->validate($validation, $validationMessages);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
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
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project  $project)
    {
        $data = $this->getValidatedData($request);
        $data['slug'] = Str::slug($data['title']);
        // dd($data);
        $project->update($data);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project  $project)
    {
        //
    }
}
