<div>
    <x-card.standart title="Form Customer" class="mt-5">
        <x-slot:toolbar>
            <h4>{{$kode}}</h4>
        </x-slot:toolbar>
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
            <div class="col-6">
                <x-input.group-vertical label="Nama" name="nama_customer">
                    <x-input.text wire:model.defer="nama_customer"/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Jenis Instansi" name="jenis_instansi">
                    <x-input.select wire:model.defer="jenis_instansi">
                        <option>Dipilih</option>
                        <option value="Non Pemerintah">Non Pemerintah</option>
                        <option value="Pemerintah">Pemerintah</option>
                    </x-input.select>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Area" name="area_id" wire:ignore>
                    <x-input.select id="areaSelect2" data-placeholder="Pilih Area" wire:model.defer="area_id" />
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <x-input.group-vertical label="Alamat" name="alamat">
                    <x-input.text wire:model.defer="alamat"/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Telepon" name="alamat">
                    <x-input.text wire:model.defer="telepon" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Email" name="email">
                    <x-input.text wire:model.defer="email"/>
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <x-input.group-vertical label="NPWP" name="npwp">
                    <x-input.text wire:model.defer="npwp"/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Diskon" name="diskon">
                    <x-input.text wire:model.defer="diskon" />
                </x-input.group-vertical>
            </div>
            <div class="col-6">
                <x-input.group-vertical label="Keterangan" name="keterangan">
                    <x-input.text wire:model.defer="keterangan" />
                </x-input.group-vertical>
            </div>
        </div>
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-card.standart>
    @push('scripts')
        <script>
            let areaSelect2 = function () {

                let initSelect = function () {
                    $('#areaSelect2').select2({
                        ajax: {
                            url: '{{route('helper-area.salesarea')}}',
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
                    init: function () {
                        initSelect()
                    }
                }
            }()

            let area = $('#areaSelect2');

            area.on('change', function (e) {
                let areaId = $(this).data('$areaSelect2');
                @this.area_id = e.target.value;
            })

            // On document ready
            KTUtil.onDOMContentLoaded(function () {
                areaSelect2.init();
            });

            document.addEventListener("livewire:load", () => {
                Livewire.hook('message.processed', (message, component) => {
                    areaSelect2.init();
                });
            });
        </script>
    @endpush
</div>
