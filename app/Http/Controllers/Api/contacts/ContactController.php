<?php

namespace App\Http\Controllers\Api\contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $telp = Contacts::pluck('telp')->first();
        $email = Contacts::pluck('email')->first();
        $spotify = Contacts::pluck('spotify')->first();
        $github = Contacts::pluck('github')->first();
        $linkedin = Contacts::pluck('linkedin')->first();
        $instagram = Contacts::pluck('instagram')->first();


        $contacts = [
            'telp' => $telp,
            'email' => $email,
            'spotify' => $spotify,
            'instagram' => $instagram,
            'github' => $github,
            'linkedin' => $linkedin,
        ];

        return new ContactResource($contacts);
    }
}