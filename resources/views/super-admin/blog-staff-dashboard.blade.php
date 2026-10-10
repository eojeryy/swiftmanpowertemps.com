@extends('layouts.admin')

@section('title', 'Blog Dashboard | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Blog Dashboard')
@section('page_intro', 'A focused workspace for creating, updating, and publishing blog content.')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-blog-dashboard.css') }}">
@endsection

@section('content')
<div class="blog-staff-grid">
    <section class="admin-card blog-staff-hero">
        <h3>Welcome to the blog workspace.</h3>
        <p>Share useful guidance for employers and job seekers. Start an article or pick up where you left off.</p>
        <div class="blog-staff-actions">
            <a href="{{ route('super-admin.blogs.create') }}" class="primary">Create Blog Post</a>
            <a href="{{ route('super-admin.blogs.index') }}" class="secondary">Manage Blog Posts</a>
        </div>
    </section>

    <section class="blog-staff-metrics">
        <div class="admin-card blog-staff-stat">
            <strong>{{ $publishedBlogCount }}</strong>
            <small>published posts currently live on the website</small>
        </div>
        <div class="admin-card blog-staff-stat">
            <strong>{{ $draftBlogCount }}</strong>
            <small>draft posts waiting for review or publishing</small>
        </div>
    </section>

    <section class="admin-card">
        <div class="dashboard-card-title">
            <h3>Recent Blog Posts</h3>
            <span>Open any recent item to review or continue editing it.</span>
        </div>

        @if ($recentPosts->isEmpty())
            <p>No blog posts have been created yet.</p>
        @else
            <div class="blog-post-list">
                @foreach ($recentPosts as $post)
                    <div class="blog-post-item">
                        <div>
                            <strong>{{ $post->title }}</strong>
                            <span>{{ ucfirst($post->status) }} in {{ $post->category }}</span>
                        </div>
                        <a href="{{ route('super-admin.blogs.edit', $post) }}" class="blog-post-link">Open Post</a>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection
