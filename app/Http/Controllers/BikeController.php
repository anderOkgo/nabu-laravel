<?php

namespace App\Http\Controllers;
use App\Bike;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\BikeFormRequest;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Bike::select('*'))
            ->addColumn('actions', 'bikes.actions')
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('bikes/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('bikes.create', ['usuarios' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BikeFormRequest $request)
    {
        $bici           = new Bike();
        $bici->color    = request('color');
        $bici->brand    = request('marca');
        $bici->serial   = request('serial');
        $bici->user_id   = request('usuario');
        if ($request->hasFile('factura')) {
            $file = $request->factura;
            $path = $request->factura->store('facturas', 'public');
            //$file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $bici->invoice_path = $path;
        }

        if ($request->hasFile('foto')) {
            $file = $request->foto;
            $path = $request->foto->store('fotos', 'public');
            $bici->photo_path = $path;
        }
        
        $bici->save();

        return redirect('/bikes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bike  = Bike::findOrFail($id);
        $users =  User::all();
        return view('bikes.edit', ['bike' => $bike, 'users' => $users ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bici           = Bike::findOrFail($id);
        $bici->color    = request('color');
        $bici->brand    = request('marca');
        $bici->serial   = request('serial');
        $bici->user_id  = request('usuario');
        
        if ($request->hasFile('factura')) {
            $file = $request->factura;
            $path = $request->factura->store('facturas', 'public');
            //$file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $bici->invoice_path = $path;
        }

        if ($request->hasFile('foto')) {
            $file = $request->foto;
            $path = $request->foto->store('fotos', 'public');
            $bici->photo_path = $path;
        }
        
        $bici->update();

        return redirect('/bikes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bici  = Bike::findOrFail($id);
        $bici->delete();
        return redirect('/bikes');
    }
}
