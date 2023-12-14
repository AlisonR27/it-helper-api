<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chamado;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ( empty( $request->except('_token') ) ) {
            // Caso não tenha Query
            $chamados = Chamado::all();
            return response()->json($chamados);
        } else {
            // Caso tenha Query
            $user_id = $request['id_usuario'];
            $chamados = DB::table('chamados')->where('id_usuario', $user_id)->get();
            return response()->json($chamados,200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $chamado = Chamado::create($request->all());
        // $anexos = $request

        return response()->json($chamado, 201);
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chamado = Chamado::with('createdBy')->with('acoes')->with('departamento')->find($id);

        if (!$chamado) {
            return response()->json(['message' => 'Chamado não encontrado'], 404);
        }

        return response()->json($chamado);
    }

    /**
     * Display the chamados of current user
     */
    public function meusChamados(Request $request,int $id) 
    {
        $chamados = Chamado::where('id_usuario',$id)->with('createdBy')->get();
        return response()->json($chamados);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          // Lógica para atualizar um chamado existente por ID
          $chamado = Chamado::find($id);

          if (!$chamado) {
              return response()->json(['message' => 'Chamado não encontrado'], 404);
          }
  
          $chamado->update($request->all());
  
          return response()->json($chamado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chamado = Chamado::find($id);

        if (!$chamado) {
            return response()->json(['message' => 'Chamado não encontrado'], 404);
        }

        $chamado->delete();

        return response()->json(['message' => 'Chamado excluído com sucesso']);
    }
}
