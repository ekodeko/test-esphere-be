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
// refactor function 
// function d(p, t) {
    // if (t === 'GOLD') {
    // return p * 0.8;
    // } else if (t === 'SILVER') {
    // return p * 0.9;
    // } else {
    // return p;
// }
// }
// nama fungsi menjadi discount agar lebih readabale
// parameter fungsi menjadi price, tier agar lebih readabale
// untuk value statis dan fix seperti GOLD dan SILVER
// lebih optimal menggunakan switch case statement di banding if statement agar lebih readable
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