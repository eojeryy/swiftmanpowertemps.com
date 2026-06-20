@extends('layouts.admin')

@section('title', 'View Category | Super Admin')
@section('page_title', 'View Category')
@section('page_intro', 'Review the full details of a blog category.')

@section('styles')
@include('super-admin.blog-categories._styles')
@endsection

@section('content')
<div class="category-view-grid">
    <div class="admin-card category-view-card">
        <span class="category-chip">{{ $category->status }}</span>
        <h3>{{ $category->name }}</h3>
        <div class="category-description">{{ $category->description ?: 'No description added for this category yet.' }}</div>
    </div>

    <div class="admin-card category-view-card">
        <h3>Category Details</h3>
        <ul class="category-meta-list">
            <li>
                <strong>Name</strong>
                <span>{{ $category->name }}</span>
            </li>
            <li>
                <strong>Slug</strong>
                <span>{{ $category->slug }}</span>
            </li>
            <li>
                <strong>Status</strong>
                <span>{{ ucfirst($category->status) }}</span>
            </li>
            <li>
                <strong>Created</strong>
                <span>{{ $category->created_at?->format('M d, Y h:i A') }}</span>
            </li>
            <li>
                <strong>Updated</strong>
                <span>{{ $category->updated_at?->format('M d, Y h:i A') }}</span>
            </li>
        </ul>

        <div class="category-view-actions">
            <a href="{{ route('super-admin.blog-categories.edit', $category) }}" class="category-btn category-btn-primary">Edit Category</a>
            <a href="{{ route('super-admin.blog-categories.index') }}" class="category-btn category-btn-secondary">Back to List</a>
            <form method="post" action="{{ route('super-admin.blog-categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?');">
                @csrf
                @method('delete')
                <button type="submit" class="category-btn category-btn-danger">Delete Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
