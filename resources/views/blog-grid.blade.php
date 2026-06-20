@extends('layouts.app')

@section('title', 'Blog Grid | Swift Manpower Temps Agency Ltd')

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>Blog</h1>
                <p>Insights on staffing, recruitment support, and workforce planning published directly from the admin panel.</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Blog</li>
                <li>Grid View</li>
            </ul>
        </div>
    </div>
</section>

<section class="news-section alternet-2 sec-pad">
    <div class="auto-container">
        @if ($posts->isEmpty())
            <div class="sec-title centred">
                <span class="top-title">No Posts Yet</span>
                <h2>The blog is ready for your first post</h2>
                <p>Use the super admin blog module to publish staffing and recruitment updates here.</p>
            </div>
        @else
            <div class="row clearfix">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="{{ route('blog.details.show', $post) }}">
                                        <img src="{{ asset($post->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $post->title }}">
                                    </a>
                                    <span class="post-date">{{ ($post->published_at ?? $post->created_at)->format('d') }}<br />{{ ($post->published_at ?? $post->created_at)->format('M') }}</span>
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <div class="category"><i class="flaticon-note"></i><p>{{ $post->category }}</p></div>
                                        <h3><a href="{{ route('blog.details.show', $post) }}">{{ $post->title }}</a></h3>
                                        <ul class="post-info clearfix">
                                            <li><i class="far fa-user"></i><a href="{{ route('home') }}">Swift Manpower</a></li>
                                            <li><i class="far fa-comment"></i><a href="{{ route('blog.details.show', $post) }}">Agency Insight</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
