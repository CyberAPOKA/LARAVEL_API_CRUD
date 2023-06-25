<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function users()
    {
        if (Gate::denies('view-users')) {
            return response()->json(['message' => 'Acesso negado!'], 403);
        } else {
            $users = User::all();
            return response()->json($users);
        }
    }

    public function create(Request $request)
    {
        if (Gate::denies('create-user')) {
            return response()->json(['message' => 'Acesso negado!'], 403);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json([
            'message' => 'Usuário criado com sucesso.',
            'User' => $user
        ]);
    }

    public function update(Request $request, $id)
    {

        if (Gate::denies('edit-user')) {
            return response()->json(['message' => 'Acesso negado!'], 403);
        }

        $user = User::findOrFail($id);

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }

        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return response()->json([
            'message' => 'Usuário atualizado com sucesso.',
            'User' => $user
        ]);
    }

    public function delete($id)
    {
        if (Gate::denies('delete-user')) {
            return response()->json(['message' => 'Acesso negado!'], 403);
        }

        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso.',
            'User' => $user
        ]);
    }
}
