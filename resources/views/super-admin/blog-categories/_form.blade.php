@php
    $isEdit = $category->exists;
@endphp

<div class="category-form-grid">
    <div class="admin-card category-panel">
        <div class="category-section-title">
            <h3>Category Details</h3>
            <span>Create a clean category name and short description for grouping blog content.</span>
        </div>

        <div class="category-field">
            <label for="name">Category name</label>
            <input id="name" type="text" name="name" value="{{ old('name', $category->name) }}" required aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" @if($errors->has('name')) aria-describedby="name-error" @endif autocomplete="off" maxlength="120">
                @error('name')<p class="workspace-field-error" id="name-error">{{ $message }}</p>@enderror
        </div>

        <div class="category-field">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="8" aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}" @if($errors->has('description')) aria-describedby="description-error" @endif maxlength="1000">{{ old('description', $category->description) }}</textarea>
                @error('description')<p class="workspace-field-error" id="description-error">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="category-side-stack">
        <div class="admin-card category-panel">
            <div class="category-section-title">
                <h3>Status</h3>
                <span>Control whether this category is active for admin use.</span>
            </div>

            <div class="category-field">
                <label for="status">Category status</label>
                <select id="status" name="status" required aria-invalid="{{ $errors->has('status') ? 'true' : 'false' }}" @if($errors->has('status')) aria-describedby="status-error" @endif>
                    <option value="active" {{ old('status', $category->status ?: 'active') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $category->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')<p class="workspace-field-error" id="status-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="admin-card category-panel">
            <div class="category-section-title">
                <h3>Save Category</h3>
                <span>{{ $isEdit ? 'Update the category details.' : 'Create this category and add it to your list.' }}</span>
            </div>

            <div class="category-actions">
                <button type="submit" class="category-btn category-btn-primary">{{ $isEdit ? 'Update Category' : 'Add Category' }}</button>
                <a href="{{ route('super-admin.blog-categories.index') }}" class="category-btn category-btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
