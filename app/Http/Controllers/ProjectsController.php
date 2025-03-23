<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Projects::all();
        $title = 'Projects';
        $active = 'portfolio';
        $subActive = 'projects';
        $titleModal = 'Delete ' . $title;
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);
        return view('pages.portfolio.index', compact('title', 'data', 'active', 'subActive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Projects';
        $active = 'portfolio';
        $subActive = 'projects';
        return view('pages.portfolio.create', compact('title', 'active', 'subActive'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable',
            'github_link' => 'nullable',
            'figma_link' => 'nullable',
        ]);

        $credentials['slug'] = Str::slug($credentials['title']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/projects'), $filename);
            $url = url('/images/projects/' . $filename);
            $credentials['image'] = $url;
        }

        Projects::create($credentials);
        return redirect('/dashboard/projects')->with('success', 'Project created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Projects::find($id);
        $isDataExist = $data->count() > 0 ? true : false;
        $title = 'Projects';
        $active = 'portfolio';
        $subActive = 'projects';
        return view('pages.portfolio.edit', compact('title', 'active', 'subActive', 'data', 'isDataExist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credentials = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable',
            'github_link' => 'nullable',
            'figma_link' => 'nullable',
        ]);

        $project = Projects::findOrFail($id);

        if ($request->hasFile('image')) {
            if (basename($project->image) && file_exists('images/projects/' . basename($project->image))) {
                unlink('images/projects/' . basename($project->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/projects/', $filename);
            $url = url('/images/projects/' . $filename);
            $credentials['image'] = $url;
        }

        $credentials['slug'] = Str::slug($credentials['title']);

        $project->update($credentials);
        return redirect('/dashboard/projects')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = projects::find($id);
        if (basename($project->image) && file_exists('images/projects/' . basename($project->image))) {
            unlink('images/projects/' . basename($project->image));
        }
        $project->delete();
        return redirect('/dashboard/projects')->with('success', 'project deleted successfully');
    }
}