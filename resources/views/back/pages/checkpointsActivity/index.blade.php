@extends('back.layouts.master')
@section('title','Geçiş Noktası Raporları')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        @role('admin|superadmin|Firma Yetkilisi')
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
                        <li class="breadcrumb-item text-muted">PDKS Raporları</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="#"
                           class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="currentColor"/>
                            </svg>
                        </span>Filtre</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                             id="kt_menu_63d12db04b388">
                            <div class="px-7 py-4">
                                <div class="fs-5 text-dark fw-bold">Filtreleme Seçenekleri</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <form method="GET" action="{{route('raporlar.index')}}">
                                <div class="px-7 py-5">
                                    <div class="row mb-5">
                                        <label class="form-label fw-semibold">Departman:</label>
                                        <div>
                                            <select class="form-select form-select-solid" data-kt-select2="true"
                                                    name="department_id" data-placeholder="Departman Seçiniz"
                                                    data-dropdown-parent="#kt_menu_63d12db04b388"
                                                    data-allow-clear="true">
                                                <option value="none" selected disabled hidden>-Seçiniz-</option>
                                                @foreach ($departments as $department)
                                                    <option
                                                        @selected(request()->query('department_id') == $department->id) value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Pozisyon:</label>
                                        <div>
                                            <select class="form-select form-select-solid" name="position_id"
                                                    data-kt-select2="true" data-placeholder="Pozisyon Seçiniz"
                                                    data-dropdown-parent="#kt_menu_63d12db04b388"
                                                    data-allow-clear="true">
                                                <option value="none" selected disabled hidden>-Seçiniz-</option>
                                                @foreach ($positions as $position)
                                                    <option
                                                        @selected(request()->query('position_id') == $position->id) value="{{$position->id}}">{{$position->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Çalışan:</label>
                                        <div>
                                            <select class="form-select form-select-solid" name="employee_id"
                                                    data-kt-select2="true" data-placeholder="Çalışan Seçiniz"
                                                    data-dropdown-parent="#kt_menu_63d12db04b388"
                                                    data-allow-clear="true">
                                                <option value="none" selected disabled hidden>-Seçiniz-</option>
                                                @foreach ($employees as $employee)
                                                    <option
                                                        @selected(request()->query('employee_id') == $employee->id) value="{{$employee->id}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Tarih Aralığı:</label>
                                        <div>
                                            <div class="fv-row mb-5">
                                                <input class="form-control form-control-lg bg-transparent" type="date"
                                                       name="start_date" value="{{ request()->query('start_date') }}">
                                            </div>
                                            <div class="fv-row mb-5">
                                                <input class="form-control form-control-lg bg-transparent" type="date"
                                                       name="end_date" value="{{ request()->query('end_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('raporlar.index')}}" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                data-kt-menu-dismiss="true">Sıfırla
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                                data-kt-menu-dismiss="true">Uygula
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                            <tr class="text-gray-900 fw-bold text-capitalized bg-light w-100 px-0 mx-0"style="font-size: 15px;">
                                <th class="text-start px-md-12 px-6 w-25">Ad Soyad</th>
                                <th class="text-start px-md-12 px-6 w-25">Tarih</th>
                                <th class="text-start px-md-12 px-6 w-25">Süre</th>
                                <th class="text-start px-md-12 px-6 w-25">Giriş</th>
                                <th class="text-start px-md-12 px-6 w-25">Çıkış</th>
                                <th class="text-end px-md-12 px-6 w-25">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-900">
                            @foreach ($activities as $activity)
                                <tr style="font-size: 13px;">
                                    <td class="text-start px-md-12 px-6 py-6">
                                        {{$activity->employee->name}}
                                    </td>
                                    <td class="text-start px-md-12 px-6 py-6">
                                        {{$activity->created_at->translatedFormat('d M Y')}}
                                    </td>
                                    <td class="text-start px-md-12 px-6 py-6">
                                        <span
                                            class="badge badge-light-primary">{{$activity->total_working_hours}}</span>
                                    </td>
                                    @php
                                        if($activity->shiftDay)
                                        {
                                           $todayDate = date('Y-m-d');
                                           $optionString = $activity->shiftDay->option;
                                           $option = DateTime::createFromFormat('H:i:s', $optionString);
                                           $optionHours = $option->format('H'); // Saat kısmı
                                           $optionMinutes = $option->format('i'); // Dakika kısmı
                                           $optionInSeconds = ($optionHours * 60 * 60) + ($optionMinutes * 60); // Option değerini saniyeye çevirme
                                           $morningEntrance = new DateTime($todayDate . ' ' . $activity->morning_entrance);
                                           $realMorningEntrance = new DateTime($todayDate . ' ' . $activity->shiftDay->morning_entrance);
                                           $realMorningExit = new DateTime($todayDate . ' ' . $activity->shiftDay->morning_exit);
                                           $entranceDifference = abs($morningEntrance->getTimestamp() - $realMorningEntrance->getTimestamp());
                                           $entranceColor = $activity->status == 0 && $morningEntrance->getTimestamp() < $realMorningEntrance->getTimestamp() ? "success" : (($entranceDifference >= $optionInSeconds) ? 'danger' : (is_null($activity->morning_entrance) ? "danger" : 'success'));
                                           $exitColor = 'danger';
                                           $enthours = floor($entranceDifference / 3600);
                                           $entminutes = floor(($entranceDifference % 3600) / 60);
                                           if (isset($activity->morning_exit) && isset($activity->shiftDay->morning_exit)){
                                           $morningExit = new DateTime($todayDate . ' ' . $activity->morning_exit);
                                           $moonExit = new DateTime($todayDate . ' ' . $activity->shiftDay->moon_exit);
                                           $exitDifference = abs($morningExit->getTimestamp() - $realMorningExit->getTimestamp());
                                           $exitColor = $morningExit->getTimestamp() >= $realMorningExit->getTimestamp() ? "success" : (($exitDifference >= $optionInSeconds) ? 'danger' : 'success');
                                           $exithours = floor($exitDifference / 3600);
                                           $exitminutes = floor(($exitDifference % 3600) / 60);
                                           }
                                        }
                                    @endphp
                                    <td class="text-start px-md-12 px-6 py-6">
                                        <span
                                            class="text-{{$entranceColor ?? 'success'}}">{{$activity->status == 0 ? substr($activity->morning_entrance,0,5) : ($activity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                    </td>
                                    <td class="text-start px-md-12 px-6 py-6">
                                        @if(isset($activity->last_external->morning_exit))
                                            <span
                                                class="text-{{$exitColor ?? 'success'}}">{{$activity->status == 0 ? substr($activity->last_external->morning_exit,0,5) : ($activity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                        @else
                                            <span
                                                class="text-{{$exitColor ?? 'success'}}">{{$activity->status == 0 ? ($activity?->morning_exit ? substr($activity?->morning_exit,0,5) : '-') : ($activity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                        @endif
                                    </td>
                                    <td class="text-end px-md-12 px-6 py-4">
                                        <div class="text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <a onclick="show({{$activity->id}})"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                                  height="2" rx="1"
                                                                  transform="rotate(45 17.0365 15.1223)"
                                                                  fill="currentColor"/>
                                                            <path
                                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                fill="currentColor"/>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a onclick="modal({{$activity->id}})"
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
                                            </div>
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
        @endrole
    </div>
    <div class="modal fade draggable" id="kt_modal_edit_activity" tabindex="-1" aria-hidden="true"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form method="post" id="kt_modal_activity_form" class="form w-100 needs-validation">
                    @csrf
                    @method('put')
                    <div class="modal-header ui-draggable-handle py-5" id="kt_modal_add_customer_header">
                        <h3 class="fw-bolder">Çalışan Aktiviteleri</h3>
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
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <label class="form-label fs-7">Giriş</label>
                                        <input
                                            class="form-control form-control-lg bg-transparent @error('update_morning_entrance') border-danger @enderror"
                                            id="morning_entrance" type="time" name="update_morning_entrance"
                                            value="{{old('update_morning_entrance')}}" required>
                                        @error('update_morning_entrance')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <label class="form-label fs-7">Çıkış</label>
                                        <input
                                            class="form-control form-control-lg bg-transparent @error('update_noon_exit') border-danger @enderror"
                                            id="noon_exit" type="time" name="update_noon_exit"
                                            value="{{old('update_noon_exit')}}" required>
                                        @error('update_noon_exit')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <label class="form-label fs-7">Öğlen Giriş</label>
                                        <input class="form-control form-control-lg bg-transparent @error('update_noon_entrance') border-danger @enderror" id="noon_entrance" type="time" name="update_noon_entrance" value="{{old('update_noon_entrance')}}" required>
                                        @error('update_noon_entrance')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <label class="form-label fs-7">Sabah Çıkış</label>
                                        <input class="form-control form-control-lg bg-transparent @error('update_morning_exit') border-danger @enderror" id="morning_exit" type="time" name="update_morning_exit" value="{{old('update_morning_exit')}}" required>
                                        @error('update_morning_exit')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
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
    <div class="modal fade px-0 py-0 draggable" id="activity" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
         data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header ui-draggable-handle py-4" id="kt_modal_add_customer_header">
                    <h3 class="fw-bolder">Aktivite Bilgisi</h3>
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
                <div class="modal-body py-0 px-lg-17 px-5">
                    <div class="scroll-y me-n7" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-offset="300px">
                        <div class="card-body pe-5" id="activity-detail">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/js/datatable.js')}}"></script>
    <script>
        function modal(id) {
            localStorage.setItem('id', id);
            var Ajaxurl = '{{ route('pdks-activity.show',':id') }}';
            Ajaxurl = Ajaxurl.replace(':id', id);
            var url = '{{ route('pdks-activity.update',':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                type: "get",
                url: Ajaxurl,
                data: {id: id},
                success: function (response) {
                    $('#morning_entrance').val(response.activity?.morning_entrance?.substring(0, 5));
                    $('#morning_exit').val(response.activity?.morning_exit?.substring(0, 5));
                    $('#noon_entrance').val(response.activity?.noon_entrance?.substring(0, 5));
                    $('#noon_exit').val(response.activity?.noon_exit?.substring(0, 5));
                    $('#kt_modal_edit_activity').modal('show');
                    $('#kt_modal_activity_form').attr('action', url);
                }
            });
        }

        function show(id) {
            $('#activity-detail').html('<div id="loading-spinner" class="spinner my-5" style="display:none"></div>');
            $('#loading-spinner').show();
            $('#activity').modal('show');
            var html = '';
            var Ajaxurl = '{{ route('pdks-activity.show',':id') }}';
            Ajaxurl = Ajaxurl.replace(':id', id);
            $.ajax({
                type: "get",
                url: Ajaxurl,
                data: {id: id},
                success: function (response) {
                    if (response.activity.shiftDay) {
                        var todayDate = new Date().toISOString().split('T')[0];
                        var optionString = response.activity.shiftDay.option;
                        var option = new Date('1970-01-01T' + optionString);
                        var optionHours = option.getHours();
                        var optionMinutes = option.getMinutes();
                        var optionInSeconds = (optionHours * 60 * 60) + (optionMinutes * 60);

                        var morningExitColor = 'danger';
                        var noonExitColor = 'danger';
                        var noonEntranceColor = 'danger';
                        var morningEntranceColor = 'danger';

                        var morningEntrance = new Date(todayDate + 'T' + response.activity.morning_entrance);
                        var realMorningEntrance = new Date(todayDate + 'T' + response.activity.shiftDay.morning_entrance);
                        var realMorningExit = new Date(todayDate + 'T' + response.activity.shiftDay.morning_exit);
                        var morningEntranceDifference = Math.abs(morningEntrance - realMorningEntrance) / 1000;
                        var morningEntranceColor = response.activity.status == 0 && morningEntrance < realMorningEntrance ? "success" : ((morningEntranceDifference >= optionInSeconds) ? 'danger' : (response.activity.morning_entrance === null ? 'danger' : 'success'));
                        var morningEntranceHours = Math.floor(morningEntranceDifference / 3600);
                        var morningEntranceMinutes = Math.floor((morningEntranceDifference % 3600) / 60);

                        var morningExit = new Date(todayDate + 'T' + response.activity.morning_exit);
                        var realMorningExit = new Date(todayDate + 'T' + response.activity.shiftDay.morning_exit);
                        var exitDifference = Math.abs(morningExit - realMorningExit) / 1000;
                        morningExitColor = morningExit >= realMorningExit ? 'success' : ((exitDifference >= optionInSeconds) ? 'danger' : (response.activity.morning_exit === null ? 'danger' : 'success'));
                        var exithours = Math.floor(exitDifference / 3600);
                        var exitminutes = Math.floor((exitDifference % 3600) / 60);

                        if (response.activity.noon_exit && response.activity.shiftDay.noon_exit) {
                            var noonExit = new Date(todayDate + 'T' + response.activity.noon_exit);
                            var realNoonExit = new Date(todayDate + 'T' + response.activity.shiftDay.noon_exit);
                            var noonExitDifference = Math.abs(noonExit - realNoonExit) / 1000;
                            noonExitColor = (noonExitDifference >= optionInSeconds) ? 'danger' : 'success';
                            var noonExithours = Math.floor(noonExitDifference / 3600);
                            var noonExitminutes = Math.floor((noonExitDifference % 3600) / 60);
                        }

                        if (response.activity.noon_entrance && response.activity.shiftDay.noon_entrance) {
                            var noonEntrance = new Date(todayDate + 'T' + response.activity.noon_entrance);
                            var realNoonEntrance = new Date(todayDate + 'T' + response.activity.shiftDay.noon_entrance);
                            var noonEntranceDifference = Math.abs(noonEntrance - realNoonEntrance) / 1000;
                            noonEntranceColor = (noonEntranceDifference >= optionInSeconds) ? 'danger' : 'success';
                            var noonEntrancehours = Math.floor(noonEntranceDifference / 3600);
                            var noonEntranceminutes = Math.floor((noonEntranceDifference % 3600) / 60);
                        }

                        if (response.activity?.last_external?.morning_exit && response.activity.shiftDay.morning_exit) {
                            var morningExit = new Date(todayDate + 'T' + response.activity.last_external.morning_exit);
                            var realMorningExit = new Date(todayDate + 'T' + response.activity.shiftDay.morning_exit);
                            var exitDifference = Math.abs(morningExit - realMorningExit) / 1000;
                            morningExitColor = morningExit >= realMorningExit ? 'success' : ((exitDifference >= optionInSeconds) ? 'danger' : 'success');
                            var exithours = Math.floor(exitDifference / 3600);
                            var exitminutes = Math.floor((exitDifference % 3600) / 60);
                        }
                    }

                    html += `
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Giriş</div>
                    <div class="d-flex fw-bold text-${morningEntranceColor ?? 'success'}">${response.activity.morning_entrance ?? (response.activity.status == 1 ? 'Gelmedi' : (response.activity.status == 2 ? 'İzinli' : '-'))}</div>
                </div>
                <!-- <div class="separator separator-dashed"></div>
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Öğle arası çıkış</div>
                    <div class="d-flex fw-bold text-${noonExitColor ?? 'success'}">${response.activity.noon_exit ?? '-'}</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Öğle arası giriş</div>
                    <div class="d-flex fw-bold text-${noonEntranceColor ?? 'success'}">${response.activity.noon_entrance ?? '-'}</div>
                </div> -->`;

                    if (response.activity.externals) {
                        response.activity.externals.forEach(external => {
                            html += `<div class="separator separator-dashed"></div>
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Harici Çıkış</div>
                    <div class="d-flex fw-bold text-muted">${external.morning_exit ?? '-'}</div>
                </div>`;
                            if (external.morning_entrance) {
                                html += `<div class="separator separator-dashed"></div>
                <div class="separator separator-dashed"></div>
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Harici Giriş</div>
                    <div class="d-flex fw-bold text-muted">${external.morning_entrance ?? '-'}</div>
                </div>
                <div class="separator separator-dashed"></div>
                `;
                            }
                        });
                    }

                    html += `<div class="separator separator-dashed"></div>
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Çıkış</div>
                    <div class="d-flex fw-bold text-${morningExitColor ?? 'success'}">${response.activity?.last_external?.morning_exit ?? (response.activity.status == 1 ? 'Gelmedi' : (response.activity.status == 2 ? 'İzinli' : (response.activity.morning_exit ? response.activity.morning_exit : '-')))}</div>
                </div>
                <div class="separator separator-dashed"></div>`;


                    $('#loading-spinner').hide();
                    $('#activity-detail').html(html);
                }
            });
        }
    </script>
@endsection
