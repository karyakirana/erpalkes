
<div>
    <x-card.standart title="Form Produk" class="mt-5">
        <x-slot:toolbar>
            <h4>{{$kode}}</h4>
        </x-slot:toolbar>
        <div class="row">
            <div class="col-6">
                <x-input.group-vertical label="Nama" name="nama_produk">
                    <x-input.text wire:model.defer="nama_produk" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Tipe" name="tipe">
                    <x-input.text wire:model.defer="tipe" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Isi Kemasan" name="isi_kemasan">
                    <x-input.text wire:model.defer="isi_kemasan" />
                </x-input.group-vertical>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-input.group-vertical label="Kategori" name="produk_kategori_id">
                    <x-input.text wire:model.defer="produk_kategori_id" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Satuan Beli" name="satuan_beli">
                    <x-input.text wire:model.defer="satuan_beli" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Satuan Jual" name="satuan_jual">
                    <x-input.text wire:model.defer="satuan_jual" />
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
{{--            <div class="col-6">--}}
{{--                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>--}}
{{--                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>--}}
{{--            </div>--}}
            <div class="col-12">
                <x-input.group-vertical label="Produk Brosur" ><br>
                    <form id="addForm" method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="image" id='image' class='p-5'>
                        </div>
                    </form>
                    <span class="form-text fs-6 text-muted">Max file size is 1MB per file.</span>
                </x-input.group-vertical>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-input.group-vertical label="Harga" name="harga">
                    <x-input.text wire:model.defer="harga" />
                </x-input.group-vertical>
            </div>
            <div class="col-6">
                <x-input.group-vertical label="Deskripsi" name="keterangan">
                    <x-input.text wire:model.defer="keterangan" />
                </x-input.group-vertical>
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-4">--}}
        {{--                <x-input.group-vertical label="Alamat" name="alamat">--}}
        {{--                    <x-input.text wire:model.defer="alamat"/>--}}
        {{--                </x-input.group-vertical>--}}
        {{--            </div>--}}
        {{--            <div class="col-8">--}}
        {{--                <x-input.group-vertical label="Keterangan" name="keterangan">--}}
        {{--                    <x-input.text wire:model.defer="keterangan"/>--}}
        {{--                </x-input.group-vertical>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-card.standart>

    @section('scripts')
{{--        <script>--}}
{{--            // get a collection of elements with class filepond--}}
{{--            const inputElements = document.querySelectorAll('input.filepond');--}}

{{--            // loop over input elements--}}
{{--            Array.from(inputElements).forEach(inputElement => {--}}

{{--                // create a FilePond instance at the input element location--}}
{{--                FilePond.create(inputElement);--}}

{{--            })--}}
{{--        </script>--}}

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
