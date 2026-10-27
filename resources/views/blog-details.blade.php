@extends('layouts.app')
@section('title', $post->title.' | Swift Manpower Temps')
@section('content')
@php
    $publishedDate = $post->published_at ?? $post->created_at;
    $readingMinutes = max(1, (int) ceil(count(preg_split('/\s+/u', \App\Support\RichText::plainText($post->content), -1, PREG_SPLIT_NO_EMPTY)) / 200));
@endphp
<section class="page-title blog-article-intro">
    <div class="auto-container">
        <nav aria-label="Breadcrumb">
<ol class="blog-breadcrumb">
<li>
<a href="{{ route('home') }}">Home</a>
</li>
<li>
<a href="{{ route('blog.grid') }}">Blog</a>
</li>
<li aria-current="page">{{ $post->category ?: 'Article' }}</li>
</ol>
</nav>
        <div class="title-box centred">
<span class="eyebrow">{{ $post->category ?: 'Hiring & career insights' }}</span>
<h1>{{ $post->title }}</h1>
<p>{{ \App\Support\RichText::plainText($post->excerpt) }}</p>
</div>
        <div class="blog-article-meta">
<a href="{{ route('about.team') }}">Swift Manpower team</a>
<time datetime="{{ $publishedDate->toDateString() }}">{{ $publishedDate->format('F j, Y') }}</time>
<span>{{ $readingMinutes }} min read</span>
            @if($post->updated_at && $post->updated_at->toDateString() > $publishedDate->toDateString())<span>Updated <time datetime="{{ $post->updated_at->toDateString() }}">{{ $post->updated_at->format('M j, Y') }}</time>
</span>@endif
        </div>
    </div>
</section>
<section class="swift-section blog-article-section">
    <div class="auto-container blog-reading-layout">
        <article class="blog-reading-content" aria-label="{{ $post->title }}">
            <img class="blog-cover" src="{{ asset($post->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="{{ $post->image_path ? ($post->image_alt ?: '') : '' }}" width="900" height="500" fetchpriority="high">
            <div class="blog-rich-content">{!! \App\Support\RichText::html($post->content) !!}</div>
            <div class="blog-article-footer">
<p>Looking for support with your next step? Our Calgary team works with employers and job seekers to understand their needs.</p>
<a class="swift-text-link" href="{{ route('contact') }}">Talk to our team <span aria-hidden="true">→</span>
</a>
</div>
        </article>
        <aside class="blog-reading-sidebar" aria-label="Related resources">
            <div class="service-info-card">
<span class="eyebrow">For employers</span>
<h2>Build a dependable team.</h2>
<p>Explore temporary staffing, contract support and recruitment for ongoing roles.</p>
<a class="swift-text-link" href="{{ route('staffing.solutions') }}">Staffing solutions <span aria-hidden="true">→</span>
</a>
</div>
            <div class="service-info-card">
<span class="eyebrow">For job seekers</span>
<h2>Find your next role.</h2>
<p>Browse current Canadian vacancies and review the skills and experience required.</p>
<a class="swift-text-link" href="{{ route('job.openings') }}">Browse jobs <span aria-hidden="true">→</span>
</a>
</div>
            <a class="swift-text-link" href="{{ route('blog.grid') }}">Back to all articles <span aria-hidden="true">→</span>
</a>
        </aside>
    </div>
</section>
@if($relatedPosts->isNotEmpty())
<section class="swift-section swift-soft" aria-labelledby="related-articles-title">
<div class="auto-container">
<div class="section-heading">
<div>
<span class="eyebrow">Keep exploring</span>
<h2 id="related-articles-title">More from the blog.</h2>
</div>
<a class="swift-text-link" href="{{ route('blog.grid') }}">All articles <span aria-hidden="true">→</span>
</a>
</div>
<div class="insights-grid">@foreach($relatedPosts->take(3) as $article)@include('partials.blog-card', ['article' => $article])@endforeach</div>
</div>
</section>
@endif
@endsection
