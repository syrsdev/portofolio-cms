<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'About';
        $data = About::first();
        $isDataExist = About::all()->count() > 0 ? true : false;
        $active = 'about';
        $subActive = 'about';

        return view('pages.about', compact('title', 'data', 'isDataExist', 'active', 'subActive'));
    }

    
    public function store(Request $request)
    {
        $credential = $request->validate([
            'about' => 'required',
            'address' => 'required',
        ]);

        About::create($credential);
        return redirect()->back()->with('success', 'Data has been added');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credential = $request->validate([
            'about' => 'required',
            'address' => 'required',
        ]);

        $data = About::find($id);
        $data->update($credential);
        return redirect()->back()->with('success', 'Data has been updated');
    }
}
