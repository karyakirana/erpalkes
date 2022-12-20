<x-modal.standart id="modalPegawaiSet" size="xl" title="Data Pegawai">
    <livewire:datatable.pegawai-set-table />
</x-modal.standart>

@push('scripts')
    <script>
        let modalPegawaiSet = new bootstrap.Modal(document.getElementById('modalPegawaiSet'));

        window.livewire.on('modalPegawaiSetHide', function (){
            modalPegawaiSet.hide()
        })

        window.livewire.on('modalPegawaiSetShow', function (){
            modalPegawaiSet.show()
        })
    </script>
@endpush
