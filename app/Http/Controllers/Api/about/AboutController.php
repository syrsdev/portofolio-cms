<?php

namespace App\Http\Controllers\Api\about;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificatesResource;
use App\Http\Resources\EducationResource;
use App\Http\Resources\ExperienceResource;
use App\Models\About;
use App\Models\Certificates;
use App\Models\Educations;
use App\Models\experience;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::pluck('about')->first();
        $education = Educations::latest()->get();
        $experience = experience::with('status:id,title')->latest()->get();
        $certificates = Certificates::latest()->get();
        $data = [
            'about' => $about,
            'certificates' => CertificatesResource::collection($certificates),
            'education' => EducationResource::collection($education),
            'experience' => ExperienceResource::collection($experience),
        ];

        return response()->json(['data' => $data]);
    }
}