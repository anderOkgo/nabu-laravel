<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use App\User;
use App\Role;
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
        if($request->ajax()) {
            $users = User::all();

            return DataTables::of($users)
                ->addColumn('rol', function($user) {
                    foreach($user->roles as $role) {
                        return $role->name;
                    }
                })
                ->addColumn('imagen', function($user){
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
        $usuario           = new User();
        $usuario->name     = request('name');
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
        $user = User::findOrFail($id);
        $roles =  Role::all();
        return view('usuarios.edit', ['user' => $user, 'roles' => $roles ]);
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
        $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,'. $id] ]);
        $usuario        = User::findOrFail($id);
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

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
