<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    $files = File::files(resource_path("posts"));
    //using laravel collection
    $posts = collect($files)->map(function($file){
        $document= YamlFrontMatter::parseFile($file);
           return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
           );

    });

    // //using array_map instead of foreach loop
    // $posts = array_map(function ($file){
    //     $document= YamlFrontMatter::parseFile($file);
    //    return new Post(
    //     $document->title,
    //     $document->excerpt,
    //     $document->date,
    //     $document->body(),
    //     $document->slug
    //    );
    // }, $files);
    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('/posts/{post}', function($slug){
    //find a post by its slug and pass it to the view call post
    $post = Post::find($slug);
    return view('post',['post' => $post]);
})->where('post','[A-z_\-]+');
