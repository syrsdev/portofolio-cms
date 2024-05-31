<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Contact Info";
        $isDataExist = Contacts::all()->count();
        $email = Contacts::pluck('email')->first();
        $telp = Contacts::pluck('telp')->first();
        $linkedin = Contacts::pluck('linkedin')->first();
        $instagram = Contacts::pluck('instagram')->first();
        $github = Contacts::pluck('github')->first();
        $spotify = Contacts::pluck('spotify')->first();

        return view('pages.contacts', compact('title', 'isDataExist', 'email', 'telp', 'linkedin', 'instagram', 'github', 'spotify'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'email' => 'nullable|email',
            'telp' => 'nullable',
            'linkedin' => 'nullable',
            'instagram' => 'nullable',
            'github' => 'nullable',
            'spotify' => 'nullable',
        ]);

        Contacts::create($credential);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
