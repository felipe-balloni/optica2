<div
    @if ($isCollapsible())
        x-data="{ isCollapsed: {{ $isCollapsed() ? 'true' : 'false' }} }"
        x-on:expand-concealing-component.window="if ($event.detail.id === $el.id) isCollapsed = false"
    @endif
    id="{{ $getId() }}"
    {{ $attributes->merge($getExtraAttributes())->class(['p-6 space-y-6 rounded-xl shadow-sm border border-gray-300']) }}
>
    <div class="flex space-x-3">
        <div class="flex-1 space-y-1">
            <h3 class="text-xl font-bold tracking-tight">
                {{ $getHeading() }}
            </h3>

            @if ($description = $getDescription())
                <p class="text-gray-500">
                    {{ $description }}
                </p>
            @endif
        </div>

        @if ($isCollapsible())
            <button
                x-on:click="isCollapsed = ! isCollapsed"
                x-bind:class="{
                    '-rotate-180': ! isCollapsed,
                }"
                type="button"
                class="flex items-center justify-center w-10 h-10 text-primary-500 transform transition rounded-full hover:bg-gray-500/5 focus:bg-primary-500/10 focus:outline-none"
            >
                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        @endif
    </div>

    <div
        @if ($isCollapsible())
            x-show="! isCollapsed"
            x-bind:aria-expanded="(! isCollapsed).toString()"
        @endif
    >
        {{ $getChildComponentContainer() }}
    </div>
</div>
