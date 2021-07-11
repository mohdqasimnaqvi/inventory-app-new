<!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
@props(['value', 'current_val'])
<option
    {{ $attributes([
        'value' => $value,
        'selected' => $currentVal === $value ? 'selected' : ''
    ]) }}> {{ $value }} </option>
