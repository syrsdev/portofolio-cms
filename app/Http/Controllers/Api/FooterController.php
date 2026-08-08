<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FooterResource;
use App\Models\About;
use App\Models\Contacts;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $telp = Contacts::pluck('telp')->first();
        $email = Contacts::pluck('email')->first();
        $spotify = Contacts::pluck('spotify')->first();
        $github = Contacts::pluck('github')->first();
        $linkedin = Contacts::pluck('linkedin')->first();
        $instagram = Contacts::pluck('instagram')->first();

        $address = About::pluck('address')->first();

        $contacts = [
            'telp' => $telp,
            'email' => $email,
            'address' => $address,
            'spotify' => $spotify,
            'github' => $github,
            'linkedin' => $linkedin,
            'instagram' => $instagram
        ];

        return new FooterResource($contacts);
    }
}