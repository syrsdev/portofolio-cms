<?php

namespace App\Http\Controllers\Api\home;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skills;

class SkillController extends Controller
{

    public function index()
    {
        $skills = Skills::all();
        return SkillResource::collection($skills);
    }
}