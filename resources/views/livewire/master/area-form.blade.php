<div>
    <x-card.standart class="mt-5" title="Form Area">
        @if($errors->all())
            <x-alert.danger>
                <ul>
                    @foreach($errors->all() as $messages)
                        <li>{{$messages}}</li>
                    @endforeach
                </ul>
            </x-alert.danger>
        @endif
        <div class="row">
            <div>
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Area" name="nama_area">
                            <x-input.text wire:model.defer="nama_area"/>
                        </x-input.group-horizontal>
                        <x-input.group-horizontal label="Keterangan" name="keterangan">
                            <x-input.text wire:model.defer="keterangan" />
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-4">
                        <x-input.group-horizontal label="Provinsi" name="provinces_id" wire:ignore>
                            <x-input.select id="selectProvinsi" data-placeholder="Select an option" data-allow-clear="true"></x-input.select>
                        </x-input.group-horizontal>
                        <x-input.group-horizontal label="Kota" name="regencies_id" wire:ignore>
                            <x-input.select name="regencies_id" id="selectCity" data-placeholder="Select an option"></x-input.select>
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-2 mx-auto">
                        <x-button.btn-base class="btn-flex" wire:click="addLine">ADD</x-button.btn-base>
                    </div>
                </div>
                <!--begin::table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered gx-4">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th width="15%">Nomor</th>
                                <th width="30%">Provinsi</th>
                                <th width="30%">Kota/Kabupaten</th>
                                <th width="25"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataDetail as $index => $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row['provinces_name']}}</td>
                                    <td>{{$row['regencies_name']}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-light btn-active-light-primary" wire:click="removeLine({{$index}})">Delete</button>
                                    </td>
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
        </div>
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Store</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-card.standart>
    @push('scripts')
        <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
        <script>

            let provinsi;

            let selectProvinsi = $('#selectProvinsi')

            selectProvinsi.on('change', function (e) {
                provinsi = $('#selectProvinsi').select2("val");
            });

            document.addEventListener("livewire:load", () => {
                Livewire.hook('message.processed', (message, component) => {
                    citySelect2.init();
                    provinsiSelect2.init();
                });
            });

            let provinsiSelect2 = function (){
                let initSelect = function (){
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
                    })
                }

                return {
                    init: function (){
                        initSelect()
                    }
                }
            }()

            let citySelect2 = function (){
                let initSelect = function () {
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
                }

                return {
                    init: function (){
                        initSelect()
                    }
                }
            }()

            let city = $('#selectCity')

            city.on('change', function (e) {
                let regenciesId = $(this).data("#selectCity")
                //window.livewire.emit('setRegencies', e.target.value)
                @this.regencies_id = e.target.value
            })

            // On document ready
            KTUtil.onDOMContentLoaded(function () {
                citySelect2.init();
                provinsiSelect2.init();
            });

        </script>
    @endpush
</div>
