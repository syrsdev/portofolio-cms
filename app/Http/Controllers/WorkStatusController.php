<?php

namespace App\Http\Controllers;

use App\Models\Work_status;
use Illuminate\Http\Request;

class WorkStatusController extends Controller
{
    public function index(Request $request){
        $title = "Work Status";
        $active = "work";
        $subActive = "status";
        $titleModal = 'Delete ' . $title;
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);
        $data = Work_status::all();
        return view('pages.work.status.index', compact('title', 'active', 'subActive', 'data'));
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'title' => 'required', 
        ]);

        Work_status::create($credentials);
    
        return redirect()->back()->with('success', 'Working Status Added');
    }

    public function delete($iddel){
        $data = Work_status::find($iddel);
        $data->delete();
        return redirect()->back()->with('success', 'Working Status Deleted');
    }
}
