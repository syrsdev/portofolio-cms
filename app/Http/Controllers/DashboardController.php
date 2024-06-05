<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'CMS Portfolio Dashboard';
        $allCertificates = Certificates::all()->count();
        return view('pages.dashboard', compact('title','allCertificates'));
    }
}
