<?php

namespace App\Http\Controllers;
use App\Bike;
use App\User;
use App\Role;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\BikeFormRequest;

class BikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //bike_visor
        //dd(Auth::user()->tieneRole()[0] !=="administrador");

        if(Auth::user()->tieneRole()[0] !== "administrador" )
        {
            if (Auth::user()->tieneRole()[0] !=="bikes") {

                abort(403);
            }
        }

        if(Auth::user()->tieneRole()[0] == "bikes")
        {
            $Bike =     Bike::all();
            $bikes = $Bike->where('user_id', Auth::user()->id);
        } else {

            $bikes = Bike::select('*');
        }


        if($request->ajax()) {
            return datatables()->of($bikes)
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
        
        if(Auth::user()->tieneRole()[0] == "bikes")
        {
            $users =  User::all()->where('id', Auth::user()->id);

        } else {
            if(Auth::user()->tieneRole()[0] == "administrador") {

                $users =  User::all();

            } else {
                abort(403);
            }

        }
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
        $bici->type     = request('tipo');
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

       
        
        $bici->save();
        $qr = url('bikes') .'/'. $bici->id;
        QrCode::format('png')->size(500)->generate($qr , public_path() . '/qrcodes/' . $bici->id . '.png');
        $bici->code_path = '/qrcodes/' . $bici->id . '.png';
        $bici->update();
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
        $bike  = Bike::findOrFail($id);
        //$users =  User::all();
        if(Auth::user()->tieneRole()[0] == "bikes")
        {
            if(Auth::user()->id == Bike::select('user_id')->where('id', $id)->get()->pluck('user_id')[0]  ) {

                $users =  User::all()->where('id', Auth::user()->id);
            }
            else {
                if (Auth::user()->tieneRole()[0] == "bike_visor") {
                    $users =  User::all()->where('id', Auth::user()->id);
                }
                abort(403);
            }

        } else {

            if(Auth::user()->tieneRole()[0] == "administrador" || Auth::user()->tieneRole()[0] == "bike_visor") {

                $users =  User::all();

            } else {
                abort(403);
            }

        }
        return view('bikes.show', ['bike' => $bike, 'users' => $users ]);
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
        if(Auth::user()->tieneRole()[0] == "bikes")
        {
            if(Auth::user()->id ==Bike::select('user_id')->where('id', $id)->get()->pluck('user_id')[0] ) {

                $users =  User::all()->where('id', Auth::user()->id);
            }
            else {
                abort(403);
            }

        } else {

            if(Auth::user()->tieneRole()[0] == "administrador") {

                $users =  User::all();

            } else {
                abort(403);
            }

        }
       
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
        $bici->type     = request('tipo');
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
