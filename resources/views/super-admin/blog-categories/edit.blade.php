@extends('layouts.admin')

@section('title', 'Edit Category | Super Admin')
@section('page_title', 'Edit Category')
@section('page_intro', 'Update the category name, description, and status.')

@section('styles')
@include('super-admin.blog-categories._styles')
@endsection

@section('content')
<form method="post" action="{{ route('super-admin.blog-categories.update', $category) }}">
    @csrf
    @method('put')
    @include('super-admin.blog-categories._form')
</form>
@endsection
