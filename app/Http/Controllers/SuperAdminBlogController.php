<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SuperAdminBlogController extends Controller
{
    public function index(): View
    {
        return view('super-admin.blogs.index', [
            'posts' => BlogPost::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.blogs.create', [
            'categories' => BlogCategory::where('status', 'active')->orderBy('name')->get(),
            'post' => new BlogPost,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $data['slug'] ?? $this->generateUniqueSlug($data['title']);
        $data['published_at'] = $this->resolvePublishedAt($data['status'], $data['published_at'] ?? null);
        $data['image_path'] = $this->storeUploadedImage($request);

        $post = BlogPost::create($data);

        return redirect()
            ->route('super-admin.blogs.index')
            ->with('status', '"'.$post->title.'" was created successfully.');
    }

    public function show(BlogPost $blog): View
    {
        return view('super-admin.blogs.show', [
            'post' => $blog,
        ]);
    }

    public function edit(BlogPost $blog): View
    {
        return view('super-admin.blogs.edit', [
            'categories' => BlogCategory::where('status', 'active')->orderBy('name')->get(),
            'post' => $blog,
        ]);
    }

    public function update(Request $request, BlogPost $blog): RedirectResponse
    {
        $data = $this->validatedData($request, $blog);
        $data['slug'] = $data['slug'] ?? $blog->slug;
        $data['published_at'] = $this->resolvePublishedAt($data['status'], $data['published_at'] ?? null);
        $data['image_path'] = $blog->image_path;

        if ($request->hasFile('image')) {
            $this->deleteImageIfManaged($blog->image_path);
            $data['image_path'] = $this->storeUploadedImage($request);
        }

        $blog->update($data);

        return redirect()
            ->route('super-admin.blogs.index')
            ->with('status', '"'.$blog->title.'" was updated successfully.');
    }

    public function destroy(BlogPost $blog): RedirectResponse
    {
        $title = $blog->title;
        $this->deleteImageIfManaged($blog->image_path);
        $blog->delete();

        return redirect()
            ->route('super-admin.blogs.index')
            ->with('status', '"'.$title.'" was deleted successfully.');
    }

    protected function validatedData(Request $request, ?BlogPost $blog = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('blog_posts', 'slug')->ignore($blog?->id)],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:400'],
            'primary_keyword' => ['nullable', 'string', 'max:255'],
            'target_audience' => ['nullable', 'string', 'max:255'],
            'search_intent' => ['nullable', Rule::in(['informational', 'commercial', 'informational-commercial', 'transactional', 'navigational'])],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'string', 'exists:blog_categories,name', 'max:100'],
            'excerpt' => ['required', 'string', 'max:400'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);
    }

    protected function storeUploadedImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');
        $filename = Str::uuid()->toString().'.'.$file->getClientOriginalExtension();
        $storedPath = $file->storeAs('uploads/blogs', $filename, 'public');

        return $storedPath ? 'storage/'.$storedPath : null;
    }

    protected function deleteImageIfManaged(?string $imagePath): void
    {
        if (! $imagePath) {
            return;
        }

        if (str_starts_with($imagePath, 'storage/uploads/blogs/')) {
            $storagePath = Str::after($imagePath, 'storage/');

            if (Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->delete($storagePath);
            }

            return;
        }

        if (! str_starts_with($imagePath, 'uploads/blogs/')) {
            return;
        }

        $fullPath = public_path($imagePath);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            BlogPost::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    protected function resolvePublishedAt(string $status, ?string $publishedAt): ?string
    {
        if ($status !== 'published') {
            return null;
        }

        return $publishedAt ?: now()->toDateTimeString();
    }
}
