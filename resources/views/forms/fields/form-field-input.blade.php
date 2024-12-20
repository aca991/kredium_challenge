<div class="form-field">
    <input class="form-input"
           @if(!empty($placeholder)) placeholder="{{ $placeholder }}" @endif
           @if(!empty($type)) type="{{ $type }}" @endif
           @if(!empty($name)) name="{{ $name }}" @endif
           @if(!empty($step)) step="{{ $step }}" @endif
           @if(!empty($value)) value="{{ $value }}" @endif/>
    @error($name, $errorBag ?? '')
    <div class="alert">{{ $errors->{$errorBag}->first($name) }}</div>
    @enderror
</div>
