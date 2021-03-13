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

    public function index($id)
    {
        //dd($id);
        switch ($id) {
            case "inicio":
                return view('gps.inicio', ['id' => $id] );
                break;
            case "tels":
                //dd($id);
                return view('gps.tels', ['id' => $id] );
                break;
            case "pass":
                return view('gps.pass', ['id' => $id] );
                break;
        }
    }
}
