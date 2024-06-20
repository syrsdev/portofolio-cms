<?php

namespace App\Http\Controllers;

use App\Models\experience;
use App\Models\Work_status;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Work Experience";
        $active = "work";
        $subActive = "experience";
        $titleModal = 'Delete ' . $title;
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);

        $data = experience::with('status')->get();
        return view('pages.work.experience.index', compact('title', 'active', 'subActive', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Work Experience";
        $active = "work";
        $subActive = "experience";

        $status = Work_status::all();
        return view('pages.work.experience.create', compact('title', 'active', 'subActive', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'position' => 'required',
            'company' => 'required',
            'location' => 'required',
            'location_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status_id' => 'required',
        ]);

        experience::create($credentials);
        return redirect()->route('WorkExperience.index')->with('success', 'Data Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Work Experience";
        $active = "work";
        $subActive = "experience";

        $status = Work_status::all();
        $data = experience::find($id);
        return view('pages.work.experience.edit', compact('title', 'active', 'subActive', 'status', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credentials = $request->validate([
            'position' => 'required',
            'company' => 'required',
            'location' => 'required',
            'location_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status_id' => 'required',
        ]);

        $data = experience::find($id);
        $data->update($credentials);
        return redirect()->route('WorkExperience.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = experience::find($id);
        $data->delete();
        return redirect()->route('WorkExperience.index')->with('success', 'Data Deleted Successfully');
    }
}
