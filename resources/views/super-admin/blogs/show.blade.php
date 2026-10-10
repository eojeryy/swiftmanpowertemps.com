@extends('layouts.admin')

@section('title', 'View Blog | Super Admin')
@section('page_title', 'View Blog')
@section('page_intro', 'Review the full post content and key publishing details.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-blog-detail.css') }}">
@endsection

@section('content')
<div class="blog-view-grid">
    <div class="admin-card blog-view-card">
        <div class="blog-chip-row">
            <span class="blog-chip">{{ $post->category }}</span>
            <span class="blog-chip">{{ $post->status }}</span>
        </div>
        <h3>{{ $post->title }}</h3>
        <div class="blog-excerpt">{!! \App\Support\RichText::html($post->excerpt) !!}</div>

        @if ($post->image_path)
            <div class="blog-cover">
                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <div class="blog-content-block">{!! \App\Support\RichText::html($post->content) !!}</div>
    </div>

    <div class="admin-card blog-view-card">
        <h3>Post Details</h3>
        <ul class="blog-meta-list">
            <li>
                <strong>Slug</strong>
                <span>{{ $post->slug }}</span>
            </li>
            <li>
                <strong>Category</strong>
                <span>{{ $post->category }}</span>
            </li>
            <li>
                <strong>Status</strong>
                <span>{{ ucfirst($post->status) }}</span>
            </li>
            <li>
                <strong>Published</strong>
                <span>{{ $post->published_at?->format('M d, Y h:i A') ?? 'Not published yet' }}</span>
            </li>
            <li>
                <strong>Created</strong>
                <span>{{ $post->created_at?->format('M d, Y h:i A') }}</span>
            </li>
        </ul>

        <div class="blog-view-actions">
            <a href="{{ route('super-admin.blogs.edit', $post) }}" class="primary">Edit Blog</a>
            <a href="{{ route('super-admin.blogs.index') }}" class="secondary">Back to List</a>
            <form method="post" action="{{ route('super-admin.blogs.destroy', $post) }}" onsubmit="return confirm('Delete this blog post?');">
                @csrf
                @method('delete')
                <button type="submit">Delete Blog</button>
            </form>
        </div>
    </div>
</div>
@endsection
