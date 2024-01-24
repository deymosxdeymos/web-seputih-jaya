<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\event;
use Illuminate\Http\Request;

class ClientEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event =  event::all();
        return view('client.event', compact('event'));
    }
}
