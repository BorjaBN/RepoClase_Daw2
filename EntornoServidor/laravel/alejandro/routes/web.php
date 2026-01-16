use App\Http\Controllers\BuloController;

Route::get('/', [BuloController::class, 'index']);
Route::post('/bulos', [BuloController::class, 'store']);

Route::get('/bulos/{bulo}/edit', [BuloController::class, 'edit']);
Route::put('/bulos/{bulo}', [BuloController::class, 'update']);
Route::delete('/bulos/{bulo}', [BuloController::class, 'destroy']);
