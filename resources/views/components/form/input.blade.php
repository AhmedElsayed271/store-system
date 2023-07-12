@props([
    'type' => 'text', 'name','value' 
])

<div>
    <input type="{{ $type }}" name="{{ $name }}"
    value="{{ old($name, $value) }}" {{ $attributes }}>
@error($name)
    <div class="text-danger mt-2"> {{ $message }} </div>
@enderror
</div>