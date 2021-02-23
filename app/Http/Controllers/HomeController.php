<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Notas;
use App\Bike;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_users  = User::count();
        $count_roles = Role::count();
        $count_notas  = Notas::count();
        $count_bikes  = Bike::count();
        return view('home', compact('count_users','count_roles','count_notas', 'count_bikes'));
    }
}
