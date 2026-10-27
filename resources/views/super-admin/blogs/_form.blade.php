@php
    $isEdit = $post->exists;
@endphp

<div class="blog-form-grid">
    <div class="admin-card form-panel">
        <div class="form-section-title">
            <h3>Post Details</h3>
            <span>Write the main content and short summary for the blog post.</span>
        </div>

        <div class="form-grid-two">
            <div class="form-field">
                <label for="title">Blog title</label>
                <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}" @if($errors->has('title')) aria-describedby="title-error" @endif maxlength="255">
                @error('title')<p class="workspace-field-error" id="title-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-field">
                <label for="category">Category</label>
                <select id="category" name="category" required aria-invalid="{{ $errors->has('category') ? 'true' : 'false' }}" @if($errors->has('category')) aria-describedby="category-error" @endif>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ old('category', $post->category) === $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')<p class="workspace-field-error" id="category-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form-field">
            <label id="excerpt-label" for="excerpt">Short excerpt</label>
            <div class="richtext-wrap" data-richtext>
                <div class="richtext-toolbar">
                    <button type="button" data-command="bold" aria-label="Bold">B</button>
                    <button type="button" data-command="italic" aria-label="Italic"><em>I</em></button>
                    <button type="button" data-command="underline" aria-label="Underline"><u>U</u></button>
                    <button type="button" data-command="insertUnorderedList" aria-label="Bullet list">&bull; List</button>
                    <button type="button" data-richtext-link aria-label="Insert link">Link</button>
                </div>
                <div class="richtext-editor" id="excerpt-editor" contenteditable="true" role="textbox" aria-multiline="true" aria-required="true" aria-labelledby="excerpt-label" data-size="sm" data-placeholder="Write a short excerpt..."></div>
                <textarea id="excerpt" class="richtext-source" name="excerpt" rows="4" required aria-invalid="{{ $errors->has('excerpt') ? 'true' : 'false' }}" @if($errors->has('excerpt')) aria-describedby="excerpt-error" @endif>{{ \App\Support\RichText::html(old('excerpt', $post->excerpt)) }}</textarea>
                @error('excerpt')<p class="workspace-field-error" id="excerpt-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form-field">
            <label id="content-label" for="content">Full content</label>
            <div class="richtext-wrap" data-richtext>
                <div class="richtext-toolbar">
                    <button type="button" data-command="bold" aria-label="Bold">B</button>
                    <button type="button" data-command="italic" aria-label="Italic"><em>I</em></button>
                    <button type="button" data-command="underline" aria-label="Underline"><u>U</u></button>
                    <button type="button" data-command="insertUnorderedList" aria-label="Bullet list">&bull; List</button>
                    <button type="button" data-command="insertOrderedList" aria-label="Number list">1. List</button>
                    <button type="button" data-command="formatBlock" data-command-value="blockquote" aria-label="Quote">Quote</button>
                    <button type="button" data-richtext-link aria-label="Insert link">Link</button>
                </div>
                <div class="richtext-editor" id="content-editor" contenteditable="true" role="textbox" aria-multiline="true" aria-required="true" aria-labelledby="content-label" data-size="lg" data-placeholder="Write the full blog content..."></div>
                <textarea id="content" class="richtext-source" name="content" rows="14" required aria-invalid="{{ $errors->has('content') ? 'true' : 'false' }}" @if($errors->has('content')) aria-describedby="content-error" @endif>{{ \App\Support\RichText::html(old('content', $post->content)) }}</textarea>
                @error('content')<p class="workspace-field-error" id="content-error">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="form-section-title">
            <h3>SEO &amp; audience</h3>
            <span>Optional publishing settings. Use the keyword naturally in your title, introduction and headings.</span>
        </div>

        <div class="form-field">
            <label for="primary_keyword">Primary keyword</label>
            <input id="primary_keyword" name="primary_keyword" type="text" maxlength="255" value="{{ old('primary_keyword', $post->primary_keyword) }}" placeholder="e.g. Post jobs online in Canada">
            @error('primary_keyword')<p class="workspace-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-field">
            <label for="seo_title">SEO title</label>
            <input id="seo_title" name="seo_title" type="text" maxlength="255" value="{{ old('seo_title', $post->seo_title) }}" placeholder="e.g. Why Canadian Employers Should Post Jobs Online in 2026: 7 Key Benefits">
            <small class="field-note">Leave blank to use the blog title with the site name. Keep it clear and concise; long titles may be shortened in search results.</small>
            @error('seo_title')<p class="workspace-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-field">
            <label for="slug">URL slug</label>
            <input id="slug" name="slug" type="text" maxlength="255" pattern="[a-z0-9]+(-[a-z0-9]+)*" value="{{ old('slug', $post->slug) }}" placeholder="why-canadian-employers-should-post-jobs-online-2026">
            <small class="field-note">Lowercase letters, numbers and hyphens. Generated from the title on creation if blank. Keep published slugs stable to preserve existing links.</small>
            @error('slug')<p class="workspace-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-field">
            <label for="meta_description">Meta description</label>
            <textarea id="meta_description" name="meta_description" maxlength="400" rows="3">{{ old('meta_description', $post->meta_description) }}</textarea>
            <small class="field-note">Summarize the benefit to readers in roughly 150–160 characters. Uses the excerpt if blank.</small>
            @error('meta_description')<p class="workspace-field-error">{{ $message }}</p>@enderror
        </div>
        <div class="form-grid-two">
            <div class="form-field">
                <label for="target_audience">Target audience</label>
                <input id="target_audience" name="target_audience" type="text" maxlength="255" value="{{ old('target_audience', $post->target_audience) }}" placeholder="Canadian employers, recruiters, HR managers">
                @error('target_audience')<p class="workspace-field-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-field">
                <label for="search_intent">Search intent</label>
                <select id="search_intent" name="search_intent">
                    <option value="">Select intent (optional)</option>
                    @foreach (['informational' => 'Informational', 'commercial' => 'Commercial', 'informational-commercial' => 'Informational and commercial', 'transactional' => 'Transactional', 'navigational' => 'Navigational'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('search_intent', $post->search_intent) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                <small class="field-note">An editorial guide for writing the article.</small>
                @error('search_intent')<p class="workspace-field-error">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>

    <div class="form-side-stack">
        <div class="admin-card form-panel">
            <div class="form-section-title">
                <h3>Publishing</h3>
                <span>Control how the post appears in the admin system.</span>
            </div>

            <div class="form-field">
                <label for="status">Status</label>
                <select id="status" name="status" required aria-invalid="{{ $errors->has('status') ? 'true' : 'false' }}" @if($errors->has('status')) aria-describedby="status-error" @endif>
                    <option value="draft" {{ old('status', $post->status ?: 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')<p class="workspace-field-error" id="status-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-field">
                <label for="published_at">Published date and time</label>
                <input
                    id="published_at"
                    type="datetime-local"
                    name="published_at"
                    value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
                 aria-invalid="{{ $errors->has('published_at') ? 'true' : 'false' }}" @if($errors->has('published_at')) aria-describedby="published_at-error" @endif>
                @error('published_at')<p class="workspace-field-error" id="published_at-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-field">
                <label for="image_alt">Image alt text</label>
                <input id="image_alt" name="image_alt" type="text" maxlength="255" value="{{ old('image_alt', $post->image_alt) }}" placeholder="Describe what the blog picture shows">
                <small class="field-note">Describe the actual image for readers using screen readers. Include the keyword only when it fits the image.</small>
                @error('image_alt')<p class="workspace-field-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-field">
                <label for="image">Blog picture</label>
                <input id="image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" aria-invalid="{{ $errors->has('image') ? 'true' : 'false' }}" @if($errors->has('image')) aria-describedby="image-error" @endif>
                @error('image')<p class="workspace-field-error" id="image-error">{{ $message }}</p>@enderror
                <small class="field-note">JPG, PNG, or WebP. Maximum 4 MB.</small>
                <div class="image-preview-card {{ $post->image_path ? '' : 'is-empty' }}" data-image-preview-wrapper>
                    <span data-image-preview-label>{{ $post->image_path ? 'Current picture' : 'Selected picture preview' }}</span>
                    <img
                        src="{{ $post->image_path ? asset($post->image_path) : '' }}"
                        alt="{{ $post->title ?: 'Selected blog picture preview' }}"
                        data-image-preview
                        {{ $post->image_path ? '' : 'hidden' }}
                    >
                    <p class="image-preview-empty" data-image-preview-empty>No image selected yet.</p>
                </div>
            </div>
        </div>

        <div class="admin-card form-panel">
            <div class="form-section-title">
                <h3>Save Post</h3>
                <span>{{ $isEdit ? 'Update the current post details.' : 'Create the post and add it to your blog list.' }}</span>
            </div>

            <div class="form-actions">
                <button type="submit" class="admin-btn admin-btn-primary">{{ $isEdit ? 'Save changes' : 'Save post' }}</button>
                <a href="{{ route('super-admin.blogs.index') }}" class="admin-btn admin-btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
