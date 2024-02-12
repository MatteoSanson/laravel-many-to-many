<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $project = new Project();
        $project->title = $data['title'];
        $project->type_id = $data['type_id'];
        // $project->language_framework = $data['language_framework'];
        $project->visibility = $data['visibility'];

        // Genera lo slug e verifica se esiste già
        $slug = Str::slug($data['title']);
        $count = Project::where('slug', $slug)->count();
        if ($count > 0) {
        // Se lo slug esiste già, aggiungi un numero sequenziale
        $slug = $slug . '-' . ($count + 1);
        }
        $project->slug = $slug;

        $project->save();

        return redirect()->route('admin.projects.show', $project->slug)->with('message', 'Progetto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
    
        // Aggiorna il titolo e altri campi
        $project->title = $data['title'];
        $project->type_id = $data['type_id'];
        // $project->language_framework = $data['language_framework'];
        $project->visibility = $data['visibility'];

        // Genera lo slug e verifica se esiste già
        $slug = Str::slug($data['title']);
        $count = Project::where('slug', $slug)->where('id', '!=', $project->id)->count();
        if ($count > 0) {
            // Se lo slug esiste già, aggiungi un numero sequenziale
            $slug = $slug . '-' . ($count + 1);
        }

        $project->slug = $slug;

        $project->save();

        return redirect()->route('admin.projects.show', $project->slug)->with('message', 'Progetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Hai eliminato un progetto!');
    }
}
