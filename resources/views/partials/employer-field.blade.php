@php
    $fieldId = 'field-'.$field['name'];
    $fieldError = $errors->first($field['name']);
    $fieldHelp = $field['help'] ?? null;
    $fieldValue = old($field['name'], '');
@endphp
<div class="employer-field {{ !empty($field['wide']) ? 'employer-field-wide' : '' }}">
    <label for="{{ $fieldId }}">{{ $field['label'] }} @if($field['required'] ?? false)<span aria-hidden="true">*</span>@else<span class="field-optional">Optional</span>@endif</label>
    @if(isset($field['options']))
        <select class="ignore" id="{{ $fieldId }}" name="{{ $field['name'] }}" @required($field['required'] ?? false)
            @if($fieldError) aria-invalid="true" @endif
            @if($fieldHelp || $fieldError) aria-describedby="{{ $fieldHelp ? $fieldId.'-help' : '' }} {{ $fieldError ? $fieldId.'-error' : '' }}" @endif>
            <option value="">{{ $field['placeholder'] ?? 'Choose an option' }}</option>
            @foreach($field['options'] as $option)
                <option value="{{ $option }}" @selected($fieldValue === $option)>{{ $option }}</option>
            @endforeach
        </select>
    @else
        <input id="{{ $fieldId }}" type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" value="{{ $fieldValue }}"
            placeholder="{{ $field['placeholder'] ?? '' }}" maxlength="{{ $field['max'] ?? 255 }}"
            @if(isset($field['autocomplete'])) autocomplete="{{ $field['autocomplete'] }}" @endif
            @required($field['required'] ?? false) @if($fieldError) aria-invalid="true" @endif
            @if($fieldHelp || $fieldError) aria-describedby="{{ $fieldHelp ? $fieldId.'-help' : '' }} {{ $fieldError ? $fieldId.'-error' : '' }}" @endif>
    @endif
    @if($fieldHelp)<p class="field-help" id="{{ $fieldId }}-help">{{ $fieldHelp }}</p>@endif
    @if($fieldError)<p class="field-error" id="{{ $fieldId }}-error">{{ $fieldError }}</p>@endif
</div>
