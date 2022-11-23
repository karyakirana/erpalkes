@props(['messages'])
@if($messages)
    @foreach ((array) $messages as $message)
        <span class="invalid-feedback">{{ $message }}</span>
    @endforeach
@endif
