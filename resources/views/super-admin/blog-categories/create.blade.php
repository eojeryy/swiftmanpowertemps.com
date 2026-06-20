@extends('layouts.admin')

@section('title', 'Add Category | Super Admin')
@section('page_title', 'Add Category')
@section('page_intro', 'Create a new blog category for organizing posts.')

@section('styles')
@include('super-admin.blog-categories._styles')
@endsection

@section('content')
<form method="post" action="{{ route('super-admin.blog-categories.store') }}">
    @csrf
    @include('super-admin.blog-categories._form')
</form>
@endsection
