<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Auth;

class AuthController extends Controller
{
    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
        $request->validate
        ([
            'email'         => 'required|string|email',
            'password'      => 'required|string',
            'remember_me'   => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        //print_r($credentials);exit();

        if (!Auth::attempt($credentials))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user           = $request->user();
        $tokenResult    = $user->createToken('Personal Access Token');
        $token          = $tokenResult->token;

        if ($request->remember_me)
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json
        ([
            'access_token'  => $tokenResult->accessToken,
            'token_type'    => 'Bearer',
            'expires_at'    => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'name'      => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string'
        ]);

        User::create
        ([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Successfully created user!'], 201);

        /*$user = User::create($request->all());
        return response()->json($user, 201);*/
    }

    public function update(Request $request, User $user)
    {
        $user->update
        ([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}