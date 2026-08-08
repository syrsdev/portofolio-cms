<?php

namespace App\Http\Controllers\Api\home;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectsResource;
use App\Models\Projects;

class RecentProjectsController extends Controller
{
    public function index()
    {
        $recentProjects = Projects::with(['projectSkills:project_id,skill_id', 'projectSkills.skill:id,image'])->latest()->limit(3)->get();

        // return response()->json(['data' => $recentProjects]);
        if ($recentProjects->isEmpty()) {
            return (ProjectsResource::collection($recentProjects))->response()->setStatusCode(404);
        } else {
            return ProjectsResource::collection($recentProjects)->response()->setStatusCode(200);
        }
    }
}