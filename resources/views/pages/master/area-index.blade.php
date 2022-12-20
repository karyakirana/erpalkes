<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Area">
        <livewire:datatables.sales-area-index-table />
    </x-card.standart>

    <livewire:master.area-detail />

    @push('scripts')
    @endpush
</x-metronics-layout>
