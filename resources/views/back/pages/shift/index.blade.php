@extends('back.layouts.master')
@section('title','Vardiya Yönetimi')
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
                    <li class="breadcrumb-item text-muted">Vardiyalar</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-sm btn-primary" id="addButton">Vardiya ekle</a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            @error('warning')
            <div class="alert alert-danger d-flex align-items-center p-5 mb-5">
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
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
                            <tr class="text-gray-900 fw-bold text-capitalized bg-light w-100 px-0 mx-0"style="font-size: 15px;">
                                  <th class="text-start px-md-12 px-6 w-25">Vardiya</th>
                                  <th class="text-start px-md-12 px-6 w-25">Durum</th>
                                  <th class="text-start px-md-12 px-6 w-25">Çalışan</th>
                                  <th class="text-start px-md-12 px-6 w-25">Günler</th>
                                  <th class="text-end px-md-12 px-6 w-25">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-900">
							 @foreach ($shifts as $shift)
                                 <tr style="font-size: 13px;">
                                     <td class="text-start px-md-12 px-6 py-6">
                                        <a class="text-dark" href="{{route('gunler.index',$shift->id)}}"> {{ str()->limit($shift->name,50) }}</a>
                                     </td>
                                     <td class="text-start px-md-12 px-6 py-6">
                                       <span class="badge badge-light-{{$shift->status ? 'success' : 'danger'}}">{{$shift->status ? 'Aktif' : 'Pasif'}}</span>
                                     </td>
                                      <td class="text-start px-md-12 px-6 py-6">
                                        <span class="badge badge-light-primary">{{$shift->employee_count}}</span>
                                      </td>
                                      <td class="text-start px-md-12 px-6 py-6">
                                         @forelse($shift->days as $day)
                                              <span class="badge badge-light-primary"> {{ $day->type == 1 ? 'Pazartesi' : ($day->type == 2 ?  'Salı' : ($day->type == 3 ? 'Çarşamba' : ($day->type == 4 ? 'Perşembe' : ($day->type == 5 ? 'Cuma' : ($day->type == 6 ? 'Cumartesi' : 'Pazar'))))) }}</span>
                                              @empty
                                              <span class="badge badge-light-danger">Gün yok..</span>
                                         @endforelse
                                      </td>
                                     <td class="text-end px-md-12 px-6 py-4">
                                         <div class="text-end">
                                             <div class="d-flex align-items-center justify-content-end">
                                                 <a onclick="employee({{$shift->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                     <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor" />
                                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor" />
                                                        </svg>
                                                     </span>
                                                 </a>
                                                 <a onclick="modal({{$shift->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-gray-200i">
                                                     <span class="svg-icon svg-icon-3">
                                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                             <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                                             <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                                         </svg>
                                                     </span>
                                                 </a>
                                                 <a onclick="deleteShift('{{route('vardiyalar.delete',$shift->id)}}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm bg-gray-200i">
                                                     <span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                             <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                                             <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                                             <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
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
    </div>
    @endrole
