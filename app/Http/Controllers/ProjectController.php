<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::paginate(6);

        return view('page.projects', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $projects = $project;

        return view('page.project-detail', compact('project', 'projects'));
    }
}
