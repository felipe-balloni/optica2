@props([
    'error' => false,
    'prefix' => null,
    'required' => false,
])

<label {{ $attributes->class(['inline-flex items-center space-x-3 rtl:space-x-reverse']) }}>
    {{ $prefix }}

    <span @class([
        'text-sm font-medium leading-4',
        'text-gray-700' => ! $error,
        'text-danger-700' => $error,
    ])>
        {{ $slot }}

        @if ($required)
            <sup class="font-medium text-danger-700">*</sup>
        @endif
    </span>
</label>
