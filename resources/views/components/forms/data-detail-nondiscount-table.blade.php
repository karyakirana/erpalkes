@props([
    'dataDetail' => [],
    'btnEdit' => '',
    'btnDelete' => ''
    ])
<div class="table-responsive">
    <table class="table table-row-bordered">
        <thead>
        <tr class="fw-bold fs-6 text-gray-800">
            <th width="50%">Deskripsi</th>
            <th width="20%">Jumlah</th>
            <th width="20%">Sub Total</th>
            <th width="10%"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($dataDetail as $index => $row)
            <tr>
                <td>
                    {{$row['produk_nama']}}
                    @if($row['tgl_expired'])
                        <br> {{$row['tgl_expired']}}
                    @endif
                    <br> {{$row->harga}}
                    @if($row['diskon'])
                        <br>Disc. {{$row['diskon']}}
                    @endif
                </td>
                <td>
                    {{$row['jumlah']}}
                </td>
                <td>
                    {{$row['sub_total']}}
                </td>
                <td>
                    {{$index}}
                    <x-button.btn-icon-edit wire:click="$emit({{$btnEdit}}, {{$index}})" />
                    <x-button.btn-icon-delete wire:click="$emit({{$btnDelete}}, {{$index}})" />
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="5">Tidak Ada Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
