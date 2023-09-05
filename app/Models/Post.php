<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            // abort(404);
            throw new ModelNotFoundException();
        }
        //add caching
        // $post = cache()->remember('post.{$slug}', 5, function () use ($path) {
        //     return file_get_contents($path);
        // });
        // with arrow funftion single line is enough

        $post = cache()->remember('post.{$slug}', 5, fn () => file_get_contents($path));
    }

    public static function findall()
    {
        $files = File::files(resource_path("posts/"));
        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files)
        // Converting to arraow function
        return array_map(fn ($file) => $file->getContents(), $files);
    }
}
