@extends('layouts.admin')

@section('title', 'View Blog | Super Admin')
@section('page_title', 'View Blog')
@section('page_intro', 'Review the full post content and key publishing details.')

@section('styles')
<style>
    .blog-view-grid {
        display: grid;
        gap: 24px;
        grid-template-columns: minmax(0, 1.45fr) minmax(300px, 0.8fr);
    }

    .blog-view-card {
        padding: 28px;
    }

    .blog-view-card h3 {
        font-size: 30px;
        line-height: 1.2;
        margin: 0 0 12px;
    }

    .blog-view-card p,
    .blog-content-block,
    .blog-meta-list li span {
        color: #64748b;
        line-height: 1.8;
    }

    .blog-chip-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 16px;
    }

    .blog-chip {
        background: #fff4ef;
        border-radius: 999px;
        color: #9f271a;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .blog-cover {
        border-radius: 24px;
        margin: 18px 0 22px;
        overflow: hidden;
    }

    .blog-cover img {
        display: block;
        width: 100%;
    }

    .blog-content-block {
        background: #fcfcfd;
        border: 1px solid #eef2f7;
        border-radius: 24px;
        padding: 22px;
        white-space: pre-wrap;
    }

    .blog-meta-list {
        display: grid;
        gap: 14px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .blog-meta-list li {
        background: #fff8f5;
        border-radius: 18px;
        padding: 16px 18px;
    }

    .blog-meta-list li strong {
        display: block;
        font-size: 13px;
        letter-spacing: 0.12em;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .blog-view-actions {
        display: grid;
        gap: 12px;
        margin-top: 24px;
    }

    .blog-view-actions a,
    .blog-view-actions button {
        align-items: center;
        border-radius: 18px;
        display: inline-flex;
        font: inherit;
        font-size: 14px;
        font-weight: 800;
        justify-content: center;
        padding: 14px 18px;
    }

    .blog-view-actions a.primary {
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        color: #fff;
    }

    .blog-view-actions a.secondary {
        background: #fff7f5;
        border: 1px solid #f1ddd6;
        color: #334155;
    }

    .blog-view-actions button {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #be123c;
        cursor: pointer;
    }

    @media (max-width: 1199px) {
        .blog-view-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="blog-view-grid">
    <div class="admin-card blog-view-card">
        <div class="blog-chip-row">
            <span class="blog-chip">{{ $post->category }}</span>
            <span class="blog-chip">{{ $post->status }}</span>
        </div>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->excerpt }}</p>

        @if ($post->image_path)
            <div class="blog-cover">
                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <div class="blog-content-block">{{ $post->content }}</div>
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
