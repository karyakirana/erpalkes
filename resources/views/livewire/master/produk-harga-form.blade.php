<div>
    <!--begin::Pricing-->
    <div class="card card-flush py-4 mt-5">
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
                <label class="required form-label">Base Price</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="" />
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the product price.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">Max Discount</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="" />
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the product price.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="fs-6 fw-semibold mb-2">Discount Type
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product"></i></label>
                <!--End::Label-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Option-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                            <!--begin::Radio-->
                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="discount_option" value="1" checked="checked" />
																				</span>
                            <!--end::Radio-->
                            <!--begin::Info-->
                            <span class="ms-5">
																					<span class="fs-4 fw-bold text-gray-800 d-block">No Discount</span>
																				</span>
                            <!--end::Info-->
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Option-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                            <!--begin::Radio-->
                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="discount_option" value="2" />
																				</span>
                            <!--end::Radio-->
                            <!--begin::Info-->
                            <span class="ms-5">
																					<span class="fs-4 fw-bold text-gray-800 d-block">Percentage %</span>
																				</span>
                            <!--end::Info-->
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Option-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                            <!--begin::Radio-->
                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="discount_option" value="3" />
																				</span>
                            <!--end::Radio-->
                            <!--begin::Info-->
                            <span class="ms-5">
																					<span class="fs-4 fw-bold text-gray-800 d-block">Fixed Price</span>
																				</span>
                            <!--end::Info-->
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                <!--begin::Label-->
                <label class="form-label">Set Discount Percentage</label>
                <!--end::Label-->
                <!--begin::Slider-->
                <div class="d-flex flex-column text-center mb-5">
                    <div class="d-flex align-items-start justify-content-center mb-7">
                        <span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
                        <span class="fw-bold fs-4 mt-1 ms-2">%</span>
                    </div>
                    <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                </div>
                <!--end::Slider-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set a percentage discount to be applied on this product.</div>
                <!--end::Description-->
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
            <!--end::Input group-->
            <div class="d-none mb-10 fv-row">
                <x-input.group-vertical label="Ma Discount">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
            <!--begin::Tax-->
            <div class="d-flex flex-wrap gap-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="required form-label">Tax Class</label>
                    <!--end::Label-->
                    <!--begin::Select2-->
                    <select class="form-select mb-2" name="tax" data-control="select2" data-hide-search="true" data-placeholder="Select an option">
                        <option></option>
                        <option value="0">Tax Free</option>
                        <option value="1">Taxable Goods</option>
                        <option value="2">Downloadable Product</option>
                    </select>
                    <!--end::Select2-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Set the product tax class.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label">VAT Amount (%)</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control mb-2" value="" />
                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Set the product VAT about.</div>
                    <!--end::Description-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end:Tax-->
        </div>
        <!--end::Card header-->
    </div>
    <!--end::Pricing-->
</div>
