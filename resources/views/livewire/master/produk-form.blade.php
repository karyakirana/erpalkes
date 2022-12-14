<div class="mt-5 form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
    <!-- begin::aside Column -->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <livewire:master.image-form />
        <livewire:master.kategori-sub-kategori-form/>
    </div>
    <!-- end::aside Column -->
    <!-- begin::main Column -->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!-- begin::tab -->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
            <!-- begin::tab-items -->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#tab_general">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#tab_detail">Detail</a>
            </li>
            <!-- end::tab-items -->
        </ul>
        <!-- end::tab -->
        <!-- begin::tab-content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <x-card.standart title="Form Produk" class="mt-5 card-flush">
                        <x-input.group-vertical label="Product Name" name="nama_produk">
                            <x-input.text wire:model.defer="nama_produk" />
                        </x-input.group-vertical>
                        <x-input.group-vertical label="Merk" name="nama_produk">
                            <x-input.text wire:model.defer="nama_produk" />
                        </x-input.group-vertical>
                        <x-input.group-vertical label="Tipe">
                            <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2" wire:model.defer="tipe"></div>
                        </x-input.group-vertical>
                    </x-card.standart>
                    <livewire:master.multiple-image-form />
                    <livewire:master.produk-harga-form />
                </div>

            </div>
            <div class="tab-pane fade" id="tab_detail" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <x-card.standart></x-card.standart>
                    <livewire:master.produk-kemasan-satuan-form />
                </div>
            </div>
        </div>
        <!-- end::tab-content -->
    </div>
    <!-- end::main Column -->


    @section('scripts')

        <script>
            //configuration filepond
            const inputElement = document.querySelector('input[id="image"]');
            // Create a FilePond instance
            const pond = FilePond.create(inputElement);
            //tujuan filepond
            FilePond.setOptions({
                server: {
                    process: '{{ route('upload') }}', //upload
                    revert: '{{ route('hapus') }}', //cancel
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
            //end config filepond
            $(document).ready(function() {
                $("#addForm").on('submit', function(e) {
                    e.preventDefault();
                    $("#saveBtn").html('Processing...').attr('disabled', 'disabled');
                    var link = $("#addForm").attr('action');
                    $.ajax({
                        url: link,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#saveBtn").html('Save').removeAttr('disabled');
                            pond.removeFiles(); //clear
                            alert('Berhasil')
                        },
                        error: function(response) {
                            $("#saveBtn").html('Save').removeAttr('disabled');
                            alert(response.error);
                        }
                    });
                });
            });
        </script>
    @endsection
</div>
