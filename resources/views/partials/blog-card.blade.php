@php
    $articleDate = $article->published_at ?? $article->created_at;
    $articleExcerpt = \App\Support\RichText::plainText($article->excerpt ?: $article->content);
    $readingMinutes = max(1, (int) ceil(count(preg_split('/\s+/u', \App\Support\RichText::plainText($article->content), -1, PREG_SPLIT_NO_EMPTY)) / 200));
@endphp
<article class="insight-card blog-article-card">
    <a href="{{ route('blog.details.show', $article) }}" class="blog-card-link">
        <img src="{{ asset($article->image_path ?: 'assets/images/news/news-1.jpg') }}" alt="" loading="lazy" width="400" height="240">
        <div>
            <span class="eyebrow">{{ $article->category ?: 'Hiring & career insights' }}</span>
            <h3>{{ $article->title }}</h3>
            <p>{{ \Illuminate\Support\Str::limit($articleExcerpt, 155) }}</p>
            <div class="blog-card-meta"><time datetime="{{ $articleDate->toDateString() }}">{{ $articleDate->format('M j, Y') }}</time><span>{{ $readingMinutes }} min read</span></div>
            <span class="swift-text-link">Read article <span aria-hidden="true">↗</span></span>
        </div>
    </a>
</article>
