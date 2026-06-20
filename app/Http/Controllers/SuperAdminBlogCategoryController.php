<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SuperAdminBlogCategoryController extends Controller
{
    public function index(): View
    {
        return view('super-admin.blog-categories.index', [
            'categories' => BlogCategory::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('super-admin.blog-categories.create', [
            'category' => new BlogCategory(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->generateUniqueSlug($data['name']);

        $category = BlogCategory::create($data);

        return redirect()
            ->route('super-admin.blog-categories.index')
            ->with('status', '"'.$category->name.'" category was created successfully.');
    }

    public function show(BlogCategory $blogCategory): View
    {
        return view('super-admin.blog-categories.show', [
            'category' => $blogCategory,
        ]);
    }

    public function edit(BlogCategory $blogCategory): View
    {
        return view('super-admin.blog-categories.edit', [
            'category' => $blogCategory,
        ]);
    }

    public function update(Request $request, BlogCategory $blogCategory): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->generateUniqueSlug($data['name'], $blogCategory->id);

        $blogCategory->update($data);

        return redirect()
            ->route('super-admin.blog-categories.index')
            ->with('status', '"'.$blogCategory->name.'" category was updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        $name = $blogCategory->name;
        $blogCategory->delete();

        return redirect()
            ->route('super-admin.blog-categories.index')
            ->with('status', '"'.$name.'" category was deleted successfully.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'in:active,inactive'],
        ]);
    }

    protected function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (
            BlogCategory::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
