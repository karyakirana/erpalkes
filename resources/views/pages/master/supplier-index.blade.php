<x-metronics-layout>
    <x-card.standart class="mt-5" title="Data Supplier">
        <x-slot:toolbar>
            <!--begin::Add Supplier-->
            <x-button.btn-link-base href="{{route('supplier.form')}}">
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                Add Supplier
            </x-button.btn-link-base>
            <!--end::Add Supplier-->
        </x-slot:toolbar>
        <livewire:supplier-index-table />
    </x-card.standart>
    @push('scripts')
        <script>
        </script>
    @endpush
</x-metronics-layout>
