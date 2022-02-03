<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PostResource;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::get('posts/{post}', function(Article $article){
    return new PostResource(Article::find($article));
});

Route::get('articlevue',function(){
    return view('guest.articles.indexVue');
});




######################################################################################################################
#                                                ADMIN                                                              #
####################################################################################################################
Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    // Route::resource('products', ProductController::class);
    // Route::resource('articles', ArticleController::class);
    // Route::resource('contacts', ContactController::class);
    
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*')->name('home');
