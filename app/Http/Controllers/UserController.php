<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    protected function uploadImages($id, $file, $path)
    {
        $date = Carbon::now();
        $filePath = $path . "/$date->year";
        $filename = $id .'.'. $file->extension();
        return $file->storeAs(
            $filePath, $filename, 'public'
        );
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        return response()->json($usuario);
    }


    /**
     * Display the specified user by a given token
     */
    public function getUserByToken(Request $request)
    {
        return response()->json(Auth::user());
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lógica para atualizar um chamado existente por ID
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuario->update($request->all());

        return response()->json($usuario);
    }

    /**
     * Atualizar a foto do usuário
     */
    public function setFoto(Request $request, string $id) {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $this->uploadImages($id, $request['foto'], "/images/users");

        $usuario->update($request->only('foto'));

        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
