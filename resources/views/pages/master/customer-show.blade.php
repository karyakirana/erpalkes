<x-metronics-layout>
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
            {{-- customer details - aka sidebar --}}
            <livewire:master.customer-detail-sidebar :customer_id="$customer_id" />
        </div>
        <div class="flex-lg-row-fluid ms-lg-15">
            {{-- customer information - content --}}
        </div>
    </div>
</x-metronics-layout>
