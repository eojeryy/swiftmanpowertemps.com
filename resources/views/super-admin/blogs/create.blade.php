@extends('layouts.admin')

@section('title', 'Post Blog | Super Admin')
@section('page_title', 'Post Blog')
@section('page_intro', 'Create a new blog post for the admin blog module.')

@section('styles')
@include('super-admin.blogs._styles')
@endsection

@section('content')
<form method="post" action="{{ route('super-admin.blogs.store') }}" enctype="multipart/form-data">
    @csrf
    @include('super-admin.blogs._form')
</form>
@endsection

@section('scripts')
@include('super-admin.blogs._editor_scripts')
@endsection
