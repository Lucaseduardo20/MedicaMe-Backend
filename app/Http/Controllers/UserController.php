<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function create(Request $request)
    {
        $user = new User([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : null,
        ]);

        $user->save();

        if($user) {
            return response()->json(['message' => 'Usuario criado com sucesso!', 'nome' => $user->nome, 'statusCode' => 201]);
        } else {
            return response()->json(['message' => 'Erro ao criar o usuário', 'statusCode' => 401]);
        }
    }
    public function login(Request $request)
    {

        if (Auth::attempt($request->all())) {
            // Autenticação bem-sucedida
            return response()->json(['statusCode'=> 201, 'message'=>'Login efetuado com sucesso!', 'nome'=> Auth::user()->nome]);
        } else {
            // Autenticação falhou
            return response()->json([
                'statusCode' => 401,
                'message' => 'Verifique e-mail e senha.'
            ], 401);
        }

//        if(Auth::attempt($credentials)) {
//            $user = Auth::user();
//            $token = $user->createToken('AppName')->plainTextToken;
//            return response()->json(['token' => $token], 200);
//        } else {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
    }
}
