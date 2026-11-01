<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teknologi' => 'required|string|max:255',
            'status' => 'required|string|in:Selesai,In Progress',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'teknologi', 'status']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Project::create($data);

        return redirect()->route('admin.project.index')->with('success', 'Project berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.project.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teknologi' => 'required|string|max:255',
            'status' => 'required|string|in:Selesai,In Progress',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'teknologi', 'status']);

        if ($request->hasFile('image')) {
            if ($project->image && ! str_starts_with($project->image, 'project') && file_exists(public_path('images/'.$project->image))) {
                unlink(public_path('images/'.$project->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        if ($project->image && ! str_starts_with($project->image, 'project') && file_exists(public_path('images/'.$project->image))) {
            unlink(public_path('images/'.$project->image));
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Project berhasil dihapus.');
    }
}
