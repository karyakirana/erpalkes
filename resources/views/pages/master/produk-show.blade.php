<x-metronics-layout>
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Product</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Master</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>

                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Product</li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Detail</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Form-->
                    <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="/metronic8/demo1/../demo1/apps/ecommerce/catalog/products.html">
                        <!--begin::Aside column-->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

                            <!--begin::Thumbnail settings-->
{{--                            <livewire:master.produk-gambar-detail/>--}}

                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

                            <!--begin::Category & tags-->
{{--                            <livewire:master.produk-kategori-detail/>--}}


                                <!--begin::Category & tags-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Product Details</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <!--begin::Label-->
                                        <label class="form-label">Kategori</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2" data-control="select2" data-placeholder="Pilih Opsi" data-allow-clear="true" multiple="multiple">
                                            <option></option>
                                            <option value="Computers">Computers</option>
                                            <option value="Watches">Watches</option>
                                            <option value="Headphones">Headphones</option>
                                            <option value="Footwear">Footwear</option>
                                            <option value="Cameras">Cameras</option>
                                            <option value="Shirts">Shirts</option>
                                            <option value="Household">Household</option>
                                            <option value="Handbags">Handbags</option>
                                            <option value="Wines">Wines</option>
                                            <option value="Sandals">Sandals</option>
                                        </select>
                                        <!--end::Select2-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-7">Set kategori produk.</div>
                                        <!--end::Description-->
                                        <!--end::Input group-->
                                        <!--begin::Button-->
                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/add-category.html" class="btn btn-light-primary btn-sm mb-10">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                            <span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
															<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>
                                            <!--end::Svg Icon-->Tambah kategori</a>
                                        <!--end::Button-->

                                        <label class="form-label">Sub Kategori</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2" data-control="select2" data-placeholder="Pilih Opsi" data-allow-clear="true" multiple="multiple">
                                            <option></option>
                                            <option value="Computers">Computers</option>
                                            <option value="Watches">Watches</option>
                                            <option value="Headphones">Headphones</option>
                                            <option value="Footwear">Footwear</option>
                                            <option value="Cameras">Cameras</option>
                                            <option value="Shirts">Shirts</option>
                                            <option value="Household">Household</option>
                                            <option value="Handbags">Handbags</option>
                                            <option value="Wines">Wines</option>
                                            <option value="Sandals">Sandals</option>
                                        </select>
                                        <!--end::Select2-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-7">Set sub kategori produk.</div>
                                        <!--end::Description-->
                                        <!--end::Input group-->
                                        <!--begin::Button-->
                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/add-category.html" class="btn btn-light-primary btn-sm mb-10">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                            <span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
															<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>
                                            <!--end::Svg Icon-->Tambah sub kategori</a>
                                        <!--end::Button-->

                                    </div>
                                    <!--end::Card body-->
                                </div>


                                <!--begin::Status-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Status</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                        </div>
                                        <!--begin::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                            <option></option>
                                            <option value="published" selected="selected">Published</option>
                                            <option value="draft">Draft</option>
                                            <option value="scheduled">Scheduled</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <!--end::Select2-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set status produk.</div>
                                        <!--end::Description-->
                                        <!--begin::Datepicker-->
                                        <div class="d-none mt-10">
                                            <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
                                            <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date & time" />
                                        </div>
                                        <!--end::Datepicker-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Status-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Kemasan Produk</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <!--begin::Label-->
                                        <label class="form-label">Kemasan</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select mb-2" data-control="select2" data-placeholder="Pilih Opsi" data-allow-clear="true" multiple="multiple">
                                            <option></option>
                                            <option value="Computers">Computers</option>
                                            <option value="Watches">Watches</option>
                                            <option value="Headphones">Headphones</option>
                                            <option value="Footwear">Footwear</option>
                                            <option value="Cameras">Cameras</option>
                                            <option value="Shirts">Shirts</option>
                                            <option value="Household">Household</option>
                                            <option value="Handbags">Handbags</option>
                                            <option value="Wines">Wines</option>
                                            <option value="Sandals">Sandals</option>
                                        </select>
                                        <!--end::Select2-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-7">Set kemasan produk.</div>
                                        <!--end::Description-->
                                        <!--end::Input group-->
                                        <!--begin::Button-->
                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/add-category.html" class="btn btn-light-primary btn-sm mb-10">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                            <span class="svg-icon svg-icon-2">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
															<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
														</svg>
													</span>
                                            <!--end::Svg Icon-->Tambah kemasan</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Aside column-->

                        <!--begin::Main column-->
{{--                        <livewire:master.produk-form-detail/>--}}

                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
                                </li>
                                <!--end:::Tab item-->
                                {{--            <!--begin:::Tab item-->--}}
                                {{--            <li class="nav-item">--}}
                                {{--                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_reviews">Reviews</a>--}}
                                {{--            </li>--}}
                                {{--            <!--end:::Tab item-->--}}
                            </ul>
                            <!--end:::Tabs-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::General options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>General</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <x-input.group-vertical label="Nama" name="nama_produk">
                                                        <x-input.text wire:model.defer="nama_produk"/>
                                                    </x-input.group-vertical>
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set nama produk.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <div class="row">
                                                    <div class="col-6 mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <x-input.group-vertical label="Satuan Beli" name="satuan_beli">
                                                            <x-input.text wire:model.defer="satuan_beli"/>
                                                        </x-input.group-vertical>
                                                        <!--end::Input-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set satuan beli.</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="col-6 mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <x-input.group-vertical label="Satuan Jual" name="satuan_jual">
                                                            <x-input.text wire:model.defer="satuan_jual"/>
                                                        </x-input.group-vertical>
                                                        <!--end::Input-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set satuan jual.</div>
                                                        <!--end::Description-->
                                                    </div>
                                                </div>
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <x-input.group-vertical label="Merk" name="merk">
                                                        <x-input.text wire:model.defer="merk"/>
                                                    </x-input.group-vertical>
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set merk produk.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <x-input.group-vertical label="Tipe" name="tipe">
                                                        <x-input.text wire:model.defer="tipe"/>
                                                    </x-input.group-vertical>
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set tipe produk.</div>
                                                    <!--end::Description-->
                                                </div>

                                                <div>
                                                    <!--begin::Label-->
                                                    <x-input.group-vertical label="Deskripsi" name="keterangan">
                                                        <x-input.text wire:model.defer="keterangan"/>
                                                    </x-input.group-vertical>
                                                    <!--end::Editor-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set deskripsi produk.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::General options-->
                                        <!--begin::Media-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Media</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-2">
                                                    <!--begin::Dropzone-->
                                                    <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                        <!--begin::Message-->
                                                        <div class="dz-message needsclick">
                                                            <!--begin::Icon-->
                                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                            <!--end::Icon-->
                                                            <!--begin::Info-->
                                                            <div class="ms-4">
                                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Seret file atau klik untuk upload.</h3>
                                                                <span class="fs-7 fw-semibold text-gray-400">Upload sampai 10 file</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                    </div>
                                                    <!--end::Dropzone-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">Set gambar..</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Media-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Pricing</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <x-input.group-vertical label="Harga" name="harga">
                                                        <x-input.text wire:model.defer="harga"/>
                                                    </x-input.group-vertical>
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set harga produk.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row">
                                                    <div class="col-6 mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <x-input.group-vertical label="Minimum Stock" name="minimum_stock">
                                                            <x-input.text wire:model.defer="minimum_stock"/>
                                                        </x-input.group-vertical>
                                                        <!--end::Input-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set minimum stock.</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="col-6 mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <x-input.group-vertical label="Buffer Stock" name="buffer_stock">
                                                            <x-input.text wire:model.defer="buffer_stock"/>
                                                        </x-input.group-vertical>
                                                        <!--end::Input-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set buffer stock.</div>
                                                        <!--end::Description-->
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->

                                                <!--end::Input group-->
                                                <div class="row">
                                                    <!--begin::Input group-->
                                                    <div class="col-6 mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                                        <!--begin::Label-->
                                                        <!--end::Label-->
                                                        <x-input.group-vertical label="Persentase Diskon" name="diskon">
                                                            <div class="input-group">
                                                                <x-input.text wire:model.defer="diskon" />
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </x-input.group-vertical>
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7">Set persentase diskon.</div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <div class="col-6 mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                                        <!--begin::Label-->
                                                        <!--end::Label-->
                                                        <x-input.group-vertical label="Harga Diskon" name="harga">
                                                            <div class="input-group">
                                                                <span class="input-group-text">Rp.</span>
                                                                <x-input.text wire:model.defer="harga" />
                                                            </div>
                                                        </x-input.group-vertical>
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7"></div>
                                                        <!--end::Description-->
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Fixed Discounted Price</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="dicsounted_price" class="form-control mb-2" placeholder="Discounted price" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the discounted product price. The product will be reduced at the determined fixed price</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end:Tax-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Pricing-->
                                        <!--end::Tab pane-->
                                        <!--begin::Tab pane-->
                                        <!--end::Tab pane-->

                                        <!--end::Tab content-->
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                                <span class="indicator-label">Save Changes</span>
                                                <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--end::Main column-->
                                </div>
                            </div>
                        </div>


                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

    </div>
    <!--end:::Main-->
</x-metronics-layout>
