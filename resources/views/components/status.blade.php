@props(['type'])

@php 

$classes = match($type) {
    1 => 'text-main-100',
    2 => 'text-accent',
    3 => 'text-main-800',
};

@endphp

<div>
    <p>статус заявления - <span {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</span></p>
</div>