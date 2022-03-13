<?php


use Illuminate\Support\Facades\Route;
use Mahan\Leddy\Http\Controllers\PostController;


Route::prefix('/leddy')->name('leddy.')->group(function (){
    Route::prefix('/post')->name('post.')->group(function (){
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::patch('/', [PostController::class, 'update'])->name('update');
        Route::delete('/', [PostController::class, 'delete'])->name('delete');
    });
});
