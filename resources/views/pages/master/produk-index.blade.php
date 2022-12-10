<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Produk">
        <x-slot:toolbar>
            <!--begin::Add produk-->
            <x-button.btn-link-base href="{{route('produk.form')}}">
                Add Produk
            </x-button.btn-link-base>
            <!--end::Add produk-->
        </x-slot:toolbar>
        <livewire:produk-index-table />

    </x-card.standart>
    @push('scripts')
    @endpush
</x-metronics-layout>
