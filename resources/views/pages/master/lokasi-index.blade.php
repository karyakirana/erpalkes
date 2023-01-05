<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Lokasi">
        <x-slot:toolbar>
            <x-button.btn-base data-bs-toggle="modal" data-bs-target="#modalLokasiSet">Add Lokasi</x-button.btn-base>
        </x-slot:toolbar>
        <livewire:datatables.lokasi-index-table />
    </x-card.standart>
    <livewire:master.lokasi-form />
</x-metronics-layout>
