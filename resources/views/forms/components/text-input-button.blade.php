@php
    $datalistOptions = $getDatalistOptions();

    $sideLabelClasses = [
        'whitespace-nowrap transition group-focus-within:text-primary-500',
        'text-gray-400' => ! $errors->has($getStatePath()),
        'text-danger-400' => $errors->has($getStatePath()),
    ];
@endphp

<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div {{ $attributes->merge($getExtraAttributes())->class(['flex items-center space-x-1 group']) }}>
        @if ($label = $getPrefixLabel())
            <span @class($sideLabelClasses)>
                {{ $label }}
            </span>
        @endif

        <div class="group flex-1 relative rounded-lg overflow-hidden">
            <input
            @unless ($hasMask())
                {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
                type="{{ $getType() }}"
            @else
                x-data="textInputFormComponent({
                        {{ $hasMask() ? "getMaskOptionsUsing: (IMask) => ({$getJsonMaskConfiguration()})," : null }}
                state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
                    })"
                type="text"
                wire:ignore
                {{ $getExtraAlpineAttributeBag() }}
            @endunless
            {!! ($autocapitalize = $getAutocapitalize()) ? "autocapitalize=\"{$autocapitalize}\"" : null !!}
            {!! ($autocomplete = $getAutocomplete()) ? "autocomplete=\"{$autocomplete}\"" : null !!}
            {!! $isAutofocused() ? 'autofocus' : null !!}
            {!! $isDisabled() ? 'disabled' : null !!}
            id="{{ $getId() }}"
            {!! ($inputMode = $getInputMode()) ? "inputmode=\"{$inputMode}\"" : null !!}
            {!! $datalistOptions ? "list=\"{$getId()}-list\"" : null !!}
            {!! ($length = $getMaxLength()) ? "maxlength=\"{$length}\"" : null !!}
            {!! ($value = $getMaxValue()) ? "max=\"{$value}\"" : null !!}
            {!! ($length = $getMinLength()) ? "minlength=\"{$length}\"" : null !!}
            {!! ($value = $getMinValue()) ? "min=\"{$value}\"" : null !!}
            {!! ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null !!}
            {!! ($interval = $getStep()) ? "step=\"{$interval}\"" : null !!}
            {!! $isRequired() ? 'required' : null !!}
            @class([
                'block w-full h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 z-10',
                'border-gray-300' => ! $errors->has($getStatePath()),
                'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
            ])
            />
            <span class="absolute inset-y-0 right-0 items-center">
                <button
                    type="button"
                    class="py-2 px-3 text-white focus:outline-none transition focus:shadow-outline bg-primary-600 rounded-r-lg group-focus-within:ring-2 group-focus-within:ring-inset group-focus-within:ring-primary-600 hover:bg-primary-500 z-0"
                    @unless ($isDisabled())
                    wire:click="buttonClick('{{ $getState() }}', '{{ $getStatePath() }}')"
                    wire:loading.attr="disabled"
                    @endunless
                >
                    <svg class="animate-spin h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         wire:loading
                         wire:target="buttonClick">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>

                    <svg wire:loading.class="hidden"
                         wire:target="buttonClick"
                         fill="none"
                         stroke="currentColor"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         class="w-6 h-6">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </span>
        </div>

            @if ($label = $getPostfixLabel())
                <span @class($sideLabelClasses)>
                {{ $label }}
            </span>
            @endif
    </div>

    @if ($datalistOptions)
        <datalist id="{{ $getId() }}-list">
            @foreach ($datalistOptions as $option)
                <option value="{{ $option }}"/>
            @endforeach
        </datalist>
    @endif
</x-forms::field-wrapper>
