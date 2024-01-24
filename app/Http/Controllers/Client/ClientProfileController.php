<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\profile;
use Illuminate\Http\Request;

class ClientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile =  profile::get();
        return view('client.profile', compact('profile'));
    }
}
