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
    <div class="flex items-center space-x-1 group relative">
        @if ($label = $getPrefixLabel())
            <span @class($sideLabelClasses)>
                {{ $label }}
            </span>
        @endif

        <div class="flex-1">
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
            @endunless
            x-ref="input"
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
            {{ $attributes->merge($getExtraAttributes())->class([
                'block w-full h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600',
                'border-gray-300' => ! $errors->has($getStatePath()),
                'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
            ]) }}
            />
            <span class="absolute inset-y-0 right-0 flex items-center pr-2">
                <button
                    type="button"
                    class="p-1 focus:outline-none focus:shadow-outline"
                    @unless ($isDisabled())
                        wire:click="getCEP('{{ $getState() }}')"
                    @endunless
                >
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
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
