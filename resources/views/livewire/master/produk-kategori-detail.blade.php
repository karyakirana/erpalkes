<div>
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
            <label class="form-label">Categories</label>
            <!--end::Label-->
            <!--begin::Select2-->
            <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
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
            <div class="text-muted fs-7 mb-7">Add product to a category.</div>
            <!--end::Description-->
            <!--end::Input group-->
            <!--begin::Button-->
            <a href="{{route('produk-kategori')}}" class="btn btn-light-primary btn-sm mb-10">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                <span class="svg-icon svg-icon-2">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
							<rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
					</svg>
				</span>
                <!--end::Svg Icon-->Create new category</a>
            <!--end::Button-->
        </div>
        <!--end::Card body-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Input group-->
            <!--begin::Label-->
            <label class="form-label">Sub Categories</label>
            <!--end::Label-->
            <!--begin::Select2-->
            <select class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
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
            <div class="text-muted fs-7 mb-7">Add product to a sub category.</div>
            <!--end::Description-->
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Category & tags-->
</div>