</div>
<div class="modal fade draggable" id="kt_modal_create_shift" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form method="post" id="kt_modal_create_shift" class="form w-100 needs-validation" action="{{route('vardiyalar.store')}}">
                @csrf
                <div class="modal-header ui-draggable-handle py-5" id="kt_modal_add_customer_header">
                    <h3 class="fw-bolder">Vardiya Ekle</h3>
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
                <div class="modal-body py-5 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                         <div class="fv-row mb-5">
                             <label class="form-label fs-7">Vardiya Adı</label>
                             <input class="form-control form-control-lg bg-transparent @error('name') border-danger @enderror"  f type="text" name="name" value="{{old('name')}}" required="">
                             @error('name')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                        </div>
                         <div class="fv-row mb-5">
                             <label class="form-label fs-7">Günler</label>
                             <select name="type[]" class="form-select form-control-lg @error('type') border-danger @enderror" data-dropdown-parent="#kt_modal_create_shift" data-control="select2" multiple>
                                <option @selected(old('type' == 1)) value="1">Pazartesi</option>
                                <option @selected(old('type' == 2)) value="2">Salı</option>
                                <option @selected(old('type' == 3)) value="3">Çarşamba</option>
                                <option @selected(old('type' == 4)) value="4">Perşembe</option>
                                <option @selected(old('type' == 5)) value="5">Cuma</option>
                                <option @selected(old('type' == 6)) value="6">Cumartesi</option>
                                <option @selected(old('type' == 7)) value="7">Pazar</option>
                             </select>
                             @error('type')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                         <div class="col">
                         <div class="fv-row mb-5">
                             <label class="form-label fs-7">Giriş</label>
                             <input class="form-control form-control-lg bg-transparent @error('morning_entrance') border-danger @enderror" type="time" name="morning_entrance" value="{{old('morning_entrance')}}" required>
                             @error('morning_entrance')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                         </div>
                        </div>
                        <div class="col">
                          <div class="fv-row mb-5">
                              <label class="form-label fs-7">Çıkış</label>
                              <input class="form-control form-control-lg bg-transparent @error('morning_exit') border-danger @enderror" type="time" name="morning_exit" value="{{old('morning_exit')}}" required>
                              @error('morning_exit')
                              <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                              @enderror
                          </div>
                          </div>
                          </div>
                    </div>
                     {{-- <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                         <div class="col">
                             <div class="fv-row mb-5">
                                 <label class="form-label fs-7">Öğlen Giriş</label>
                                 <input class="form-control form-control-lg bg-transparent @error('noon_entrance') border-danger @enderror" type="time" name="noon_entrance" value="{{old('noon_entrance')}}" required>
                                 @error('noon_entrance')
                                 <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                 @enderror
                             </div>
                         </div>
                         <div class="col">
                             <div class="fv-row mb-5">
                                 <label class="form-label fs-7">Öğlen Çıkış</label>
                                 <input class="form-control form-control-lg bg-transparent @error('noon_exit') border-danger @enderror" type="time" name="noon_exit" value="{{old('noon_exit')}}" required>
                                 @error('noon_exit')
                                 <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                 @enderror
                             </div>
                         </div>
                     </div> --}}
                      <div class="fv-row mb-5">
                          <label class="form-label fs-7">Option</label>
                          <input class="form-control form-control-lg bg-transparent @error('option') border-danger @enderror" type="time" name="option" value="{{old('option')}}" required>
                          @error('option')
                          <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                          @enderror
                      </div>
                </div>
                <div class="modal-footer flex-center py-5">
                    <button class="btn btn-dark me-2 min-w-200px" data-bs-dismiss="modal" type="button"><span class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat</button>
                    <button type="submit" class="btn btn-primary min-w-200px"><i class="las la-check-double fs-2"></i>Vardiya Ekle </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade draggable" id="kt_modal_edit_shift" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered mw-650px py-2">
        <div class="modal-content">
            <form method="post" id="kt_modal_edit_shift_form" class="form w-100">
                @method('PUT')
                @csrf
                <div class="modal-header py-5">
                    <h3 class="fw-bolder">Vardiya Düzenle</h3>
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
                <div class="modal-body py-5 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-5">
                            <label class="form-label fw-bolder text-dark fs-6">Vardiya Adı</label>
                            <input class="form-control form-control-lg bg-transparent @error('update_name') border-danger @enderror" type="text" id="update_name" name="update_name" value="{{old('update_name')}}" required="">
                            @error('update_name')
                            <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                            @enderror
                        </div>
                      <div class="fv-row mb-5">
                             <label class="form-label fs-7">Durum</label>
                             <select name="status" class="form-select form-control-lg @error('status') border-danger @enderror" id="status-select" data-dropdown-parent="#kt_modal_edit_shift" data-control="select2">
                                 <option @selected(old('status'==0)) value="0">Pasif</option>
                                 <option @selected(old('status'==1)) value="1">Aktif</option>
                             </select>
                             @error('status')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                         </div>
                    </div>
                </div>
                <div class="modal-footer flex-center py-2">
                    <button class="btn btn-dark me-2 min-w-200px" data-bs-dismiss="modal" type="button"><span class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat</button>
                    <button type="submit" class="btn btn-primary min-w-200px"><i class="las la-check-double fs-2"></i>Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade draggable" id="kt_modal_add_employee" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered mw-650px py-2">
        <div class="modal-content">
            <form method="post" id="kt_modal_edit_emplooye_form" class="form w-100">
                @method('PUT')
                @csrf
                <div class="modal-header py-5">
                    <h3 class="fw-bolder">Vardiya Düzenle</h3>
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
                <div class="modal-body py-5 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                         <div class="position-relative w-100 me-md-2 mb-3">
                             <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                     </rect>
                                     <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                 </svg>
                             </span>
                             <input type="text" class="form-control form-control-lg ps-10" name="search" placeholder="Ara..">
                         </div>
                         @error('service')
                         <div class="alert alert-dismissible bg-light-danger d-flex justify-between text-danger border border-danger">
                             {{$message}}
                             <button type="button" class="position-absolute top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                 <i class="bi bi-x fs-1 text-danger"></i>
                             </button>
                         </div>
                         @enderror
                         <div class="d-flex flex-column border border-1 border-gray-300 pt-1 pb-1 card-rounded">
                             <div class="py-0">
                                 <div class="mh-450px scroll-y me-n0 pe-0" id="employees">

                                 </div>
                             </div>
                         </div>
                    </div>
                </div>
                <div class="modal-footer flex-center py-2">
                    <button class="btn btn-dark me-2 min-w-200px" data-bs-dismiss="modal" type="button"><span class="icon-x"></span><i class="las la-reply-all fs-2"></i>Kapat</button>
                    <button type="submit" class="btn btn-primary min-w-200px"><i class="las la-check-double fs-2"></i>Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('backend/js/datatable.js')}}"></script>
