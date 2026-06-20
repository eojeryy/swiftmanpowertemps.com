@extends('layouts.app')

@section('title', ($post->title ?? 'Blog Details').' | Swift Manpower Temps Agency Ltd')

@section('styles')
<style>
    .blog-rich-excerpt,
    .blog-rich-content {
        color: #6b7280;
    }

    .blog-rich-excerpt p:last-child,
    .blog-rich-content p:last-child {
        margin-bottom: 0;
    }

    .blog-rich-content blockquote {
        border-left: 4px solid #dc2626;
        color: #374151;
        font-style: italic;
        margin: 24px 0;
        padding-left: 18px;
    }

    .blog-rich-content ul,
    .blog-rich-content ol {
        margin: 0 0 18px 22px;
    }

    .blog-rich-content a,
    .blog-rich-excerpt a {
        color: #b91c1c;
    }
</style>
@endsection

@section('content')
<section class="page-title" style="background-image: url({{ asset('assets/images/background/page-title-2.jpg') }});">
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/pattern-35.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box centred">
                <h1>{{ $post->title }}</h1>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt), 180) }}</p>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blog.grid') }}">Blog</a></li>
                <li>Single Post</li>
            </ul>
        </div>
    </div>
</section>

<section class="sidebar-page-container sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{ asset($post->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $post->title }}">
                            </figure>
                            <div class="lower-content">
                                <span class="post-date">{{ $post->category }}</span>
                                <h2>{{ $post->title }}</h2>
                                <div class="blog-rich-excerpt">{!! $post->excerpt !!}</div>
                                <div class="blog-rich-content">{!! $post->content !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar default-sidebar">
                    <div class="sidebar-widget categories-widget">
                        <div class="widget-title">
                            <h3>More Reading</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="categories-list clearfix">
                                <li><a href="{{ route('blog.grid') }}">Blog Grid</a></li>
                                @foreach ($relatedPosts as $relatedPost)
                                    <li><a href="{{ route('blog.details.show', $relatedPost) }}">{{ $relatedPost->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget contact-widget">
                        <div class="widget-title">
                            <h3>Need Support?</h3>
                        </div>
                        <div class="widget-content">
                            <p>Speak with our team about staffing support or current opportunities.</p>
                            <ul class="info-list clearfix">
                                <li><a href="tel:4388712598">438-871-2598</a></li>
                                <li><a href="tel:5878992598">587-899-2598</a></li>
                                <li><a href="mailto:swiftmanpowertemps@gmail.com">swiftmanpowertemps@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
