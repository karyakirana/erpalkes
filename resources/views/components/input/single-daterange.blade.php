@aware(['error', 'name'])
@props(['name'=>''])
<input type="text" {{$attributes->class(['form-control tanggalan', 'is-invalid'=>$errors->has($name)])->merge() }} readonly>
<x-input.error :messages="$errors->get($name)" />
@push('scripts')
    <script>
        $(".tanggalan").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: "DD-MMM-YYYY"
            }
        });
    </script>
@endpush
