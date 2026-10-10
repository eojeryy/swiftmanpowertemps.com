<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class FrontendBlogTest extends TestCase
{
    private function article(array $attributes = []): BlogPost
    {
        $post = new BlogPost(array_merge([
            'title' => 'Preparing for warehouse work in Calgary', 'slug' => 'warehouse-work-calgary',
            'category' => 'Career Advice', 'excerpt' => '<p>Prepare your resume &amp; review the role.</p>',
            'content' => '<h2>Prepare your resume</h2><p>Highlight relevant experience.</p><ul><li>Check the job location.</li></ul>',
            'status' => 'published', 'published_at' => '2026-10-01 12:00:00',
        ], $attributes));
        $post->created_at = '2026-10-01 12:00:00';
        $post->updated_at = '2026-10-02 12:00:00';

        return $post;
    }

    public function test_blog_remains_visible_on_homepage_before_articles_are_published(): void
    {
        $html = view('index', ['featuredPosts' => collect()])->render();
        $this->assertStringContainsString('id="blog"', $html);
        $this->assertStringContainsString('Hiring advice.', $html);
        $this->assertStringContainsString(route('blog.grid'), $html);
        $this->assertStringContainsString('Make your next hiring brief clearer.', $html);
        $this->assertStringNotContainsString('super admin blog module', $html);
    }

    public function test_published_homepage_cards_link_to_articles_with_readable_excerpts(): void
    {
        $article = $this->article();
        $html = view('index', ['featuredPosts' => collect([$article])])->render();
        $this->assertStringContainsString(route('blog.details.show', $article), $html);
        $this->assertStringContainsString($article->title, $html);
        $this->assertStringContainsString('Prepare your resume &amp; review the role.', $html);
        $this->assertStringContainsString('datetime="2026-10-01"', $html);
        $this->assertStringContainsString('1 min read', $html);
        $this->assertSame(1, substr_count($html, '<h1>'));
    }

    public function test_blog_is_linked_from_desktop_and_mobile_navigation(): void
    {
        $html = view('layouts.partials.header')->render();
        $this->assertSame(2, substr_count($html, 'href="'.route('blog.grid').'"'));
    }

    public function test_blog_index_renders_crawlable_pagination_and_page_specific_canonical(): void
    {
        $posts = new LengthAwarePaginator([$this->article()], 25, 9, 2, ['path' => route('blog.grid')]);
        $html = view('blog-grid', ['posts' => $posts])->render();
        $this->assertStringContainsString('rel="canonical" href="'.route('blog.grid', ['page' => 2]).'"', $html);
        $this->assertStringContainsString('Page 2 of 3', $html);
        $this->assertStringContainsString('?page=3" rel="next"', $html);
        $this->assertStringContainsString('?page=1" rel="prev"', $html);
    }

    public function test_empty_blog_hub_helps_visitors_without_admin_instructions(): void
    {
        $posts = new LengthAwarePaginator([], 0, 9, 1, ['path' => route('blog.grid')]);
        $html = view('blog-grid', ['posts' => $posts])->render();
        $this->assertStringContainsString('New articles will appear here as they’re published.', $html);
        $this->assertStringContainsString(route('employer.overview'), $html);
        $this->assertStringContainsString(route('employee.overview'), $html);
        $this->assertStringNotContainsString('super admin', $html);
    }

    public function test_article_page_keeps_safe_formatting_and_valid_article_and_breadcrumb_schema(): void
    {
        $post = $this->article(['content' => '<h2>Responsibilities</h2><ul><li>Pick orders</li></ul><script>alert(1)</script>']);
        $html = view('blog-details', ['post' => $post, 'relatedPosts' => collect()])->render();
        $this->assertStringContainsString('<h2>Responsibilities</h2><ul><li>Pick orders</li></ul>', $html);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
        $this->assertSame(1, substr_count($html, '<h1>'));
        $this->assertStringContainsString('property="og:type" content="article"', $html);
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $html, $matches);
        $schemas = collect(array_map(fn ($json) => json_decode($json, true, 512, JSON_THROW_ON_ERROR), $matches[1]));
        $articleSchema = $schemas->firstWhere('@type', 'BlogPosting');
        $this->assertSame($post->title, $articleSchema['headline']);
        $this->assertSame(route('blog.details.show', $post), $articleSchema['mainEntityOfPage']);
        $this->assertSame('Organization', $articleSchema['author']['@type']);
        $this->assertSame('en-CA', $articleSchema['inLanguage']);
        $breadcrumb = $schemas->firstWhere('@type', 'BreadcrumbList');
        $this->assertSame(route('blog.grid'), $breadcrumb['itemListElement'][1]['item']);
    }
}
