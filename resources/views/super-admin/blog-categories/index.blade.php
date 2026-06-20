@extends('layouts.admin')

@section('title', 'List Category | Super Admin')
@section('page_title', 'List Category')
@section('page_intro', 'Review, edit, delete, and view every blog category from one place.')

@section('styles')
@include('super-admin.blog-categories._styles')
@endsection

@section('content')
<div class="category-list-stack">
    <div class="category-toolbar">
        <div>
            <h3>All Categories</h3>
            <p>Use this list to manage your blog categories and keep your content organized.</p>
        </div>
        <a href="{{ route('super-admin.blog-categories.create') }}" class="category-btn">Add Category</a>
    </div>

    <div class="admin-card">
        @if ($categories->isEmpty())
            <div class="category-empty">
                <h3>No categories yet</h3>
                <p>Create your first category to start organizing blog posts.</p>
            </div>
        @else
            <div class="category-table-wrap">
                <table class="category-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="category-title-cell">
                                    <strong>{{ $category->name }}</strong>
                                    <span>{{ $category->description ?: 'No description added yet.' }}</span>
                                </td>
                                <td>
                                    <span class="category-status {{ $category->status }}">{{ $category->status }}</span>
                                </td>
                                <td>
                                    <div class="category-meta">{{ $category->slug }}</div>
                                </td>
                                <td>
                                    <div class="category-meta">{{ $category->created_at?->format('M d, Y h:i A') }}</div>
                                </td>
                                <td>
                                    <div class="category-actions-row">
                                        <a href="{{ route('super-admin.blog-categories.show', $category) }}">View</a>
                                        <a href="{{ route('super-admin.blog-categories.edit', $category) }}">Edit</a>
                                        <form method="post" action="{{ route('super-admin.blog-categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?');">
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
