<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Gudang">
        <x-slot:toolbar>
            <x-button.btn-base data-bs-toggle="modal" data-bs-target="#modalGudang">Tambah Gudang</x-button.btn-base>
        </x-slot:toolbar>
        <livewire:datatables.gudang-table-index />
    </x-card.standart>
    <livewire:master.gudang-form />
</x-metronics-layout>
