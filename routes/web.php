<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ArticleResource;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('articles', ArticleController::class)->only(['index', 'show']);

Route::get('contact-us', 'ContactController@contacts')->name('contact');
Route::post('contact-us', 'ContactController@store')->name('contact.send');

Route::get('categories/{category:slug}/articles', 'CategoryController@articles')->name('categories.articles');


Route::get('articles/{article}', function(Article $article){
    return new ArticleResource(Article::find($article));
});




######################################################################################################################
#                                                ADMIN                                                              #
####################################################################################################################
Auth::routes();

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('products', ProductController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('contacts', ContactController::class);
    
});