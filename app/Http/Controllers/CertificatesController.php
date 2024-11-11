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
        $active = 'about';
        $subActive = 'certificates';
        $titleModal = 'Delete ' . $title;
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
        $active = 'about';
        $subActive = 'certificates';
        return view('pages.certificates.create', compact('title', 'active', 'subActive'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/certificates/', $filename);
            $url = url('/images/certificates/' . $filename);
            $credential['image'] = $url;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('files/certificates/', $filename);
            $url = url('/files/certificates/' . $filename);
            $credential['file'] = $url;
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
        $active = 'about';
        $subActive = 'certificates';
        return view('pages.certificates.edit', compact('title', 'data', 'active', 'subActive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $credential = $request->validate([
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $certificate = Certificates::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (basename($certificate->image) && file_exists('images/certificates/' . basename($certificate->image))) {
                unlink('images/certificates/' . basename($certificate->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/certificates/', $filename);
            $url = url('/images/certificates/' . $filename);
            $credential['image'] = $url;
        }
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if (basename($certificate->file) && file_exists('files/certificates/' . basename($certificate->file))) {
                unlink('files/certificates/' . basename($certificate->file));
            }

            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('files/certificates/', $filename);
            $url = url('/files/certificates/' . $filename);
            $credential['file'] = $url;
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
        if (basename($certificate->image) && file_exists('images/certificates/' . basename($certificate->image))) {
            unlink('images/certificates/' . basename($certificate->image));
        }
        $certificate->delete();
        return redirect('/dashboard/certificates')->with('success', 'Certificate deleted successfully');
    }
}
