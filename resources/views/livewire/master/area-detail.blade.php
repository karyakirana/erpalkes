<div>
    <x-modal.standart title="Detail Area {{$area->nama_area ?? ''}}" size="xl" id="modalAreaDetail">
        @if($area)
        <div>
            <table class="table align-middle table-striped table-row-bordered fs-6 gy-5 gs-7">
                <thead>
                    <tr>
                        <th>Provinsi</th>
                        <th>Kota</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($area->salesAreaDetail as $row)
                        <tr>
                            <td>{{$row->regencies->province->name}}</td>
                            <td>{{$row->regencies->name}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
            @endif
    </x-modal.standart>

    @push('scripts')
        <script>
            let modalDetail = new bootstrap.Modal(document.getElementById('modalAreaDetail'))
            document.getElementById('modalAreaDetail').addEventListener('hidden.bs.modal', function (event) {
                window.livewire.emit('resetForm')
            })
            window.livewire.on('modalAreaDetailShow', function () {
                modalDetail.show()
            })
        </script>
    @endpush
</div>
