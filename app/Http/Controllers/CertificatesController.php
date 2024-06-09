<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Certificates';
        $data = Certificates::all();
        $titleModal = 'Delete ' . $title;
        $active = 'about';
        $subActive = 'certificates';
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);
        return view('pages.certificates.index', compact('title', 'data', 'active', 'subActive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Certificates';
        return view('pages.certificates.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('certificates/', $filename);
            $credential['image'] = $filename;
        }

        Certificates::create($credential);
        return redirect('/dashboard/certificates')->with('success', 'Certificates created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Certificates';
        $data = Certificates::find($id);
        return view('pages.certificates.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $credential = $request->validate([
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $certificate = Certificates::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($certificate->image && file_exists('certificates/' . $certificate->image)) {
                unlink('certificates/' . $certificate->image);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('certificates/', $filename);
            $credential['image'] = $filename;
        }

        $certificate->update($credential);

        return redirect('/dashboard/certificates')->with('success', 'Certificate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificates::find($id);
        if ($certificate->image && file_exists('certificates/' . $certificate->image)) {
            unlink('certificates/' . $certificate->image);
        }
        $certificate->delete();
        return redirect('/dashboard/certificates')->with('success', 'Certificate deleted successfully');
    }
}
