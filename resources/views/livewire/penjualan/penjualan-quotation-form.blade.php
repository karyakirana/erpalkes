<div>
    <div class="d-flex flex-column flex-lg-row mt-5">
        <!-- begin::content -->
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <x-card.standart>
                <div class="d-flex flex-column align-items-start flex-xxl-row">
                    <!--begin::Input group-->
                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice date">
                        <!--begin::Date-->
                        <div class="fs-6 fw-bold text-gray-700 text-nowrap">Date:</div>
                        <!--end::Date-->
                        <!--begin::Input-->
                        <div class="position-relative d-flex align-items-center w-150px">
                            <!--begin::Datepicker-->
                            <input class="form-control form-control-transparent fw-bold pe-5" placeholder="Select date" name="invoice_date" />
                            <!--end::Datepicker-->
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
                        <span class="fs-2x fw-bold text-gray-800">Quotation #</span>
                        <input type="text" class="form-control form-control-flush fw-bold text-muted fs-3 w-125px" value="2021001" placehoder="..." />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice due date">
                        <!--begin::Date-->
                        <div class="fs-6 fw-bold text-gray-700 text-nowrap">Due Date:</div>
                        <!--end::Date-->
                        <!--begin::Input-->
                        <div class="position-relative d-flex align-items-center w-150px">
                            <!--begin::Datepicker-->
                            <input class="form-control form-control-transparent fw-bold pe-5" placeholder="Select date" name="invoice_due_date" />
                            <!--end::Datepicker-->
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-2 position-absolute end-0 ms-4">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--begin::Separator-->
                <div class="separator separator-dashed my-10"></div>
                <!--end::Separator-->
                <div class="mb-0">
                    <!--begin::Row-->
                    <div class="row gx-10 mb-5">
                        <div class="col-md-6">
                            <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Bill From</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Sales" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Sales Phone" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Who is this invoice from?"></textarea>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Bill To</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Customer" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" placeholder="Instansi" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Alamat"></textarea>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--begin::Row-->
                    <!--begin::Table wrapper-->
                    <div class="table-responsive mb-10">
                        <!--begin::Table-->
                        <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700" data-kt-element="items">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                <th class="min-w-300px w-475px">Item</th>
                                <th class="min-w-100px w-100px">QTY</th>
                                <th class="min-w-150px w-150px">Price</th>
                                <th class="min-w-100px w-150px text-end">Total</th>
                                <th class="min-w-75px w-75px text-end">Action</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                <td class="pe-7">
                                    <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" />
                                    <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Discount" />
                                </td>
                                <td class="ps-0">
                                    <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" value="1" data-kt-element="quantity" />
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" value="0.00" data-kt-element="price" />
                                </td>
                                <td class="pt-8 text-end text-nowrap">$
                                    <span data-kt-element="total">0.00</span></td>
                                <td class="pt-5 text-end">
                                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                            <!--end::Table body-->
                            <!--begin::Table foot-->
                            <tfoot>
                            <tr class="border-top border-top-dashed align-top fs-6 fw-bold text-gray-700">
                                <th class="text-primary">
                                    <button class="btn btn-link py-1" data-kt-element="add-item">Add item</button>
                                </th>
                                <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="fs-5">Subtotal</div>
                                        <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Coming soon">Add tax</button>
                                        <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Coming soon">Add discount</button>
                                    </div>
                                </th>
                                <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                                    <span data-kt-element="sub-total">0.00</span></th>
                            </tr>
                            <tr class="align-top fw-bold text-gray-700">
                                <th></th>
                                <th colspan="2" class="fs-4 ps-0">Total</th>
                                <th colspan="2" class="text-end fs-4 text-nowrap">$
                                    <span data-kt-element="grand-total">0.00</span></th>
                            </tr>
                            </tfoot>
                            <!--end::Table foot-->
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </x-card.standart>
        </div>
        <!-- end::content -->
        <!-- begin::sidebar -->
        <div class="flex-lg-auto min-w-lg-300px">
        </div>
        <!-- end::sidebar -->
    </div>
    <div class="row g-5 mt-5">
        <div class="col-lg-8">
            <x-card.card-1 title="Form Quotation" class="mt-5">
                <x-slot:toolbar>
                    <h4>{{$kode}}</h4>
                </x-slot:toolbar>
                <div class="row ">
                    <div class="col-4">
                        <x-input.group-vertical label="Customer" name="customer_id">
                            <x-input.text wire:model.defer="customer_id" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-4">
                        <x-input.group-vertical label="Tanggal" name="tgl_quotation">
                            <x-input.text wire:model.defer="tgl_quotation" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-4">
                        <x-input.group-vertical label="Sales" name="sales_id">
                            <x-input.text wire:model.defer="sales_id" />
                        </x-input.group-vertical>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <x-input.group-vertical label="Alamat" name="alamat">
                            <x-input.text wire:model.defer="alamat"/>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-8">
                        <x-input.group-vertical label="Keterangan" name="keterangan">
                            <x-input.text wire:model.defer="keterangan"/>
                        </x-input.group-vertical>
                    </div>
                </div>
            </x-card.card-1>


            <x-card.card-2 title="Detail Item">
                <x-forms.quotation-table-form/>
                <x-slot:footer></x-slot:footer>
            </x-card.card-2>
        </div>


        <div class="col-lg-4">
            <x-card.card-3 title="Tambah Produk" class="mt-5" data-kt-sticky="true" data-kt-sticky-name="quotation" data-kt-sticky-offset="{default: false, lg: '100px'}" data-kt-sticky-width="{lg: '300px', lg: '410px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px"  data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                <div class="row">
                    <x-input.group-vertical label="Produk" name="produk_id">
                        <x-input.text wire:model.defer="produk_id" />
                    </x-input.group-vertical>
                    <div class="col-5">
                        <x-input.group-vertical label="Jumlah" name="jumlah">
                            <x-input.text wire:model.defer="jumlah" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-7">
                        <x-input.group-vertical label="Harga" name="harga">
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <x-input.text wire:model.defer="harga" />
                            </div>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-5">
                        <x-input.group-vertical label="Diskon" name="diskon">
                            <div class="input-group">
                                <x-input.text wire:model.defer="diskon" />
                                <span class="input-group-text">%</span>
                            </div>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-7">
                        <x-input.group-vertical label="Harga Diskon" name="harga">
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <x-input.text wire:model.defer="harga" />
                            </div>
                        </x-input.group-vertical>
                    </div>
                    <x-input.group-vertical label="Sub Total" name="sub_total">
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <x-input.text wire:model.defer="sub_total" />
                        </div>
                    </x-input.group-vertical>
                    <div class="text-center pb-4 pt-5">
                        <x-button.btn-modal color="info" target="#">Add Produk</x-button.btn-modal>
                        @if($update)
                            <x-button.btn-base wire:click="update">Update</x-button.btn-base>
                        @else
                            <x-button.btn-base wire:click="store">Save All</x-button.btn-base>
                        @endif
                    </div>
                </div>
    {{--            <x-slot:footer>--}}

    {{--            </x-slot:footer>--}}
            </x-card.card-3>
        </div>

    </div>
</div>
