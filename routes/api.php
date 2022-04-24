<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    UserController,
    AuthController,
    ProductController,
    CategoryController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function(){

    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/cadastro', [AuthController::class, 'register']);
});


Route::prefix('produto')->group(function(){

    Route::get('/todos', [ProductController::class, 'index']);
});


Route::group(['middleware' => ['apiJwt']], function(){

    Route::prefix('usuario')->group(function(){

        Route::get('/todos', [UserController::class, 'index']);
    });

    Route::prefix('produto')->group(function(){

        Route::post('/cadastro', [ProductController::class, 'store'])
        ->name('product.store');

        Route::post('/', [ProductController::class, 'index'])
        ->name('product.index');

        Route::get('/{id}', [ProductController::class, 'show'])
        ->name('product.show');

        Route::put('atualizar/{id}', [ProductController::class, 'update'])
        ->name('product.update');

        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])
        ->name('product.destroy');
    });

    Route::prefix('categoria')->group(function(){

        Route::post('/cadastro', [CategoryController::class, 'store'])
        ->name('category.store');

        Route::get('/todos', [CategoryController::class, 'index'])
        ->name('category.index');

        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])
        ->name('category.destroy');

        Route::put('atualizar/{id}', [CategoryController::class, 'update'])
        ->name('category.update');
    });

});
