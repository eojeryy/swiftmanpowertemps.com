@extends('layouts.admin')

@section('title', 'List Blog | Super Admin')
@section('page_title', 'List Blog')
@section('page_intro', 'Review, edit, delete, and view all blog posts from one place.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-blog-list.css') }}">
@endsection

@section('content')
<div class="blog-list-stack">
    <div class="blog-toolbar">
        <div>
            <h3>All Blog Posts</h3>
            <p>Manage every post here. Use the actions on the right to edit, delete, or view any item.</p>
        </div>
        <a href="{{ route('super-admin.blogs.create') }}" class="admin-btn">Post Blog</a>
    </div>

    <div class="admin-card">
        @if ($posts->isEmpty())
            <div class="empty-state">
                <h3>No blog posts yet</h3>
                <p>Create your first post to start building the blog list.</p>
            </div>
        @else
            @include('account.partials.table-filter', ['tableId' => 'blog-records', 'label' => 'blog posts'])
            <div class="blog-table-wrap" tabindex="0" role="region" aria-label="Blog posts table">
                <table class="blog-table" id="blog-records">
                    <thead>
                        <tr>
                            <th scope="col">Post</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Published</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="post-title-cell">
                                    <div class="post-title-wrap">
                                        <div class="post-thumb">
                                            @if ($post->image_path)
                                                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
                                            @else
                                                <div class="post-thumb-fallback">No Image</div>
                                            @endif
                                        </div>
                                        <div>
                                            <strong>{{ $post->title }}</strong>
                                            <span>{{ $post->excerpt }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="post-meta">{{ $post->category }}</div>
                                </td>
                                <td>
                                    <span class="post-status {{ $post->status }}">{{ $post->status }}</span>
                                </td>
                                <td>
                                    <div class="post-meta">{{ $post->published_at?->format('M d, Y h:i A') ?? 'Not published' }}</div>
                                </td>
                                <td>
                                    <div class="post-actions">
                                        <a href="{{ route('super-admin.blogs.show', $post) }}">View</a>
                                        <a href="{{ route('super-admin.blogs.edit', $post) }}">Edit</a>
                                        <form method="post" action="{{ route('super-admin.blogs.destroy', $post) }}" onsubmit="return confirm('Delete this blog post?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
