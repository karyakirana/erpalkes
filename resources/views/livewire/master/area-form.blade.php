<div>
    <x-card.standart class="mt-5" title="Form Area">
        <div class="row">
            <div class="col-8 p-5">
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Area" name="nama_area">
                            <x-input.text wire:model.defer="nama_area"/>
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-6">
                        <x-input.group-horizontal label="Keterangan" name="keterangan">
                            <x-input.text wire:model.defer="keterangan" />
                        </x-input.group-horizontal>
                    </div>
                </div>
                <!--begin::table-->
                <div class="table-responsive">
                    <table class="table table-row-bordered gx-4">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th>Nomor</th>
                                <th>Provinsi</th>
                                <th>Kota/Kabupaten</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataDetail as $index => $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row['provinces_name']}}</td>
                                    <td>{{$row['regencies_name']}}</td>
                                    <td>$index</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--end::table-->
            </div>
            <div class="col-4 border p-4">
                <x-input.group-vertical label="Provinsi">
                    <x-input.select id="selectProvinsi" data-placeholder="Select an option" data-allow-clear="true"></x-input.select>
                </x-input.group-vertical>
                <x-input.group-vertical label="Provinsi">
                    <x-input.select id="selectCity" data-placeholder="Select an option" data-allow-clear="true"></x-input.select>
                </x-input.group-vertical>
                <div class="mt-5">
                    @if($update)
                        <x-button.btn-base wire:click="updateLine">Update</x-button.btn-base>
                    @else
                        <x-button.btn-base wire:click="updateLine">Add</x-button.btn-base>
                    @endif
                </div>
            </div>
        </div>
    </x-card.standart>
    <!--begin::modal-->
    <x-modal.standart id="modalArea" size="lg" title="Form Area" wire:ignore.self>
        <!--begin::form -->
        <x-input.group-horizontal label="Kode" name="kode">
            <x-input.text wire:model.defer="kode" disabled />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Area" name="nama_area">
            <x-input.text wire:model.defer="nama_area" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan" />
        </x-input.group-horizontal>
        <!--end::form -->
        <x-slot:footer>
            <x-button.btn-base wire:click="store">Add Kota/Kabupaten</x-button.btn-base>
        </x-slot:footer>
    </x-modal.standart>
    <!--end::modal-->
    @push('scripts')
        <script>
            const modalsArea = new bootstrap.Modal(document.getElementById('modalArea'));

            window.livewire.on('modalAreaHide', function () {
                modalsArea.hide()
            })

            window.livewire.on('modalAreaShow', function (){
                modalsArea.show()
            })

            document.getElementById('modalArea').addEventListener('hidden.bs.modal', event => {
                Livewire.emit('resetForm')
                refreshDatatables()
            })

            let provinsi;

            $('#selectProvinsi').on('change', function (e) {
                provinsi = $('#selectProvinsi').select2("val");
            });

            $('#selectProvinsi').select2({
                ajax: {
                    url: '{{route('helper-area.province')}}',
                    type: 'post',
                    dataType: 'json',
                    data: function (params) {
                        // Query parameters will be ?search=[term]
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true
                }
            });

            $('#selectCity').select2({
                ajax: {
                    url: '{{route('helper-area.city')}}',
                    type: 'post',
                    dataType: 'json',
                    data: function (params) {
                        // Query parameters will be ?search=[term]
                        return {
                            search: params.term,
                            provinsi: provinsi,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true
                }
            });

        </script>
    @endpush
</div>
