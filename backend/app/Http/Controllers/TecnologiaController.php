<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreTecnologiaRequest;
use App\Models\Tecnologia;  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    public function index(){
        $tecnologias = Tecnologia::with('jogos')->get();
        return response()->json($tecnologias);
    }
    
//    php artisan make:request StoreMarcaRequest
    public function store(Request $request)
    {
        try {
            $tecnologias = Tecnologia::create($request->all());
            return response()->json([
                'success' => true,
                'tecnologia' => $tecnologias,
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
            $tecnologias = Tecnologia::findOrfail($id);
            return response()->json([
                'success' => true,
                'data' => $tecnologias,
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => "Tecnologia não encontrada",
            ], 404);
        }

    }

    public function update(Request $request,$id){
        try {
            $dados_tecnologias = Tecnologia::findOrfail($id);
            $dados_tecnologias -> tecnologias_nome = $request->input('tecnologias_nome');
            $dados_tecnologias->save();

            return response()->json([
                'success' => true,
                'tecnologia' => $dados_tecnologias,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);

        }
    }



    public function delete($id){
        try {
            $tecnologias = Tecnologia::destroy($id);
            return response()->json([
                'success' => true,
                'data' => $tecnologias,
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => "Tecnologia não encontrada",
            ], 404);
        }
    }




}
