<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Users">
        <x-slot:toolbar>
            <x-button.btn-link-base href="{{route('users.form')}}">Add Users</x-button.btn-link-base>
        </x-slot:toolbar>
        <livewire:datatables.user-index-table />
    </x-card.standart>
</x-metronics-layout>
