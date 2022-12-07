<x-metronics-layout>
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
            {{-- customer details - aka sidebar --}}
            <livewire:master.customer-detail-sidebar :customer_id="$customer_id" />
        </div>
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">Overview</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab">Events & Logs</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Statements</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item ms-auto">
                    <!--begin::Action menu-->
                    <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-2 me-0">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
														</svg>
													</span>
                        <!--end::Svg Icon--></a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Create invoice</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link flex-stack px-5">Create payments
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title">Subscription</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-5">Apps</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-5">Billing</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-5">Statements</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3">
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="" name="notifications" checked="checked" id="kt_user_menu_notifications" />
                                            <span class="form-check-label text-muted fs-6" for="kt_user_menu_notifications">Notifications</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-3"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Reports</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                            <a href="#" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link text-danger px-5">Delete customer</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu-->
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Payment Records</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
																		<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
																		<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
																	</svg>
																</span>
                                    <!--end::Svg Icon-->Add payment</button>
                                <!--end::Filter-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                <!--begin::Table head-->
                                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                <!--begin::Table row-->
                                <tr class="text-start text-muted text-uppercase gs-0">
                                    <th class="min-w-100px">Invoice No.</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th class="min-w-100px">Date</th>
                                    <th class="text-end min-w-100px pe-4">Actions</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Invoice=-->
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1">8990-6556</a>
                                    </td>
                                    <!--end::Invoice=-->
                                    <!--begin::Status=-->
                                    <td>
                                        <span class="badge badge-light-warning">Pending</span>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Amount=-->
                                    <td>$8,700.00</td>
                                    <!--end::Amount=-->
                                    <!--begin::Date=-->
                                    <td>01 Sep 2020, 4:58 pm</td>
                                    <!--end::Date=-->
                                    <!--begin::Action=-->
                                    <td class="pe-0 text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																				</svg>
																			</span>
                                            <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/customers/view.html" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bold">Credit Balance</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_adjust_balance">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
																		<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
																	</svg>
																</span>
                                    <!--end::Svg Icon-->Adjust Balance</a>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="fw-bold fs-2">$32,487.57
                                <span class="text-muted fs-4 fw-semibold">USD</span>
                                <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on the customer's next invoice.</div></div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-2 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Invoices</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar m-0">
                                <!--begin::Tab nav-->
                                <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_year_tab" class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_1">This Year</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_2">2020</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_3">2019</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_2017_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_4">2018</a>
                                    </li>
                                </ul>
                                <!--end::Tab nav-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Tab Content-->
                            <div id="kt_referred_users_tab_content" class="tab-content">
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-muted gs-0">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                            </td>
                                            <td class="text-danger">$-0.80</td>
                                            <td>
                                                <span class="badge badge-light-warning">Pending</span>
                                            </td>
                                            <td>Jan 04, 2020</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_2" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_2" class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-muted gs-0">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                            </td>
                                            <td class="text-success">$5.00</td>
                                            <td>
                                                <span class="badge badge-light-warning">Pending</span>
                                            </td>
                                            <td>Sep 15, 2020</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_3" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_3" class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-muted gs-0">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                            </td>
                                            <td class="text-success">$204.00</td>
                                            <td>
                                                <span class="badge badge-light-warning">Pending</span>
                                            </td>
                                            <td>Apr 22, 2020</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_4" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_4" class="table align-middle table-row-dashed fs-6 fw-bold gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bold">
                                        <tr class="text-start text-muted gs-0">
                                            <th class="min-w-100px">Order ID</th>
                                            <th class="min-w-100px">Amount</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-125px">Date</th>
                                            <th class="min-w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                            </td>
                                            <td class="text-success">$76.00</td>
                                            <td>
                                                <span class="badge badge-light-success">Approved</span>
                                            </td>
                                            <td>Oct 08, 2020</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Logs</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-sm btn-light-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor" />
																		<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor" />
																		<path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor" />
																	</svg>
																</span>
                                    <!--end::Svg Icon-->Download Report</button>
                                <!--end::Button-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-0">
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Badge=-->
                                        <td class="min-w-70px">
                                            <div class="badge badge-light-success">200 OK</div>
                                        </td>
                                        <!--end::Badge=-->
                                        <!--begin::Status=-->
                                        <td>POST /v1/invoices/in_3666_7802/payment</td>
                                        <!--end::Status=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-end min-w-200px">15 Apr 2022, 10:10 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Events</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-sm btn-light-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
                                    <span class="svg-icon svg-icon-3">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor" />
																		<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor" />
																		<path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor" />
																	</svg>
																</span>
                                    <!--end::Svg Icon-->Download Report</button>
                                <!--end::Button-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-5" id="kt_table_customers_events">
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Event=-->
                                    <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#LOP-45640</a>has been
                                        <span class="badge badge-light-danger">Declined</span></td>
                                    <!--end::Event=-->
                                    <!--begin::Timestamp=-->
                                    <td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2022, 6:43 am</td>
                                    <!--end::Timestamp=-->
                                </tr>
                                <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                    <!--begin::Earnings-->
                    <div class="card mb-6 mb-xl-9">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <div class="card-title">
                                <h2>Earnings</h2>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0">
                            <div class="fs-5 fw-semibold text-gray-500 mb-4">Last 30 day earnings calculated. Apart from arranging the order of topics.</div>
                            <!--begin::Left Section-->
                            <div class="d-flex flex-wrap flex-stack mb-5">
                                <!--begin::Row-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Col-->
                                    <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
																		<span class="fs-1 fw-bold text-gray-800 lh-1">
																			<span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">0</span>
                                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																			<span class="svg-icon svg-icon-1 svg-icon-success">
																				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
																					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
																				</svg>
																			</span>
                                                                            <!--end::Svg Icon-->
																		</span>
                                        <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Net Earnings</span>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
																		<span class="fs-1 fw-bold text-gray-800 lh-1">
																		<span class="" data-kt-countup="true" data-kt-countup-value="16">0</span>%
                                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
																		<span class="svg-icon svg-icon-1 svg-icon-danger">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
																				<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
																			</svg>
																		</span>
                                                                            <!--end::Svg Icon--></span>
                                        <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Change</span>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
																		<span class="fs-1 fw-bold text-gray-800 lh-1">
																			<span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$">0</span>
																			<span class="text-primary">--</span>
																		</span>
                                        <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Fees</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw Earnings</a>
                            </div>
                            <!--end::Left Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Earnings-->
                    <!--begin::Statements-->
                    <div class="card mb-6 mb-xl-9">
                        <!--begin::Header-->
                        <div class="card-header">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h2>Statement</h2>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Tab nav-->
                                <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_1">This Year</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_2">2020</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_3">2019</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_4">2018</a>
                                    </li>
                                </ul>
                                <!--end::Tab nav-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body pb-5">
                            <!--begin::Tab Content-->
                            <div id="kt_customer_view_statement_tab_content" class="tab-content">
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-125px">Date</th>
                                            <th class="w-100px">Order ID</th>
                                            <th class="w-300px">Details</th>
                                            <th class="w-100px">Amount</th>
                                            <th class="w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        <tr>
                                            <td>Jan 04, 2021</td>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                            </td>
                                            <td>Seller Fee</td>
                                            <td class="text-danger">$-0.80</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_2" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_2" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-125px">Date</th>
                                            <th class="w-100px">Order ID</th>
                                            <th class="w-300px">Details</th>
                                            <th class="w-100px">Amount</th>
                                            <th class="w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        <tr>
                                            <td>Sep 15, 2020</td>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                            </td>
                                            <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                            <td class="text-success">$5.00</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_3" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_3" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-125px">Date</th>
                                            <th class="w-100px">Order ID</th>
                                            <th class="w-300px">Details</th>
                                            <th class="w-100px">Amount</th>
                                            <th class="w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        <tr>
                                            <td>Apr 22, 2019</td>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                            </td>
                                            <td>Parcel Shipping / Delivery Service App</td>
                                            <td class="text-success">$204.00</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_4" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_4" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-125px">Date</th>
                                            <th class="w-100px">Order ID</th>
                                            <th class="w-300px">Details</th>
                                            <th class="w-100px">Amount</th>
                                            <th class="w-100px text-end pe-7">Invoice</th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                        <tr>
                                            <td>Apr 22, 2019</td>
                                            <td>
                                                <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                            </td>
                                            <td>Parcel Shipping / Delivery Service App</td>
                                            <td class="text-success">$204.00</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Statements-->
                </div>
                <!--end:::Tab pane-->
            </div>
            <!--end:::Tab content-->
        </div>
    </div>
</x-metronics-layout>
