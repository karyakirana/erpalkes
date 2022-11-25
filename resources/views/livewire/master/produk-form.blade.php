
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
{{--                <x-input.group-vertical label="Deskripsi" name="keterangan">--}}
{{--                    <x-input.text wire:model.defer="keterangan" />--}}
{{--                </x-input.group-vertical>--}}
{{--            </div>--}}
            <div class="col-6">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="File Gambar" name="keterangan"><br>
{{--                    <a class="dropzone-select btn btn-sm btn-primary me-2" type="file">Upload Gambar</a>--}}
                    <x-button.btn-upload></x-button.btn-upload><br>
{{--                    <input type="file"></input>--}}
{{--                    <br>--}}
                    <span class="form-text fs-6 text-muted">Max file size is 1MB per file.</span>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="File Brosur" name="keterangan"><br>
                    <x-button.btn-base >Upload Gambar</x-button.btn-base>
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
</div>
