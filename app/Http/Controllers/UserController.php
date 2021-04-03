<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use App\User;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        if($request->ajax()) {
            $users = User::all();

            return DataTables::of($users)
                ->addColumn('rol', function($user) {
                    foreach($user->roles as $role) {
                        return $role->name;
                    }
                })
                ->addColumn('imagen', function($user) {
                    if(empty($user->imagen)) {
                        return '';
                    }
                    return '<img src="imagenes/'. $user->imagen . '" width="50px" height="50px"/>';
                })
                ->addColumn('action', 'usuarios.actions')
                ->rawColumns(['imagen','action'])
                ->make(true);

        }
        return view('usuarios.index');
        /* $users = User::paginate(5);
        return view('usuarios.index',['users' => $users]); */
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
        return view('usuarios.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        $usuario           = new User();
        $usuario->name     = request('name');
        $usuario->type_doc     = request('tipo_dni');
        $usuario->num_doc     = request('dni');
        $usuario->dir     = request('direccion');
        $usuario->cell     = request('celular');
        $usuario->email    = request('email');
        $usuario->password = bcrypt(request('password'));
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }
        
        $usuario->save();

        $usuario->asignarRole($request->get('rol'));

        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->tieneRole()[0] !=="administrador")
        {
            abort(403);
        }
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->tieneRole()[0] =="administrador" || Auth::user()->id == $id)
        {
            $user = User::findOrFail($id);
            $roles =  Role::all();
            return view('usuarios.edit', ['user' => $user, 'roles' => $roles ]);
            
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditFormRequest $request, $id)
    {

        if(Auth::user()->tieneRole()[0] =="administrador" || Auth::user()->id == $id)
        {
            $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,'. $id] ]);
            $usuario        = User::findOrFail($id);
            $usuario->type_doc     = request('tipo_dni');
            $usuario->num_doc     = request('dni');
            $usuario->dir     = request('direccion');
            $usuario->cell     = request('celular');
            $usuario->name  = $request->get('name');
            $usuario->email = $request->get('email');

            if ($request->hasFile('imagen')) {
                $file = $request->imagen;
                $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
                $usuario->imagen = $file->getClientOriginalName();
            }

            $pass = $request->get('password');
            if ($pass != null){
                $usuario->password = bcrypt($request->get('password'));
            } else {
                unset($usuario->password);
            }

            $role = $usuario->roles;
            if (count($role) > 0) {
                $role_id = $role[0]->id;
                User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
            } else {
                $usuario->asignarRole($request->get('rol'));
            }

            $usuario->update();

            if(Auth::user()->tieneRole()[0] == "gps") {
                return redirect('/');
            } else {
                return redirect('/usuarios');
            }
            
        } else {
            abort(403);
        }

       
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
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
