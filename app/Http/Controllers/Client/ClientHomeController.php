<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel =  artikel::latest()->take(10)->get();
        return view('client.index', compact('artikel'));
    }
}
