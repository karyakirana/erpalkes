<x-metronics-layout>
    <x-card.standart title="Data Jabatan" class="mt-5">
        <x-slot:toolbar>
            <x-button.btn-base data-bs-toggle="modal" data-bs-target="#modalJabatan">Add Jabatan</x-button.btn-base>
        </x-slot:toolbar>
        <livewire:master.jabatan-index-table />
    </x-card.standart>

    <livewire:master.jabatan-form />

    @push('scripts')
    @endpush
</x-metronics-layout>
