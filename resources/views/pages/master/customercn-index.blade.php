<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Customer CN">
        <x-slot:toolbar>
            <x-button.btn-link-base href="{{route('customercn.form')}}">Add Customer CN</x-button.btn-link-base>
        </x-slot:toolbar>
        <livewire:datatables.customercn-index-table />
    </x-card.standart>
</x-metronics-layout>
