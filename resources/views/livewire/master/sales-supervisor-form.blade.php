<div>
    @if($errors->all())
        <x-alert.danger class="mt-5">
            <ul>
                @foreach($errors->all() as $messages)
                    <li>{{$messages}}</li>
                @endforeach
            </ul>
        </x-alert.danger>
    @endif
    <div class="row mt-5">
        <div class="col-8">
            <x-card.standart title="Form Sales">
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Supervisor">
                            <x-input.text wire:model.defer="pegawai_nama"/>
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-6">
                        <x-input.group-horizontal label="Area">
                            <x-input.text wire:model.defer="area_nama" />
                        </x-input.group-horizontal>
                    </div>
                </div>
                <table class="table table-striped border gx-7">
                    <thead>
                        <tr>
                            <th>Sales</th>
                            <th>Kota</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataDetail as $index=> $row)
                            <tr>{{$row['sales_name']}}</tr>
                            <tr>{{$row['kota_nama']}}</tr>
                            <tr>
                                <x-button.btn-link-table href="javscript:void(0)" wire:click="removeDetail({{$index}})"><i class="fa fa-trash"></i></x-button.btn-link-table>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <x-slot:footer>
                    <x-button.btn-base color="success">SIMPAN</x-button.btn-base>
                </x-slot:footer>
            </x-card.standart>
        </div>
        <div class="col-4">
            <x-card.standart>
                <x-input.group-horizontal label="Sales">
                    <x-input.text wire:model.defer="sales_name"/>
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Kota">
                    <x-input.text wire:model.defer="kota_nama"/>
                </x-input.group-horizontal>
                <x-slot:footer>
                    <x-button.btn-base wire:click="addDetail">Add Sales</x-button.btn-base>
                </x-slot:footer>
            </x-card.standart>
        </div>
    </div>
</div>
