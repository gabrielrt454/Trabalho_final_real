<?php

namespace App\Http\Controllers;
use App\Models\Jogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        $dados_jogos = Jogo::with('tecnologia') -> get(); /**('tecnologia')->get();**/
        return response()->json($dados_jogos);
    }



    public function store(Request $request/** {id}  para o update**/)
    { 
        try {
           $dados_jogos = Jogo::create($request->all());
           return response()->json([
                'success' => true,
                'tecnologia' => $dados_jogos,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);

        }
    }




    public function update(Request $request,$id){
        try {
            $dados_jogos = Jogo::findOrfail($id);
            $dados_jogos -> tecnologia_id = $request->input('tecnologia_id');
            $dados_jogos -> nome = $request -> input('nome');
            $dados_jogos -> preset = $request -> input('preset');
            $dados_jogos -> fps = $request -> input('fps');
            $dados_jogos->save();

            return response()->json([
                'success' => true,
                'tecnologia' => $dados_jogos,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);

        }


    }

    public function find($id)
    {
        try {
            $jogos = Jogo::findOrfail($id);
            //$jogod->destroy();
            return response()->json([
                'success' => true,
                'data' => $jogos,
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => "Jogo não encontrado",
            ], 404);
        }

    }
    

    public function delete($id){
        try {
            $jogos = Jogo::destroy($id);
            return response()->json([
                'success' => true,
                'data' => $jogos,
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => "Jogo não encontrado",
            ], 404);
        }
    }
    //criar o store,update,delete e find by id
}
