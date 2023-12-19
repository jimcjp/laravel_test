<?php

use Illuminate\Support\Facades\Route;



Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/',[\App\Http\Controllers\IndexController::class,'index'])
    ->name('index');


        //部落格資源路由
Route::resource('blog',\App\Http\Controllers\BlogController::class)
        ->except('index');



//需要登陸的頁面
Route::middleware('auth')->group(function () {
    
    //部落格相關路由
    Route::prefix('blog')->name('blog.')->group(function() {
        //改變部落格狀態 發布與不發佈
        Route::patch('/{blog}/status',[\App\Http\Controllers\BlogController::class, 'status'])
        ->name('status');

        // 評論路由
        Route::post('/{blog}/comment',\App\Http\Controllers\CommentController::class)
        ->name('comment');
    });
    
    
    // 個人中心相關路由
    Route::prefix('user')->name('user.')->group(function() {

            //個人中心 修改個人信息-頁面
            Route::get('/',[\App\Http\Controllers\UserController::class , 'infoPage'])
                ->name('info');
        
            //個人中心 修改個人信息-更新
            Route::put('/',[\App\Http\Controllers\UserController::class , 'infoUpdate'])
                ->name('info.update'); 
        
            //個人中心 頭像-頁面
            Route::get('/avatar',[\App\Http\Controllers\UserController::class , 'avatarPage'])
                ->name('avatar'); 
        
            //個人中心 頭像-更新
            Route::put('/avatar',[\App\Http\Controllers\UserController::class , 'avatarUpdate'])
                ->name('avatar.update'); 
        
            //個人中心 所有部落格
            Route::get('/blog',[\App\Http\Controllers\UserController::class , 'blog'])
                ->name('blog');


    });

      
});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (){
//     return view('dashboard');
// })->name('dashboard');


      

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
