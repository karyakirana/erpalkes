<div>
    <!--begin::modal-->
    <x-modal.standart id="modalProdukKategori" size="lg" title="Form Sub Kategori" wire:ignore.self>
        <!--begin::form -->
        <x-input.group-horizontal label="Kode" name="kode">
            <x-input.text wire:model.defer="kode" disabled />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Kategori" name="kategori">
            @php
                $kategoriData = \App\Models\Master\ProdukKategori::latest()->get();
            @endphp
            <x-input.select wire:model.defer="kategori_id">
                <option>Dipilih</option>
                @foreach($kategoriData as $row)
                    <option value="{{$row->id}}">{{$row->kategori}}</option>
                @endforeach
            </x-input.select>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Sub Kategori" name="nama_sub_kategori">
            <x-input.text wire:model.defer="nama_sub_kategori" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan" />
        </x-input.group-horizontal>
        <!--end::form -->
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-modal.standart>
    <!--end::modal-->
    @push('scripts')
        <script>
            const modalsArea = new bootstrap.Modal(document.getElementById('modalProdukKategori'));

            window.livewire.on('modalSubKategoriHide', function () {
                modalsArea.hide()
            })

            window.livewire.on('modalSubKategoriShow', function (){
                modalsArea.show()
            })

            document.getElementById('modalArea').addEventListener('hidden.bs.modal', event => {
                Livewire.emit('resetForm')
                refreshDatatables()
            })

        </script>
    @endpush
</div>
