<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('/posts/{post}', function($slug){
    //return $slug;
    $path = __DIR__ ."/../resources/posts/{$slug}.html";
    if(!file_exists($path))
    {
        // abort(404);
        return redirect('/');
    }
    //add caching
    // $post = cache()->remember('post.{$slug}', 5, function () use ($path) {
    //     return file_get_contents($path);
    // });
    // with arrow funftion single line is enough

    $post = cache()->remember('post.{$slug}', 5, fn() => file_get_contents($path));

    return view('post',['post' => $post]);
})->where('post','[A-z_\-]+');
