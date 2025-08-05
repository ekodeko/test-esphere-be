<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::get('soal_3', [ProductController::class, 'soal_3']);
Route::get('soal_4', function (){
    $input = [1,2,3,4,5];
    $target = 6;
    $pairs = [];

    foreach ($input as $key => $value) {
        foreach ($input as $k => $v) {
            if ($value + $v == $target){
                if (!in_array([$value, $v], $pairs)) {
                    $pairs[] = [$value, $v];
                }
            } 
        }
    }
    return $pairs;
});