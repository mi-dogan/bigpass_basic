@extends('back.layouts.master')
@section('title','Anasayfa')
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid mt-5">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row gy-3 g-xl-3">
                    <div class="card mb-3">
                            <div class="card-header pt-0 flex-nowrap">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Özet Analiz</span>
                                </h3>
                                <div class="card-toolbar">
                                    <span class="svg-icon svg-icon-1 svg-icon-gray-300 me-n1 svg-icon-3x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="currentColor" />
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @role('admin|superadmin|Firma Yetkilisi')
                        <div class="card card card-flush mt-4">
                            <div class="card-header align-items-center d-flex align-items-center">
                                <div class="card-title">
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input type="text" data-kt-filter="search" class="form-control form-control-sm form-control-solid md-w-250px w-200px ps-14" placeholder="Ara.." />
                                    </div>
                                    <div id="kt_datatable_example_1_export" class="d-none"></div>
                                </div>
                                <div class="card-toolbar flex-row-fluid justify-content-end gap-5 d-none d-md-grid">
                                    <button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="currentColor"></rect>
                                                <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        Dışa aktar
                                    </button>
                                    <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
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
                                <table class="table table-striped border rounded table-row-dashed fs-6  px-0 mx-0 overflow-x-scroll" id="kt_datatable_example">
                                    <thead class="py-12 px-2">
                                        <tr class="text-gray-900 fw-bold text-capitalize bg-light w-100 px-0 mx-0"style="font-size:15px;">
                                            <th class="text-start px-md-12 px-6 w-25">Ad Soyad</th>
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
                                                    {{$activity->employee->name}} - {{$activity->created_at->translatedFormat('d M Y')}}
                                                </td>
                                                <td class="text-start px-md-12 px-6 py-6">
                                                   <span class="badge badge-light-primary">{{$activity->total_working_hours}}</span>
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
                                                       <span class="text-{{$entranceColor ?? 'success'}}">{{$activity->status == 0 ? substr($activity->morning_entrance,0,5) : ($activity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                                       </td>
                                                       <td class="text-start px-md-12 px-6 py-6">
                                                        @if(isset($activity->last_external->morning_exit))
                                                           <span class="text-{{$exitColor ?? 'success'}}">{{$activity->status == 0 ? substr($activity->last_external->morning_exit,0,5) : ($activity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                                        @else
                                                               <span class="text-{{$exitColor ?? 'success'}}">{{$activity->status == 0 ? ($activity?->morning_exit ? substr($activity?->morning_exit,0,5) : '-') : ($activity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                                        @endif
                                                       </td>
                                                <td class="text-end px-md-12 px-6 py-4">
                                                    <div class="text-end">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <a onclick="show({{$activity->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <a onclick="modal({{$activity->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
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
                        @endrole
                        @role('personel')
                        <div class="card card card-flush mt-4">
                            <div class="card-header align-items-center d-flex align-items-center">
                                <div class="card-title">
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input type="text" data-kt-filter="search" class="form-control form-control-sm form-control-solid md-w-250px w-200px ps-14" placeholder="Ara.." />
                                    </div>
                                    <div id="kt_datatable_example_1_export" class="d-none"></div>
                                </div>
                                <div class="card-toolbar flex-row-fluid justify-content-end gap-5 d-none d-md-grid">
                                    <button type="button" class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="currentColor"></rect>
                                                <path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        Dışa aktar
                                    </button>
                                    <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
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
                                <table class="table table-striped border rounded table-row-dashed fs-6  px-0 mx-0 overflow-x-scroll" id="kt_datatable_example">
                                    <thead class="py-12 px-2">
                                        <tr class="text-gray-900 fw-bold text-capitalize bg-light w-100 px-0 mx-0"style="font-size:15px;">
                                            <th class="text-start px-md-12 px-6 w-25">Ad Soyad</th>
                                            <th class="text-start px-md-12 px-6 w-25">Süre</th>
                                            <th class="text-start px-md-12 px-6 w-25">Giriş</th>
                                            <th class="text-start px-md-12 px-6 w-25">Çıkış</th>
                                            <th class="text-end px-md-12 px-6 w-25">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-900">
                                            <tr style="font-size: 13px;">
                                                <td class="text-start px-md-12 px-6 py-6">
                                                    {{$loggedUserActivity->employee->name}} - {{$loggedUserActivity->created_at->translatedFormat('d M Y')}}
                                                </td>
                                                <td class="text-start px-md-12 px-6 py-6">
                                                   <span class="badge badge-light-primary">{{$loggedUserActivity->total_working_hours}}</span>
                                                </td>
                                               @php
                                                  if($loggedUserActivity->shiftDay)
                                                  {
                                                     $todayDate = date('Y-m-d');
                                                     $optionString = $loggedUserActivity->shiftDay->option;
                                                     $option = DateTime::createFromFormat('H:i:s', $optionString);
                                                     $optionHours = $option->format('H'); // Saat kısmı
                                                     $optionMinutes = $option->format('i'); // Dakika kısmı
                                                     $optionInSeconds = ($optionHours * 60 * 60) + ($optionMinutes * 60); // Option değerini saniyeye çevirme
                                                     $morningEntrance = new DateTime($todayDate . ' ' . $loggedUserActivity->morning_entrance);
                                                     $realMorningEntrance = new DateTime($todayDate . ' ' . $loggedUserActivity->shiftDay->morning_entrance);
                                                     $realMorningExit = new DateTime($todayDate . ' ' . $loggedUserActivity->shiftDay->morning_exit);
                                                     $entranceDifference = abs($morningEntrance->getTimestamp() - $realMorningEntrance->getTimestamp());
                                                     $entranceColor = $loggedUserActivity->status == 0 && $morningEntrance->getTimestamp() < $realMorningEntrance->getTimestamp() ? "success" : (($entranceDifference >= $optionInSeconds) ? 'danger' : (is_null($loggedUserActivity->morning_entrance) ? "danger" : 'success'));
                                                     $exitColor = 'danger';
                                                     $enthours = floor($entranceDifference / 3600);
                                                     $entminutes = floor(($entranceDifference % 3600) / 60);
                                                     if (isset($loggedUserActivity->morning_exit) && isset($loggedUserActivity->shiftDay->morning_exit)){
                                                     $morningExit = new DateTime($todayDate . ' ' . $loggedUserActivity->morning_exit);
                                                     $moonExit = new DateTime($todayDate . ' ' . $loggedUserActivity->shiftDay->moon_exit);
                                                     $exitDifference = abs($morningExit->getTimestamp() - $realMorningExit->getTimestamp());
                                                     $exitColor = $morningExit->getTimestamp() >= $realMorningExit->getTimestamp() ? "success" : (($exitDifference >= $optionInSeconds) ? 'danger' : 'success');
                                                     $exithours = floor($exitDifference / 3600);
                                                     $exitminutes = floor(($exitDifference % 3600) / 60);
                                                     }
                                                  }
                                                @endphp
                                                   <td class="text-start px-md-12 px-6 py-6">
                                                       <span class="text-{{$entranceColor ?? 'success'}}">{{$loggedUserActivity->status == 0 ? substr($loggedUserActivity->morning_entrance,0,5) : ($loggedUserActivity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                                       </td>
                                                       <td class="text-start px-md-12 px-6 py-6">
                                                        @if(isset($loggedUserActivity->last_external->morning_exit))
                                                           <span class="text-{{$exitColor ?? 'success'}}">{{$loggedUserActivity->status == 0 ? substr($loggedUserActivity->last_external->morning_exit,0,5) : ($loggedUserActivity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                                        @else
                                                               <span class="text-{{$exitColor ?? 'success'}}">{{$loggedUserActivity->status == 0 ? ($loggedUserActivity?->morning_exit ? substr($loggedUserActivity?->morning_exit,0,5) : '-') : ($loggedUserActivity->status == 1 ? 'Gelmedi' : 'İzinli')}}</span>
                                                        @endif
                                                       </td>
                                                <td class="text-end px-md-12 px-6 py-4">
                                                    <div class="text-end">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <a onclick="show({{$loggedUserActivity->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <a onclick="modal({{$loggedUserActivity->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endrole
                    <div class="col-xxl-6">
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
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor" />
                                                    <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor" />
                                                    <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body pt-5">
                                        @forelse($holidays as $holiday)
                                        <div class="d-flex flex-stack">
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">{{str()->limit($holiday->name,20)}}</div>
                                            <div class="d-flex align-items-senter">
                                                <span class="text-gray-900 fw-bolder fs-7">{{$holiday->day->translatedFormat('d F Y')}}</span>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-3"></div>
                                        @empty
                                        <div class="card card-flush h-md-100">
                                            <div class="card-body d-flex flex-column justify-content-between bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
                                                <img class="mx-auto h-150px h-lg-175px" src="{{asset('backend/media/illustrations/sigma-1/20-dark.png')}}">
                                            </div>
                                        </div>
                                        @endforelse
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
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="currentColor" />
                                                    <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body pt-5">
                                        @forelse($birthdates as $birthdate)
                                        <div class="d-flex flex-stack">
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">{{str()->limit($birthdate->employee->name,20)}}</div>
                                            <div class="d-flex align-items-senter">
                                                <span class="text-gray-900 fw-bolder fs-7">{{$birthdate->birthdate->translatedFormat('d F Y')}}</span>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed my-3"></div>
                                        @empty
                                        <div class="card card-flush h-md-100">
                                            <div class="card-body d-flex flex-column justify-content-between bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
                                                <img class="mx-auto h-150px h-lg-175px" src="{{asset('backend/media/illustrations/sigma-1/20-dark.png')}}">
                                            </div>
                                        </div>
                                        @endforelse
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
                    <div class="col-xxl-6 mb-xl">
                        <div class="card h-md-100 py-0">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">İzinler</span>
                                    <span class="text-muted mt-1 fw-semibold fs-7">Yaklaşan İzin Talepleri</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{route('izinler.index')}}" class="btn btn-sm btn-light">Tümünü Gör</a>
                                </div>
                            </div>
                            <div class="card-body pt-3 px-0 pb-0">
                                <div class="tab-content mb-0 px-9">
                                    <div class="tab-pane fade active show" id="kt_timeline_widget_3_tab_content_3" role="tabpanel">
                                        @foreach ($consents as $consent)
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-50px mh-100 me-4 bg-success"></span>
                                            <div class="flex-grow-1">
                                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{$consent->employee->name .'  -  '. $consent->employee->department->name}}</a>
                                                <span class="text-muted d-block fw-bold">{{$consent->employee->degree}}</span>
                                            </div>
                                            <button class="btn btn-icon btn-sm btn-light btn-active-primary w-35px h-35px me-2" data-kt-menu-trigger="hover" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                <span class="svg-icon">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true" style="">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">İzin İşlemleri</div>
                                                </div>
                                                <div class="separator mb-3 opacity-75"></div>
                                                <div class="menu-item px-3">
                                                    <a class="menu-link px-3" href="{{route('izinler.index')}}">
                                                        <span class="menu-icon">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3" d="M2 21V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H3C2.4 22 2 21.6 2 21Z" fill="currentColor"></path>
                                                                    <path d="M2 10V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H3C2.4 11 2 10.6 2 10Z" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">İzin Detayları</span>
                                                    </a>
                                                </div>
                                                <div class="separator mt-3 opacity-75"></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade draggable" id="kt_modal_edit_activity" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <form method="post" id="kt_modal_activity_form" class="form w-100 needs-validation">
                        @csrf
                        @method('put')
                        <div class="modal-header ui-draggable-handle py-5" id="kt_modal_add_customer_header">
                            <h3 class="fw-bolder">Çalışan Aktiviteleri</h3>
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body py-5 px-12">
                            <div class="scroll-y " id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-5">
                                            <label class="form-label fs-7">Giriş</label>
                                            <input class="form-control form-control-lg bg-transparent @error('update_morning_entrance') border-danger @enderror" id="morning_entrance" type="time" name="update_morning_entrance" value="{{old('update_morning_entrance')}}" required>
                                            @error('update_morning_entrance')
                                            <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-5">
                                            <label class="form-label fs-7">Çıkış</label>
                                            <input class="form-control form-control-lg bg-transparent @error('update_morning_exit') border-danger @enderror" id="morning_exit" type="time" name="update_morning_exit" value="{{old('update_morning_exit')}}" required>
                                            @error('update_morning_exit')
                                            <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer flex-center py-2">
                            <button class="btn btn-dark mx-2 min-w-200px" data-bs-dismiss="modal" type="button"><span class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat</button>
                            <button type="submit" class="btn btn-primary min-w-200px"><i class="las la-check-double fs-2"></i>Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade px-0 py-0 draggable" id="activity" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header ui-draggable-handle py-4" id="kt_modal_add_customer_header">
                        <h3 class="fw-bolder">Aktivite Bilgisi</h3>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                        <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-0 px-lg-17 px-5">
                        <div class="scroll-y me-n7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                            <div class="card-body pe-5" id="activity-detail">

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
                data: {
                    id: id
                },
                success: function(response) {
                    $('#morning_entrance').val(response.activity?.morning_entrance?.substring(0, 5));
                    $('#morning_exit').val(response.activity?.morning_exit?.substring(0, 5));
                    $('#noon_entrance').val(response.activity?.noon_entrance?.substring(0, 5));
                    $('#noon_exit').val(response.activity?.noon_exit?.substring(0, 5));
                    $('#kt_modal_edit_activity').modal('show');
                    $('#kt_modal_activity_form').attr('action', url);
                }
            });
        }
        function show(id)
    {
          $('#activity-detail').html('<div id="loading-spinner" class="spinner my-5" style="display:none"></div>');
          $('#loading-spinner').show();
          $('#activity').modal('show');
          var html = '';
          var Ajaxurl = '{{ route('pdks-activity.show',':id') }}';
          Ajaxurl = Ajaxurl.replace(':id',id);
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
                            html += `<div class="separator separator-dashed"></div>
                <div class="fs-4 fw-semibold text-gray-400 mb-7"></div>
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-semibold">Harici Çıkış</div>
                    <div class="d-flex fw-bold text-muted">${external.morning_exit ?? '-'}</div>
                </div>`;
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
