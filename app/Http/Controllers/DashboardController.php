<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\Educations;
use App\Models\experience;
use App\Models\Projects;
use App\Models\Skills;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'CMS Portfolio Dashboard';
        $active = 'dashboard';
        $subActive = null;
        $allCertificates = Certificates::all()->count();
        $allSkill = Skills::all()->count();
        $allProjects = Projects::all()->count();
        $experience = experience::with('status')->take(5)->get();
        $education = Educations::all();
        return view('pages.dashboard', compact('title','allCertificates', 'allSkill','allProjects','experience','education','active', 'subActive'));
    }
}
