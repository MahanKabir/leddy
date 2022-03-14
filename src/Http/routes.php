<?php


use Illuminate\Support\Facades\Route;
use Mahan\Leddy\Http\Controllers\V1\PostController;
use Mahan\Leddy\Http\Controllers\V1\PhotoController;


Route::prefix('/leddy')->name('leddy.')->group(function (){
    Route::prefix('/post')->name('post.')->group(function (){
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::patch('/', [PostController::class, 'update'])->name('update');
        Route::delete('/', [PostController::class, 'delete'])->name('delete');

        Route::get('/photo', [PhotoController::class, 'image'])->name('photo');
    });

    Route::prefix('/upload')->name('upload.')->group(function (){
        Route::post('/photo', [PhotoController::class, 'upload'])->name('photo');
    });
});
