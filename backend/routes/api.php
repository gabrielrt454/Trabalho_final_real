    <?php
    use App\Http\Controllers\JogoController;
    use App\Http\Controllers\TecnologiaController;
    use Illuminate\Support\Facades\Route;


    Route::post('/  ', [TecnologiaController::class, 'store']);//salvar
    Route::get('/tecnologias/{id}', [TecnologiaController::class, 'find']);//listar pelo id
    Route::get('/tecnologias', [TecnologiaController::class, 'index']);//listar tudo
    Route::put('/tecnologias/{id}', [TecnologiaController::class, 'update']);
    Route::delete('/tecnologias/delete/{id}', [TecnologiaController::class, 'delete']);
   // Route::get('/informacoes', [DadosController::class, 'index']);
        
    Route::get('/jogo', [JogoController::class, 'index']);
    Route::get('/jogo/{id}', [JogoController::class, 'find']);
    Route::post('/jogo/criar', [JogoController::class, 'store']); 
    Route::put('/jogo/{id}', [JogoController::class, 'update']);
    Route::delete('/jogo/delete/{id}', [JogoController::class, 'delete']);
