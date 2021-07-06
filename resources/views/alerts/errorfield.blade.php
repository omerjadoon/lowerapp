@if ($errors->has($field))
    <span class="error-field text-danger custom" role="alert">{{ $errors->first($field) }}</span>
@endif
