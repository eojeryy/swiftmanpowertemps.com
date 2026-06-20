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
                <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required>
            </div>
            <div class="form-field">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" {{ old('category', $post->category) === $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-field">
            <label for="excerpt">Short excerpt</label>
            <div class="richtext-wrap" data-richtext>
                <div class="richtext-toolbar">
                    <button type="button" data-command="bold" aria-label="Bold">B</button>
                    <button type="button" data-command="italic" aria-label="Italic"><em>I</em></button>
                    <button type="button" data-command="underline" aria-label="Underline"><u>U</u></button>
                    <button type="button" data-command="insertUnorderedList" aria-label="Bullet list">&bull; List</button>
                    <button type="button" data-richtext-link aria-label="Insert link">Link</button>
                </div>
                <div class="richtext-editor" contenteditable="true" data-size="sm" data-placeholder="Write a short excerpt..."></div>
                <textarea id="excerpt" class="richtext-source" name="excerpt" rows="4" required>{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>
        </div>

        <div class="form-field">
            <label for="content">Full content</label>
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
                <div class="richtext-editor" contenteditable="true" data-size="lg" data-placeholder="Write the full blog content..."></div>
                <textarea id="content" class="richtext-source" name="content" rows="14" required>{{ old('content', $post->content) }}</textarea>
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
                <select id="status" name="status" required>
                    <option value="draft" {{ old('status', $post->status ?: 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <div class="form-field">
                <label for="published_at">Published date and time</label>
                <input
                    id="published_at"
                    type="datetime-local"
                    name="published_at"
                    value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
                >
            </div>

            <div class="form-field">
                <label for="image">Blog picture</label>
                <input id="image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
                <small class="field-note">Upload a blog image to match the frontend card and detail layout.</small>
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
                <button type="submit" class="admin-btn admin-btn-primary">{{ $isEdit ? 'Update Blog' : 'Publish Blog' }}</button>
                <a href="{{ route('super-admin.blogs.index') }}" class="admin-btn admin-btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
