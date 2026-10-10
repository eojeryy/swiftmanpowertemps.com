<section class="swift-section swift-soft" id="blog" aria-labelledby="home-blog-title">
    <div class="auto-container">
        <div class="section-heading">
            <div><span class="eyebrow">The Swift Manpower blog</span><h2 id="home-blog-title">Hiring advice.<br>Career possibilities.</h2></div>
            <div><p>Practical insights for Canadian employers building teams and job seekers looking for their next opportunity.</p><a class="swift-text-link blog-section-link" href="{{ route('blog.grid') }}">Explore the blog <span aria-hidden="true">→</span></a></div>
        </div>
        @if($blogPosts->isNotEmpty())
            <div class="insights-grid">
                @foreach($blogPosts as $article)
                    @include('partials.blog-card', ['article' => $article])
                @endforeach
            </div>
        @else
            @include('partials.blog-resources')
        @endif
    </div>
</section>
