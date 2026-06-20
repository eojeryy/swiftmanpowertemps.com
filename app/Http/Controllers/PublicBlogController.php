<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\View\View;

class PublicBlogController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('blog-grid', [
            'posts' => $posts,
        ]);
    }

    public function show(?BlogPost $blog = null): View
    {
        $post = $blog;

        if (! $post) {
            $post = BlogPost::where('status', 'published')
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->first();
        }

        abort_unless($post, 404);

        $relatedPosts = BlogPost::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view('blog-details', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
