@props(['$'=>[]])
<x-atoms.table>
    <x-slot name="head">
        <tr class="fw-semibold fs-6 text-gray-800">
            <th class="col-1">ID</th>
            <th class="col-3">Item</th>
            <th class="col-2">Harga</th>
            <th class="col-1">Jumlah</th>
            <th class="col-2">Diskon</th>
            <th class="col-2">Sub Total</th>
            <th class="col-1"></th>
        </tr>
    </x-slot>
    {{--    @forelse($dataDetail as $index => $row)--}}
    {{--        <tr class="align-middle">--}}
    {{--            <td class="text-center">1</td>--}}
    {{--            <td > </td>--}}
    {{--            <td ></td>--}}
    {{--            <td ></td>--}}
    {{--            <td ></td>--}}
    {{--            <td ></td>--}}
    {{--            <td ></td>--}}
    {{--            <td ></td>--}}
    {{--        </tr>--}}

    {{--    @empty--}}
    <tr>
        <x-table.td colspan="8" class="text-center">Tidak Ada Data</x-table.td>
    </tr>
    {{--    @endforelse--}}

    <x-slot name="footer">
        <tr>
            <td colspan="5" style="text-align: right">
                <strong>
                    Sub Total
                </strong>
            <td colspan="2" style="text-align: right">
                <strong>

                </strong>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right">Diskon</td>
            <td colspan="2" style="text-align: right">

            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right">Total Pajak</td>
            <td colspan="2" style="text-align: right">

            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right">
                <strong>
                    Total Bayar
                </strong>
            </td>
            <td colspan="2" style="text-align: right">
                <strong></strong>
            </td>
            <td></td>
        </tr>
    </x-slot>
</x-atoms.table>
