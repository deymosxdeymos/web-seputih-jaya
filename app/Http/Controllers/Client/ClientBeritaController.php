<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;

class ClientBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel =  artikel::all();
        return view('client.berita', compact('artikel'));
    }
    public function show(string $judul)
    {
        $artikel =  artikel::where('judul', $judul)->first();

        return view('client.berita_read', compact('artikel'));
    }
}
