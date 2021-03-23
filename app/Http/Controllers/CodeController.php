<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Code;
use Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        if($request->ajax()) {
            $codes = Code::all();
            //dd($codes);
            return DataTables::of($codes)
                ->addColumn('rol', function($code) {
                    return Role::find($code->role_id)->name;
                })
                ->addColumn('user', function($code) {
                    $user = User::find($code->user_id);
                    return is_null($user) ? 'No asignado' : $user->name;
                })
                ->addColumn('action', 'codes.actions')
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('codes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        $roles = Role::all();
        return view('codes.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        for($i = 1; $i <= request('cantidad'); $i++ ) {
            $code   = new Code();
            $codigo = $this->generarCodigo(8);

            while (Code::where(['code'=> $codigo])->get()->count() > 0) {
                $codigo = $this->generarCodigo(8);
            }
            $code->code = $codigo;
            $code->role_id  = request('rol');
            $code->save();
        }

        return redirect('/codes');
    }

    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
        return $key;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        $code = Code::findOrFail($id);
        $code->delete();
        return redirect('/codes');
    }
}
