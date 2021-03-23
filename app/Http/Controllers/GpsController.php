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
            case "ubicacion":
                return view('gps.ubicacion', ['id' => $id] );
                break;
            case "apagarveh":
                return view('gps.apagarveh', ['id' => $id] );
                break;
            case "config_geocerca":
                return view('gps.config_geocerca', ['id' => $id] );
                break;
            case "geocerca":
                return view('gps.geocerca', ['id' => $id] );
                break;
            case "gprs":
                return view('gps.gprs', ['id' => $id] );
                break;
            case "operador":
                return view('gps.operador', ['id' => $id] );
                break;
            case "reinicio":
                return view('gps.reinicio', ['id' => $id] );
                break; 
            case "pass":
                return view('gps.pass', ['id' => $id] );
                break;
            case "reportes":
                return view('gps.reportes', ['id' => $id] );
                break;
            case "servidor":
                return view('gps.servidor', ['id' => $id] );
                break;
            case "sleep":
                return view('gps.sleep', ['id' => $id] );
                break;
            case "tels":
                return view('gps.tels', ['id' => $id] );
                break;
            case "zona":
                return view('gps.zona', ['id' => $id] );
                break;
                
        }
    }
}
