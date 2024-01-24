<?php

namespace App\Http\Controllers\Admin;

use App\Models\artikel;
use App\Models\event;
use App\Models\galeri;
use App\Models\profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Capres;
use Illuminate\Http\Request;

class AdminCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = event::count();
        $artikel = artikel::count();
        $galeri = galeri::count();
        $profile = profile::count();
        return view('admin.index', compact('event', 'artikel', 'galeri', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function __construct()
    {
        $this->middleware('guest')->except('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');
    }
}
