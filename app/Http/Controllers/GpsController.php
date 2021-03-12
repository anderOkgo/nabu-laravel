<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GpsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }

    public function index()
    {
        return view('gps.index');
    }
}
