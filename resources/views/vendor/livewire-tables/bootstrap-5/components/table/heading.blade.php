@props([
    'column',
    'sortingEnabled' => true,
    'sortable' => null,
    'direction' => null,
    'text' => null,
    'customAttributes' => [],
])

@unless ($sortingEnabled && $sortable)
    <th {{ $attributes->merge($customAttributes) }}>
        {{ $text ?? $slot }}
    </th>
@else
    <th
        wire:click="sortBy('{{ $column }}', '{{ $text ?? $column }}')"
        {{ $attributes->merge($customAttributes) }}
        style="cursor:pointer;"
    >
        <div class="d-flex align-items-center">
            <span>{{ $text }}</span>

            <span class="relative d-flex align-items-center">
                @if ($direction === 'asc')
                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-1" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="#BEBDB8">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                @elseif ($direction === 'desc')
                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-1" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="#BEBDB8">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-1" style="width:1em;height:1em;" fill="none" viewBox="0 0 24 24" stroke="#BEBDB8">
                        <path d="M7 6.59998V20C7 20.6 7.4 21 8 21C8.6 21 9 20.6 9 20V6.59998H7ZM15 17.4V4C15 3.4 15.4 3 16 3C16.6 3 17 3.4 17 4V17.4H15Z" fill="currentColor"/>
                        <path opacity="0.3" d="M3 6.59999H13L8.7 2.3C8.3 1.9 7.7 1.9 7.3 2.3L3 6.59999ZM11 17.4H21L16.7 21.7C16.3 22.1 15.7 22.1 15.3 21.7L11 17.4Z" fill="currentColor"/>
                    </svg>
                @endif
            </span>
        </div>
    </th>
@endif
