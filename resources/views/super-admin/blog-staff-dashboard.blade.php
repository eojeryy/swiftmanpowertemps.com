@extends('layouts.admin')

@section('title', 'Blog Dashboard | Swift Manpower Temps Agency Ltd')
@section('page_title', 'Blog Dashboard')
@section('page_intro', 'A focused workspace for creating, updating, and publishing blog content.')

@section('styles')
<style>
    .blog-staff-grid {
        display: grid;
        gap: 24px;
    }

    .blog-staff-hero {
        background:
            radial-gradient(circle at top right, rgba(248, 113, 113, 0.18), transparent 34%),
            linear-gradient(135deg, #111827, #1f2937 58%, #7f1d1d 120%);
        color: #fff;
    }

    .blog-staff-hero h3,
    .blog-post-list strong {
        color: inherit;
        margin: 0 0 10px;
    }

    .blog-staff-hero p,
    .blog-post-list span,
    .blog-staff-stat small {
        color: rgba(255, 255, 255, 0.78);
    }

    .blog-staff-actions,
    .blog-staff-metrics,
    .blog-post-list {
        display: grid;
        gap: 16px;
    }

    .blog-staff-actions {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        margin-top: 20px;
    }

    .blog-staff-actions a,
    .blog-post-link {
        align-items: center;
        border-radius: 18px;
        display: inline-flex;
        font-weight: 800;
        justify-content: center;
        padding: 14px 18px;
    }

    .blog-staff-actions a.primary {
        background: #fff;
        color: #111827;
    }

    .blog-staff-actions a.secondary {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.14);
        color: #fff;
    }

    .blog-staff-metrics {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .blog-staff-stat {
        background: linear-gradient(180deg, #fff, #fff8f5);
        border: 1px solid #efe2dc;
        border-radius: 24px;
        padding: 22px;
    }

    .blog-staff-stat strong {
        display: block;
        font-size: 40px;
        margin-bottom: 8px;
    }

    .blog-post-item {
        align-items: center;
        background: #fffaf8;
        border: 1px solid #f1e5df;
        border-radius: 20px;
        display: flex;
        gap: 16px;
        justify-content: space-between;
        padding: 18px 20px;
    }

    .blog-post-link {
        background: #fff1ed;
        color: #9a3412;
        padding: 12px 14px;
    }

    @media (max-width: 767px) {
        .blog-staff-actions,
        .blog-staff-metrics {
            grid-template-columns: 1fr;
        }

        .blog-post-item {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="blog-staff-grid">
    <section class="admin-card blog-staff-hero">
        <h3>Welcome to the blog workspace.</h3>
        <p>Use this dashboard to upload new articles, update existing posts, and keep the public blog fresh without access to the rest of the admin system.</p>
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
