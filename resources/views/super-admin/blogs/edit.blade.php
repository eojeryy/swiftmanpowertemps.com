@extends('layouts.admin')

@section('title', 'Edit Blog | Super Admin')
@section('page_title', 'Edit Blog')
@section('page_intro', 'Update an existing blog post and manage its publishing details.')

@section('styles')
@include('super-admin.blogs._styles')
@endsection

@section('content')
<form method="post" action="{{ route('super-admin.blogs.update', $post) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('super-admin.blogs._form')
</form>
@endsection

@section('scripts')
@include('super-admin.blogs._editor_scripts')
@endsection
