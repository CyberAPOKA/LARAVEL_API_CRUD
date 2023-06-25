<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {

            return Response(['message' => $validator->errors()], 401);
        }

        if (Auth::guard('manager')->attempt($request->all())) {

            $manager = Auth::guard('manager')->user();

            $token = $manager->createToken('MyApp')->plainTextToken;

            return response()->json([
                'message' => 'Login efetuado com sucesso',
                'token' => $token,
                'role' => $manager->role,
                'status' => 200
            ]);
        }

        return Response(['message' => 'Email ou senha inválido(s)!'], 401);
    }
}
