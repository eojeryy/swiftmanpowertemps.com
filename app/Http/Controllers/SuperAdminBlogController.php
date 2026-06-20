<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            'post' => new BlogPost(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->generateUniqueSlug($data['title']);
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
        $data = $this->validatedData($request);
        $data['slug'] = $this->generateUniqueSlug($data['title'], $blog->id);
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

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
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

        $directory = public_path('uploads/blogs');

        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $file = $request->file('image');
        $filename = Str::uuid()->toString().'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/blogs/'.$filename;
    }

    protected function deleteImageIfManaged(?string $imagePath): void
    {
        if (! $imagePath || ! str_starts_with($imagePath, 'uploads/blogs/')) {
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
