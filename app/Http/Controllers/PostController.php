<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $categories = Cache::remember("categories", Carbon::now()->addDay(), function () {
            return Category::whereHas('posts', function ($query) {
                        $query->published();
                    })->take(10)->get();
        });
        return view("posts.index", [
            'categories' => $categories,
            'visitor' => Visitor::count(),
            'visitortoday' => Visitor::where('visited_at', date('Y-m-d'))->count()
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", [
            'post' => $post,
            'content' => Str::markdown($post->body),
        ]);
    }
}
