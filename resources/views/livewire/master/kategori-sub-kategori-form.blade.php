<div>
    <div class="card card-flush py-4">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Product Details</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Input group-->
            <x-input.group-vertical label="Categories" name="kategori_id">
            <!--begin::Select-->
            <x-input.select class="mb-2" wire:model="kategori_id">
                <option>Dipilih</option>
                @foreach($dataKategori as $row)
                    <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
            </x-input.select>
            <!--end::Select-->
            <!--end::Input group-->
            </x-input.group-vertical>
            <!--begin::Button-->
            <a href="javascript:void(0)" class="btn btn-light-primary btn-sm mb-10" data-bs-toggle="modal" data-bs-target="#modalKategori">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                        <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                Create category
            </a>
            <!--end::Button-->
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label">Sub Categories</label>
            <!--end::Label-->
            <!--begin::Select-->
            <select class="form-select mb-2" wire:model="sub_kategori_id">
                <option>Dipilih</option>
                @foreach($dataSubKategori as $row)
                    <option value="{{$row->id}}">{{$row->nama_sub_kategori}}</option>
                @endforeach
            </select>
            <!--end::Select-->
            <!--begin::Description-->
            <div class="text-muted fs-7 mb-7">Add product to a category.</div>
            <!--end::Description-->
            <!--end::Input group-->
            <!--begin::Button-->
            <a href="#" class="btn btn-light-primary btn-sm mb-10" wire:click="openFormSubKategori">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                        <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                Create Sub category
            </a>
            <!--end::Button-->
        </div>
        <!--end::Card body-->
    </div>
    <x-modal.standart id="modalKategori" size="lg" title="Input Kategori" wire:ignore.self>
        <x-input.group-horizontal label="Nama Kategori" name="nama_kategori">
            <x-input.text wire:model.defer="nama_kategori" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan_kategori">
            <x-input.text wire:model.defer="keterangan_kategori" />
        </x-input.group-horizontal>
        <x-slot:footer>
            <x-button.btn-base wire:click="storeKategori">Simpan</x-button.btn-base>
        </x-slot:footer>
    </x-modal.standart>
    <x-modal.standart id="modalSubKategori" title="Input Sub Kategori" wire:ignore.self>
        <x-input.group-horizontal label="Nama Sub Kategori" name="nama_sub_kategori">
            <x-input.text wire:model.defer="nama_sub_kategori" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan_sub_kategori">
            <x-input.text wire:model.defer="keterangan_sub_kategori" />
        </x-input.group-horizontal>
        <x-slot:footer>
            <x-button.btn-base wire:click="storeSubKategori">Simpan</x-button.btn-base>
        </x-slot:footer>
    </x-modal.standart>
    @push('scripts')
        <script>
            let modalKategori = new bootstrap.Modal(document.getElementById('modalKategori'));
            window.livewire.on('modalKategoriHide', function () {
                modalKategori.hide();
            })
            let modalFormSubKategori = new bootstrap.Modal(document.getElementById('modalSubKategori'));
            window.livewire.on('modalSubKategoriHide', function () {
                modalFormSubKategori.hide();
            })
            Livewire.on('modalSubKategoriShow', function () {
                modalFormSubKategori.show();
            })
        </script>
    @endpush
</div>
