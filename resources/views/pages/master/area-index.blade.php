<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Area">
        <x-slot:toolbar>
            <x-button.btn-link-base href="{{route('area.form')}}">Add Sales</x-button.btn-link-base>
        </x-slot:toolbar>
        <livewire:datatables.sales-area-index-table />
    </x-card.standart>

    <livewire:master.area-detail />

    @push('scripts')
    @endpush
</x-metronics-layout>
