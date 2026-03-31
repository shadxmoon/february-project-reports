@props(['disabled' => false])

<input
    x-data
    x-mask="aaa-999"
    type=text
 @disabled($disabled) {{ $attributes->merge(['class' => 'bg-main-100 form-item px-5 py-3']) }}>