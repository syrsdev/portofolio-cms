<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\ProjectSkills;
use App\Models\Skills;
use Illuminate\Http\Request;

class ProjectSkillController extends Controller
{
    public function index(Request $request, $id){
        $title = "Project Skills";
        $active = "portfolio";
        $subActive = "projects";
        $titleModal = 'Delete ' . $title;
        $text = "Are you sure you want to delete?";
        confirmDelete($titleModal, $text);
        $project = Projects::find($id);
        $projectID = $project->id;
        
        $data = ProjectSkills::with('skill')->where('project_id', $projectID)->get();
        $skills = Skills::whereNotIn('id', $data->pluck('skill_id'))->get();
        return view('pages.portfolio.skill.index', compact('title', 'active', 'subActive', 'skills', 'projectID', 'data'));
    }

    public function store(Request $request, $id){
        $credentials = $request->validate([
            'skill_id' => 'required|array', 
            'skill_id.*' => 'exists:skills,id',
        ]);
    
        $project = Projects::findOrFail($id);
    
        foreach ($credentials['skill_id'] as $skillId) {
            ProjectSkills::create([
                'project_id' => $project->id,
                'skill_id' => $skillId,
            ]);
        }
    
        return redirect()->back()->with('success', 'Project Skill Added');
    }

    public function delete(string $id, $iddel){
        $data = ProjectSkills::find($iddel);
        $data->delete();
        return redirect()->back()->with('success', 'Project Skill Deleted');
    }
}
