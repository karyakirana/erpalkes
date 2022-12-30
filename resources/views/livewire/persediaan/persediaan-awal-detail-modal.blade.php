<div>
    <x-modal.standart title="Persediaan Awal : {{$kode ?? ''}}" id="persediaanAwalDetailModal" wire:ignore.self>
        <div class="row">
            <div class="col-6">
                <x-input.group-horizontal label="Tanggal">
                    <x-input.plaintext>{{$tgl_persediaan_awal}}</x-input.plaintext>
                </x-input.group-horizontal>
            </div>
            <div class="col-6">
                <x-input.group-horizontal label="Kondisi">
                    <x-input.plaintext>{{$kondisi}}</x-input.plaintext>
                </x-input.group-horizontal>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <x-input.group-horizontal label="Gudang">
                    <x-input.plaintext>{{$gudang_nama}}</x-input.plaintext>
                </x-input.group-horizontal>
            </div>
            <div class="col-6">
                <x-input.group-horizontal label="Pembuat">
                    <x-input.plaintext>{{$user_nama}}</x-input.plaintext>
                </x-input.group-horizontal>
            </div>
        </div>
        <div class="row">
            <x-input.group-horizontal label="Keterangan">
                <x-input.plaintext>{{$keterangan}}</x-input.plaintext>
            </x-input.group-horizontal>
        </div>
        <x-atoms.table class="border">
            <x-slot:head>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                </tr>
            </x-slot:head>
            @forelse($dataDetail as $row)
                <tr>
                    <x-table.td align="start">
                        {{$row['produk_nama']}}
                    </x-table.td>
                    <x-table.td align="end">
                        {{$row['harga']}}
                    </x-table.td>
                    <x-table.td>
                        {{$row['jumlah']}}
                    </x-table.td>
                    <x-table.td align="end">
                        {{rupiah_format($row['sub_total'])}}
                    </x-table.td>
                </tr>
            @empty
                <tr>
                    <x-table.td colspan="4" align="center">Tidak Ada Data</x-table.td>
                </tr>
            @endforelse
            <x-slot:footer>
                <tr>
                    <x-table.td colspan="3">Total</x-table.td>
                    <x-table.td align="end">{{rupiah_format($total_nominal)}}</x-table.td>
                </tr>
            </x-slot:footer>
        </x-atoms.table>
    </x-modal.standart>
    @push('scripts')
        <script>
            let detailModal = new bootstrap.Modal(document.getElementById('persediaanAwalDetailModal'));

            window.livewire.on('detailModalHide', function () {
                detailModal.hide()
            })

            window.livewire.on('detailModalShow', function () {
                detailModal.show()
            })

            document.getElementById('persediaanAwalDetailModal').addEventListener('hidden.bs.modal', function ($event) {
                window.livewire.emit('resetForm')
            })
        </script>
    @endpush
</div>
