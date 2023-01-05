<div>
    <x-card.standart class="mt-5">

        <div class="row">
            <div class="col-8">
                <x-input.group-horizontal label="Pegawai" name="pegawai_nama">
                    <x-input.text wire:model.defer="pegawai_kode" data-bs-toggle="modal" data-bs-target="#modalPegawai" readonly />
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Nama" name="name">
                    <x-input.text wire:model.defer="name" />
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Username" name="username">
                    <x-input.text wire:model.defer="username"/>
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Email" name="email">
                    <x-input.text wire:model.defer="email"/>
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Password" name="password">
                    <x-input.text type="password" wire:model="password"/>
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Password Confirmation" name="password_confirmation">
                    <x-input.text type="password" wire:model.defer="password_confirmation"/>
                </x-input.group-horizontal>
                <x-button.btn-base wire:click="store">Store</x-button.btn-base>
            </div>
        </div>
    </x-card.standart>
    <x-modal.standart id="modalPegawai" wire:ignore.self>
        <livewire:datatables.pegawai-set-user-table />
    </x-modal.standart>
    @push('scripts')
        <script>
            let modalPegawai = new bootstrap.Modal(document.getElementById('modalPegawai'));

            window.livewire.on('modalPegawaiHide', function (){
                modalPegawai.hide();
            })
        </script>
    @endpush
</div>
