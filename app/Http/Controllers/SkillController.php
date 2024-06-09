<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'My Skills';
        $data = Skills::all();
        $active = 'portfolio';
        $subActive = 'skills';
        $titleModal = 'Delete ' . $title;
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);
        return view('pages.skills.index', compact('title', 'active', 'subActive', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Skills';
        $active = 'portfolio';
        $subActive = 'skills';
        return view('pages.skills.create', compact('title', 'active', 'subActive'));
    }

    public function store(Request $request)
    {
        $credential = $request->validate([
            'skill' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/skills/', $filename);
            $credential['image'] = $filename;
        }

        Skills::create($credential);
        return redirect('/dashboard/skills')->with('success', 'Skill created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Skill';
        $data = Skills::find($id);
        $active = 'portfolio';
        $subActive = 'skills';
        return view('pages.skills.edit', compact('title', 'data', 'active', 'subActive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $credential = $request->validate([
            'skill' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $skill = Skills::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($skill->image && file_exists('images/skills/' . $skill->image)) {
                unlink('images/skills/' . $skill->image);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/skills/', $filename);
            $credential['image'] = $filename;
        }

        $skill->update($credential);

        return redirect('/dashboard/skills')->with('success', 'skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skills::find($id);
        if ($skill->image && file_exists('images/skills/' . $skill->image)) {
            unlink('images/skills/' . $skill->image);
        }
        $skill->delete();
        return redirect('/dashboard/skills')->with('success', 'skill deleted successfully');
    }
}
