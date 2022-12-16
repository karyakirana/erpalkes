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
                            <livewire:master.produk-kategori-detail/>
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
                                            <!--end::Svg Icon-->Tambah kategori</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Aside column-->

                        <!--begin::Main column-->
                        <livewire:master.produk-form-detail/>

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
