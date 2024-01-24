<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\galeri;
use Illuminate\Http\Request;

class ClientGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri =  galeri::all();
        return view('client.galeri', compact('galeri'));
    }
}
