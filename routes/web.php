<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuitarsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');//This names this particular route
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

// /guitars/the class in guitarcontroller . The resource keyword names our routes for us.
Route::resource('guitars', GuitarsController::class);
// Route::get('/store', function () {
//     $category = request('category');

//     if(isset($category)){
//         return 'you are viewing the store for ' . strip_tags($category);
//         // the strip_tags stops scripts injected by our users from executing in our application
//     }

//     return 'you are viewing all instruments';
   
// });
Route::get('/store/{category?}/{item?}', function ($category = null, $item = null) { 
    //The question mark makes the route parameter optional 
    // $category = request('category');

    if(isset($category)){

        if(isset($item)){
            return "you are viewing the store for {$category} for {$item}";
        }
        return 'you are viewing the store for ' . strip_tags($category);
        // the strip_tags stops scripts injected by our users from executing in our application
    }

    return 'you are viewing all instruments';
   
});
