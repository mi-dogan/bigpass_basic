@extends('back.layouts.master')
@section('title','Pozisyon Yönetimi')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        @if(auth()->user()->company_id == "0")
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 col-12">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Cihazlar</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                       data-bs-target="#kt_modal_create_device">Cihaz ekle</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @error('warning')
                <div class="alert alert-danger d-flex align-items-center p-5 mb-5">
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                              d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                              fill="currentColor"></path>
                        <path
                            d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-danger">Hata Oluştu..!</h4>
                        <span>{{$message}}</span>
                    </div>
                </div>
                @enderror
                <div class="card card card-flush">
                    <div class="card-header align-items-center d-flex align-items-center">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
								    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                          transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
								    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"></path>
								</svg>
							</span>
                                <input type="text" data-kt-filter="search"
                                       class="form-control form-control-sm form-control-solid md-w-250px w-200px ps-14"
                                       placeholder="Ara.."/>
                            </div>
                            <div id="kt_datatable_example_1_export" class="d-none"></div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5 d-none d-md-grid">
                            <button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                   fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" width="12" height="2" rx="1"
                                          transform="matrix(0 -1 -1 0 12.75 19.75)" fill="currentColor"></rect>
                                    <path
                                        d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.3"
                                          d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z"
                                          fill="currentColor"></path>
                                </svg>
                            </span>
                                Dışa aktar
                            </button>
                            <div id="kt_datatable_example_export_menu"
                                 class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                 data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="copy">
                                        Panoya Kopyala
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="excel">
                                        Excel olarak dışa aktarma
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="csv">
                                        CSV olarak dışa aktarma
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                        PDF olarak dışa aktarma
                                    </a>
                                </div>
                            </div>
                            <div id="kt_datatable_example_buttons" class="d-none"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table
                            class="table table-striped border rounded table-row-dashed fs-6  px-0 mx-0 overflow-x-scroll"
                            id="kt_datatable_example">
                            <thead class="py-12 px-2">
                            <tr class="text-gray-700 fw-bold text-uppercase bg-light w-100 px-0 mx-0">
                                <th class="text-start px-md-12 px-6 w-25">Cihaz Id</th>
                                <th class="text-end px-md-12 px-6 w-25">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach ($devices as $device)
                                <tr>
                                    <td class="text-start px-md-12 px-6 py-6">
                                        {{ str()->limit($device->device_id,50) }}
                                    </td>
                                    <td class="text-end px-md-12 px-6 py-4">
                                        <div class="text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <a href="{{route("randomQrShow", $device->device_code)}}"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
								                <span class="svg-icon svg-icon-3">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 488 488" xml:space="preserve" fill="currentColor">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier"> <g>
                                                                <path style="fill:#0A3249;" d="M117.6,1.6H4c-2.4,0-4,1.6-4,4V120c0,1.6,1.6,4,4,4h114.4c2.4,0,4-1.6,4-4V5.6 C121.6,3.2,120,1.6,117.6,1.6z M30.4,92.8v-60h60v60H30.4z"></path>
                                                                <path style="fill:#0A3249;" d="M71.2,48.8h-20c-2.4,0-4,1.6-4,4v20c0,2.4,1.6,4,4,4h20c2.4,0,4-1.6,4-4v-20 C74.4,50.4,72.8,48.8,71.2,48.8z"></path>
                                                                <path style="fill:#0A3249;" d="M482.4,1.6H368c-2.4,0-4,1.6-4,4V120c0,2.4,1.6,4,4,4h114.4c2.4,0,4-1.6,4-4V5.6 C485.6,3.2,484,1.6,482.4,1.6z M394.4,92.8v-60h60v60H394.4z"></path>
                                                                <path style="fill:#0A3249;" d="M435.2,48.8h-20c-2.4,0-4,1.6-4,4v20c0,2.4,1.6,4,4,4h20c2.4,0,4-1.6,4-4v-20 C438.4,50.4,436.8,48.8,435.2,48.8z"></path>
                                                                <path style="fill:#0A3249;" d="M117.6,364H4c-2.4,0-4,1.6-4,4v114.4c0,2.4,1.6,4,4,4h114.4c2.4,0,4-1.6,4-4V368 C121.6,366.4,120,364,117.6,364z M30.4,455.2v-60h60v60H30.4z"></path>
                                                                <path style="fill:#0A3249;" d="M71.2,411.2h-20c-2.4,0-4,1.6-4,4v20c0,2.4,1.6,4,4,4h20c2.4,0,4-1.6,4-4v-20 C74.4,412.8,72.8,411.2,71.2,411.2z"></path>
                                                                <path style="fill:#0A3249;" d="M482.4,364H368c-2.4,0-4,1.6-4,4v114.4c0,2.4,1.6,4,4,4h114.4c2.4,0,4-1.6,4-4V368 C485.6,366.4,484,364,482.4,364z M394.4,455.2v-60h60v60H394.4z"></path>
                                                                <path style="fill:#0A3249;" d="M435.2,411.2h-20c-2.4,0-4,1.6-4,4v20c0,2.4,1.6,4,4,4h20c2.4,0,4-1.6,4-4v-20 C438.4,412.8,436.8,411.2,435.2,411.2z"></path>
                                                            </g>
                                                            <g>
                                                                <rect x="2.4" y="309.6" style="fill:#0B3249;" width="155.2" height="22.4"></rect>
                                                                <polygon style="fill:#0B3249;" points="272,487.2 240.8,487.2 240.8,332 217.6,332 217.6,487.2 185.6,487.2 185.6,332 156.8,332 156.8,487.2 332.8,487.2 332.8,487.2 301.6,487.2 301.6,332 272,332 "></polygon>
                                                                <rect x="272" y="300" style="fill:#0B3249;" width="28.8" height="10.4"></rect>
                                                                <rect x="217.6" y="300" style="fill:#0B3249;" width="23.2" height="10.4"></rect>
                                                                <rect x="301.6" y="284.8" style="fill:#0B3249;" width="186.4" height="14.4"></rect>
                                                                <rect x="185.6" y="29.6" style="fill:#0B3249;" width="40" height="32.8"></rect>
                                                                <rect x="185.6" y="284.8" style="fill:#0B3249;" width="32" height="14.4"></rect>
                                                                <rect x="177.6" y="430.4" style="fill:#0B3249;" width="48" height="34.4"></rect>
                                                                <rect x="2.4" y="284.8" style="fill:#0B3249;" width="20" height="14.4"></rect>
                                                                <rect x="54.4" y="284.8" style="fill:#0B3249;" width="103.2" height="14.4"></rect>
                                                                <rect x="240.8" y="284.8" style="fill:#0B3249;" width="32" height="14.4"></rect>
                                                                <rect x="232.8" y="362.4" style="fill:#0B3249;" width="48" height="14.4"></rect>
                                                                <rect x="232.8" y="439.2" style="fill:#0B3249;" width="48" height="5.6"></rect>
                                                                <rect x="232.8" y="413.6" style="fill:#0B3249;" width="48" height="5.6"></rect>
                                                                <rect x="232.8" y="388" style="fill:#0B3249;" width="48" height="5.6"></rect>
                                                                <rect x="240.8" y="309.6" style="fill:#0B3249;" width="32" height="22.4"></rect>
                                                                <rect x="173.6" y="309.6" style="fill:#0B3249;" width="32" height="22.4"></rect>
                                                                <rect x="330.4" y="309.6" style="fill:#0B3249;" width="9.6" height="22.4"></rect>
                                                                <rect x="311.2" y="309.6" style="fill:#0B3249;" width="9.6" height="22.4"></rect>
                                                                <rect x="372" y="309.6" style="fill:#0B3249;" width="116" height="22.4"></rect>
                                                                <rect x="2.4" y="154.4" style="fill:#0B3249;" width="132" height="8.8"></rect>
                                                                <rect x="372" y="154.4" style="fill:#0B3249;" width="116" height="8.8"></rect>
                                                                <rect x="353.6" y="154.4" style="fill:#0B3249;" width="10.4" height="8.8"></rect>
                                                                <rect x="334.4" y="154.4" style="fill:#0B3249;" width="10.4" height="8.8"></rect>
                                                                <rect x="315.2" y="154.4" style="fill:#0B3249;" width="10.4" height="8.8"></rect>
                                                                <rect x="240.8" y="176" style="fill:#0B3249;" width="32" height="32.8"></rect>
                                                                <rect x="240.8" y="109.6" style="fill:#0B3249;" width="40" height="32.8"></rect>
                                                                <rect x="92" y="176" style="fill:#0B3249;" width="10.4" height="32.8"></rect>
                                                                <rect x="71.2" y="176" style="fill:#0B3249;" width="10.4" height="32.8"></rect>
                                                                <rect x="50.4" y="176" style="fill:#0B3249;" width="10.4" height="32.8"></rect>
                                                                <rect x="388" y="176" style="fill:#0B3249;" width="100" height="32.8"></rect>
                                                                <rect x="2.4" y="176" style="fill:#0B3249;" width="36.8" height="32.8"></rect>
                                                                <rect x="135.2" y="176" style="fill:#0B3249;" width="22.4" height="32.8"></rect>
                                                                <rect x="301.6" y="176" style="fill:#0B3249;" width="37.6" height="32.8"></rect>
                                                                <rect x="360.8" y="176" style="fill:#0B3249;" width="16.8" height="32.8"></rect>
                                                                <rect x="156.8" y="64" style="fill:#0B3249;" width="28.8" height="112"></rect>
                                                                <rect x="156.8" y="0.8" style="fill:#0B3249;" width="28.8" height="28"></rect>
                                                                <rect x="217.6" y="0.8" style="fill:#0B3249;" width="23.2" height="106.4"></rect>
                                                                <rect x="217.6" y="148.8" style="fill:#0B3249;" width="23.2" height="27.2"></rect>
                                                                <rect x="272" y="0.8" style="fill:#0B3249;" width="28.8" height="24"></rect>
                                                                <rect x="272" y="54.4" style="fill:#0B3249;" width="28.8" height="122.4"></rect>
                                                                <rect x="316.8" y="54.4" style="fill:#0B3249;" width="13.6" height="75.2"></rect>
                                                                <rect x="316.8" y="4.8" style="fill:#0B3249;" width="13.6" height="35.2"></rect>
                                                            </g>
                                                            <path style="fill:#E05407;" d="M483.2,248.8H6.4c-2.4,0-4.8-2.4-4.8-4.8c0-2.4,2.4-4.8,4.8-4.8h476.8c2.4,0,4.8,2.4,4.8,4.8 C488,246.4,485.6,248.8,483.2,248.8z"></path>
                                                            <path style="fill:#FF7631;" d="M483.2,239.2H6.4c-1.6,0-3.2,0.8-4,2.4c0.8,1.6,2.4,2.4,4,2.4h476.8c1.6,0,3.2-0.8,4-2.4 C487.2,240.8,485.6,239.2,483.2,239.2z"></path>
                                                            <g> <rect x="316.8" y="410.4" style="fill:#0B3249;" width="13.6" height="75.2"></rect> <rect x="316.8" y="361.6" style="fill:#0B3249;" width="13.6" height="35.2"></rect> </g>
                                                        </g>
                                                    </svg>
								                </span>
                                                </a>
                                                <button onclick="modalQr({{$device->id}})"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
								                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16"> <path
                                                            d="M2 2h2v2H2V2Z"/> <path
                                                            d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/> <path
                                                            d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/> <path
                                                            d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/> <path
                                                            d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/> </svg>
								                </span>
                                                </button>
                                                <a onclick="modal({{$device->id}})"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
								                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
								                        <path opacity="0.3"
                                                              d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                              fill="currentColor"></path>
								                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="currentColor"></path>
								                    </svg>
								                </span>
                                                </a>
                                                <a onclick="deletePosition('{{route('cihazlar.delete',$device->id)}}')"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm bg-gray-200i">
								                <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                                                       viewBox="0 0 24 24" fill="none"
                                                                                       xmlns="http://www.w3.org/2000/svg">
								                        <path
                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                            fill="currentColor"></path>
								                        <path opacity="0.5"
                                                              d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                              fill="currentColor"></path>
								                        <path opacity="0.5"
                                                              d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                              fill="currentColor"></path>
								                    </svg>
								                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @if(auth()->user()->company_id == "0")
    <div class="modal fade draggable" id="kt_modal_create_device" tabindex="-1" aria-hidden="true"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered mw-500px">
            <div class="modal-content">
                <form method="post" id="kt_modal_create_device" class="form w-100 needs-validation"
                      action="{{route('cihazlar.store')}}">
                    @csrf
                    <div class="modal-header ui-draggable-handle py-5" id="kt_modal_add_customer_header">
                        <h3 class="fw-bolder">Cihaz Ekle</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                             aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                   fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                    <rect fill="#000000" opacity="0.5"
                                          transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                          x="0" y="7" width="16" height="2" rx="1"></rect>
                                </g>
                            </svg>
                        </span>
                        </div>
                    </div>
                    <div class="modal-body py-5 px-12">
                        <div class="scroll-y " id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-5">
                                <label class="form-label fs-7">Cihaz ID</label>
                                <input
                                    class="form-control form-control-lg bg-transparent @error('device_id') border-danger @enderror"
                                    type="text" name="device_id" value="{{old('device_id')}}" required>
                                @error('device_id')
                                <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center py-2">
                        <button class="btn btn-dark mx-2 min-w-200px" data-bs-dismiss="modal" type="button"><span
                                class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat
                        </button>
                        <button type="submit" class="btn btn-primary min-w-200px"><i
                                class="las la-check-double fs-2"></i>Cihaz Ekle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade draggable" id="kt_modal_edit_device" tabindex="-1" aria-hidden="true"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered mw-500px py-2">
            <div class="modal-content">
                <form method="post" id="kt_modal_edit_device_form" class="form w-100">
                    @method('PUT')
                    @csrf
                    <div class="modal-header py-5">
                        <h3 class="fw-bolder">Cihaz Düzenle</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                             aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                   fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                    <rect fill="#000000" opacity="0.5"
                                          transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                          x="0" y="7" width="16" height="2" rx="1"></rect>
                                </g>
                            </svg>
                        </span>
                        </div>
                    </div>
                    <div class="modal-body py-5 px-lg-17">
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                             data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-5">
                                <label class="form-label fs-7">Cihaz ID</label>
                                <input
                                    class="form-control form-control-lg bg-transparent @error('update_device_id') border-danger @enderror"
                                    type="text" id="update_device_id" name="update_device_id"
                                    value="{{old('update_device_id')}}" required="">
                                @error('update_device_id')
                                <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center py-2">
                        <button class="btn btn-dark mx-2 min-w-200px" data-bs-dismiss="modal" type="button"><span
                                class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat
                        </button>
                        <button type="submit" class="btn btn-primary min-w-200px"><i
                                class="las la-check-double fs-2"></i>Güncelle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade draggable" id="kt_modal_qr_code" tabindex="-1" aria-hidden="true"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered mw-500px">
            <div class="modal-content">
                <div class="modal-header ui-draggable-handle py-5" id="kt_modal_add_customer_header">
                    <h3 class="fw-bolder">QR Kod</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                   fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                    <rect fill="#000000" opacity="0.5"
                                          transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                          x="0" y="7" width="16" height="2" rx="1"></rect>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-5 px-12">
                    <div class="image-container d-flex justify-content-center align-content-center">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="modal-footer flex-center py-2">
                    <button class="btn btn-dark mx-2 min-w-200px" data-bs-dismiss="modal" type="button"><span
                            class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat
                    </button>
                    <a href="javascript:void(0)" download="" class="btn btn-primary min-w-200px btn-download-qr"><i
                            class="las la-check-double fs-2"></i>İndir
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('js')
    <script src="{{asset('backend/js/datatable.js')}}"></script>
    <script>
        function modal(id) {
            localStorage.setItem('id', id);
            var Ajaxurl = '{{ route('cihazlar.show', ':id') }}';
            Ajaxurl = Ajaxurl.replace(':id', id);
            var url = '{{ route('cihazlar.update', ':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                type: "get",
                url: Ajaxurl,
                data: {id: id},
                success: function (response) {
                    $('#update_device_id').val(response.device.device_id);
                    $('#kt_modal_edit_device_form').attr('action', url);
                    $('#kt_modal_edit_device').modal('show');
                }
            });
        }

        function deletePosition(url) {
            Swal.fire({
                title: 'Uyarı!',
                text: 'Cihazı Silmek istediğinizden emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        function modalQr(id) {
            localStorage.setItem('id', id);
            var Ajaxurl = '{{ route('cihazlar.show', ':id') }}';
            Ajaxurl = Ajaxurl.replace(':id', id);
            $.ajax({
                type: "get",
                url: Ajaxurl,
                data: {id: id},
                success: function (response) {
                    console.log("response:   ",response)
                    const qrCodeName = response.qr_code_url.split(/[/]+/).pop();
                    $('#kt_modal_qr_code img').attr('src', response.qr_code_url);
                    $('#kt_modal_qr_code a.btn-download-qr').attr('href', response.qr_code_url).attr('download', qrCodeName);
                    $('#kt_modal_qr_code').modal('show');
                }
            });
        }

    </script>
    @if(array_intersect($modals['create'], $errors->keys()))
        <script>
            $(document).ready(() => {
                setTimeout(() => {
                    $('#kt_modal_create_device').modal('show');
                }, 500);
            });
        </script>
    @endif
    @if(array_intersect($modals['edit'], $errors->keys()))
        <script>
            $(document).ready(() => {
                var url = '{{ route('cihazlar.update', ':id') }}';
                url = url.replace(':id', localStorage.getItem('id'));
                $('#kt_modal_editdevice_form').attr('action', url);
                setTimeout(() => {
                    $('#kt_modal_edit_device').modal('show');
                }, 500);
            });
        </script>
    @endif
@endsection
