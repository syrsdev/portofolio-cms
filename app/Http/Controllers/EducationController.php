<?php

namespace App\Http\Controllers;

use App\Models\Educations;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Educations';
        $data = Educations::all();
        $active = 'about';
        $subActive = 'educations';
        $titleModal = 'Delete ' . $title;
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);
        return view('pages.educations.index', compact('title', 'active', 'subActive', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Educations Create';
        $active = 'about';
        $subActive = 'educations';
        return view('pages.educations.create', compact('title', 'active', 'subActive'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        Educations::create($credentials);
        return redirect()->route('educations.index')->with('success', 'Education created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Educations Edit';
        $active = 'about';
        $subActive = 'educations';
        $data = Educations::find($id);
        return view('pages.educations.edit', compact('title', 'active', 'subActive', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        if ($request->end_date == null) {
            $credentials['end_date'] = null;
        };
        Educations::find($id)->update($credentials);
        return redirect()->route('educations.index')->with('success', 'Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Educations::find($id)->delete();
        return redirect()->route('educations.index')->with('success', 'Education deleted successfully');
    }
}
