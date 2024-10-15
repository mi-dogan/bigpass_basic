@extends('front.layouts.qr.master')
@section('title','Anasayfa')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid mt-5">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="row gy-3 g-xl-3">
                        <div class="col-xxl-6">
                            <div class="card mb-3">
                                <div class="card-header pt-0 flex-nowrap">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-dark">Özet Analiz</span>
                                    </h3>
                                    <div class="card-toolbar">
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1 svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor"/>
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                  fill="currentColor"/>
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor"/>
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gx-xl-3">
                                <div class="col-sm-6 mb-3 mb-md-0">
                                    <div class="card card-flush h-lg-100">
                                        <div class="card-header pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold">Resmi Tatiller</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Yaklaşan Resmi Tatiller</span>
                                            </h3>
                                            <div class="card-toolbar">
                                            <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1 svg-icon-3x">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3"
                                                          d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                          fill="currentColor"/>
                                                    <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                                          fill="currentColor"/>
                                                    <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-flush h-100">
                                        <div class="card-header pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-dark">Doğum Günleri</span>
                                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Yaklaşan Doğum Günleri</span>
                                            </h3>
                                            <div class="card-toolbar">
                                            <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1 svg-icon-3x">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                                                          fill="currentColor"/>
                                                    <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                                                          fill="currentColor"/>
                                                    <path opacity="0.3"
                                                          d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                                                          fill="currentColor"/>
                                                </svg>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="card-body pt-5">

                                            {{-- <div class="d-flex flex-stack">
                                             <div class="text-gray-700 fw-semibold fs-6 me-2">Ahmet A..</div>
                                             <div class="d-flex align-items-senter">
                                                 <span class="text-gray-900 fw-bolder fs-7">27 Haz 2023</span>
                                             </div>
                                         </div>
                                         <div class="separator separator-dashed my-3"></div>
                                         <div class="d-flex flex-stack">
                                             <div class="text-gray-700 fw-semibold fs-6 me-2">Süleyman S..
                                             </div>
                                             <div class="d-flex align-items-senter">
                                                 <span class="text-gray-900 fw-bolder fs-7">28 Haz 2023</span>
                                             </div>
                                         </div>
                                         <div class="separator separator-dashed my-3"></div>
                                         <div class="d-flex flex-stack">
                                             <div class="text-gray-700 fw-semibold fs-6 me-2">Mehmet K..</div>
                                             <div class="d-flex align-items-senter">
                                                 <span class="text-gray-900 fw-bolder fs-7">15 Tem 2023</span>
                                             </div>
                                         </div>
                                         <div class="separator separator-dashed my-3"></div>
                                         <div class="d-flex flex-stack">
                                             <div class="text-gray-700 fw-semibold fs-6 me-2">Behzat Ç..</div>
                                             <div class="d-flex align-items-senter">
                                                 <span class="text-gray-900 fw-bolder fs-7">15 Tem 2023</span>
                                             </div>
                                         </div>
                                          <div class="separator separator-dashed my-3"></div>
                                          <div class="d-flex flex-stack">
                                              <div class="text-gray-700 fw-semibold fs-6 me-2">Behzat Ç..</div>
                                              <div class="d-flex align-items-senter">
                                                  <span class="text-gray-900 fw-bolder fs-7">15 Tem 2023</span>
                                              </div>
                                          </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card card card-flush mt-4">
                        <div class="card-header align-items-center d-flex align-items-center">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                              transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
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
                                        <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z"
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
                            <table class="table table-striped border rounded table-row-dashed fs-6  px-0 mx-0 overflow-x-scroll"
                                   id="kt_datatable_example">
                                <thead class="py-12 px-2">
                                <tr class="text-gray-700 fw-bold text-uppercase bg-light w-100 px-0 mx-0">
                                    <th class="text-start px-md-12 px-6 w-25">Ad Soyad</th>
                                    <th class="text-start px-md-12 px-6 w-25">Süre</th>
                                    <th class="text-start px-md-12 px-6 w-25">Giriş</th>
                                    <th class="text-start px-md-12 px-6 w-25">Çıkış</th>
                                    <th class="text-end px-md-12 px-6 w-25">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endsection
        @section('js')
            <script src="{{asset('backend/js/datatable.js')}}"></script>
            <script>

            </script>
@endsection
