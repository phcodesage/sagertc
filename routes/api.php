use App\Http\Controllers\TurnServerController;

Route::get('/turn-credentials', [TurnServerController::class, 'getCredentials']); 