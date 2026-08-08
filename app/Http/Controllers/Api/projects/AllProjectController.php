<?php

namespace App\Http\Controllers\Api\projects;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectsResource;
use App\Models\Projects;
use Illuminate\Http\Request;

class AllProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::with(['projectSkills:project_id,skill_id', 'projectSkills.skill:id,image'])->latest()->get();
        if ($projects->isEmpty()) {
            return (ProjectsResource::collection($projects))->response()->setStatusCode(404);
        } else {
            return (ProjectsResource::collection($projects))->response()->setStatusCode(200);
        }
    }
}