<script>
     $('input[name="search"]').on('input', function() {
        var value = $(this).val().toLowerCase();
        var found = false;
        $('#employees .rounded').each(function() {
            var text = $(this).find('#adi .fs-5').text().toLowerCase();
            var match = text.indexOf(value) > -1;
            $(this).toggle(match);
            found = found || match;
        });
        if (!found) {
            $('#employees').append(`<div class="not-found rounded bg-active-lighten p-4 active">
           <div class="d-flex align-items-center">
            <div class="ms-5">
                <div href="#"class="fs-5 fw-bold text-gray-600 text-hover-primary mb-2">Sonuç bulunamadı</div>
            </div></div></div>`);
        }else{

        $('#employees .not-found').remove();
        }
    });

    function modal(id)
    {
        localStorage.setItem('id',id);
        var Ajaxurl = '{{ route('vardiyalar.show', ':id') }}';
        Ajaxurl = Ajaxurl.replace(':id', id);
        var url = '{{ route('vardiyalar.update', ':id') }}';
        url = url.replace(':id', id);
         $.ajax({
            type: "get",
            url: Ajaxurl,
            data: {id: id},
            success: function (response) {
                $('#update_name').val(response.shift.name);
                 var status = response.shift.status ? 1 : 0;
                 var statusSelect = $('#status-select').select2();
                 statusSelect.find('option').each(function() {
                 var optionValue = $(this).val();
                 if (optionValue == status) {
                 $(this).prop('selected', true);
                 statusSelect.trigger('change');
                 }
                 });
                $('#kt_modal_edit_shift_form').attr('action',url);
                $('#kt_modal_edit_shift').modal('show');
            }
         });
    }

    function deleteShift(url){
      Swal.fire({
          title: 'Uyarı!',
          text:'Vardiyayı Silmek istediğinizden emin misiniz?',
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
    function employee(id)
    {
        localStorage.setItem('id',id);
        var Ajaxurl = '{{ route('employees', ':id') }}';
        Ajaxurl = Ajaxurl.replace(':id', id);
        var url = '{{ route('vardiyalar.employee', ':id') }}';
        url = url.replace(':id', id);


         $.ajax({
            type: "get",
            url: Ajaxurl,
            data: {id: id,method:"edit"},
            success: function (response) {
                var html = '';
                response.employees.forEach(employee => {
                     html+= `<div class="rounded bg-active-lighten p-4 active">
                         <div class="d-flex align-items-center">
                             <label class="form-check form-check-custom form-check-solid- me-5">
                                 <input class="form-check-input" type="checkbox" name="employee[]" ${ employee.shift_id == id ? 'checked' : ''} value="${employee.id}">
                             </label>
                             <div class="ms-5" id="adi">
                                 <div class="fs-5 fw-bold text-gray-700 text-hover-primary mb-2">
                                     ${employee.name}
                                     <div class="fw-semibold text-muted">${employee.department.name}</div>
                                 </div>
                             </div>
                         </div>
                     </div>`;
                });

                $('#kt_modal_edit_emplooye_form').attr('action',url);
                $('#employees').html(html);
                $('#kt_modal_add_employee').modal('show');
            }
         });
    }
</script>
@if(array_intersect($modals['create'], $errors->keys()))
<script>
   $(document).ready(() => {
     setTimeout(() => {
         $('#kt_modal_create_shift').modal('show');
     }, 500);
   });
</script>
@endif
@if(array_intersect($modals['edit'], $errors->keys()))
<script>
    $(document).ready(() => {
       var url = '{{ route('kullanicilar.update', ':id') }}';
       url = url.replace(':id', localStorage.getItem('id'));
       $('#kt_modal_edit_shift_form').attr('action',url);
       setTimeout(() => {
         $('#kt_modal_edit_shift').modal('show');
       }, 500);
    });
</script>
@endif
<script>
    $(document).ready(function () {
  $('#addButton').on('click', function (e) {
    e.preventDefault(); // Prevent default link behavior

    $.ajax({
      url: "{{ route('vardiyalar.show') }}",
      method: "GET",
      success: function (response) {
        if (response.limitReached) {
          Swal.fire({
              title: "Maximum Limite Ulaşıldı",
              text: "Herhangi bir değişiklik yapmak için lütfen şirketimiz ile iletişime geçiniz",
              icon: "warning"
          });
        } else {
          $('#kt_modal_create_shift').modal('show'); // Show the modal if limit is not reached
        }
      },
      error: function () {
        alert('Error checking department limit.');
      }
    });
  });
});
</script>
@endsection
