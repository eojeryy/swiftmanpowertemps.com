@extends('layouts.admin')

@section('title', 'List Blog | Super Admin')
@section('page_title', 'List Blog')
@section('page_intro', 'Review, edit, delete, and view all blog posts from one place.')

@section('styles')
<style>
    .blog-list-stack {
        display: grid;
        gap: 22px;
    }

    .blog-toolbar {
        align-items: center;
        display: flex;
        gap: 16px;
        justify-content: space-between;
    }

    .blog-toolbar p {
        color: #64748b;
        margin: 6px 0 0;
    }

    .blog-toolbar .admin-btn {
        align-items: center;
        background: linear-gradient(135deg, #dc2626, #7f1d1d);
        border-radius: 18px;
        color: #fff;
        display: inline-flex;
        font-size: 14px;
        font-weight: 800;
        padding: 14px 18px;
    }

    .blog-table-wrap {
        overflow-x: auto;
    }

    .blog-table {
        border-collapse: separate;
        border-spacing: 0 14px;
        min-width: 1040px;
        width: 100%;
    }

    .blog-table thead th {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.14em;
        padding: 0 18px 6px;
        text-align: left;
        text-transform: uppercase;
    }

    .blog-table tbody td {
        background: #fff;
        border-bottom: 1px solid #eef2f7;
        border-top: 1px solid #eef2f7;
        padding: 18px;
        vertical-align: top;
    }

    .blog-table tbody td:first-child {
        border-left: 1px solid #eef2f7;
        border-radius: 20px 0 0 20px;
    }

    .blog-table tbody td:last-child {
        border-radius: 0 20px 20px 0;
        border-right: 1px solid #eef2f7;
    }

    .post-title-cell strong {
        display: block;
        font-size: 17px;
        margin-bottom: 8px;
    }

    .post-title-wrap {
        display: grid;
        gap: 16px;
        grid-template-columns: 92px minmax(0, 1fr);
        align-items: center;
    }

    .post-thumb {
        background: #fff8f5;
        border-radius: 18px;
        display: block;
        height: 92px;
        overflow: hidden;
        width: 92px;
    }

    .post-thumb img {
        display: block;
        height: 100%;
        object-fit: cover;
        width: 100%;
    }

    .post-thumb-fallback {
        align-items: center;
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        color: #9f1239;
        display: flex;
        font-size: 12px;
        font-weight: 800;
        height: 100%;
        justify-content: center;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        width: 100%;
    }

    .post-title-cell span,
    .post-meta,
    .empty-state p {
        color: #64748b;
    }

    .post-status {
        border-radius: 999px;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        padding: 8px 12px;
        text-transform: uppercase;
    }

    .post-status.published {
        background: #ecfdf3;
        color: #166534;
    }

    .post-status.draft {
        background: #fff7ed;
        color: #9a3412;
    }

    .post-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .post-actions a,
    .post-actions button {
        align-items: center;
        background: #fff8f5;
        border: 1px solid #f1ddd6;
        border-radius: 14px;
        color: #334155;
        cursor: pointer;
        display: inline-flex;
        font: inherit;
        font-size: 13px;
        font-weight: 800;
        justify-content: center;
        padding: 10px 12px;
    }

    .post-actions button {
        background: #fff1f2;
        border-color: #fecdd3;
        color: #be123c;
    }

    .empty-state {
        padding: 34px;
        text-align: center;
    }

    .empty-state h3 {
        margin-bottom: 10px;
    }

    @media (max-width: 767px) {
        .blog-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
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
            <div class="blog-table-wrap">
                <table class="blog-table">
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th>Actions</th>
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
