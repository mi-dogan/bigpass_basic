@extends('back.layouts.master')
@section('title','Kullanıcı Ekle')
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
                    <li class="breadcrumb-item text-muted">Kullanıcılar</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{route('kullanicilar.index')}}" class="btn btn-sm btn-primary">Geri Dön</a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card card-bordered h-lg-100" id="kt_contacts_main">
                <div class="card-header">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Kullanıcı Ekle
                            <div class="fs-8 text-gray-600 mt-1">Sisteme bu bölümden kullanıcı ekleyebilirsiniz.</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-5">
                    <form method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data" action="{{route('kullanicilar.store')}}">
                        @csrf
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('backend/media/svg/avatars/blank.svg')}})">
                            <div class="image-input-wrapper w-100px h-100px object-fit-cover" style="background-image: url({{asset('backend/media/svg/avatars/blank.svg')}})"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Avatar'ı Değiştir">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Ad Soyad</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="text" class="form-control form-control-solid @error('name') border-danger @enderror" name="name" value="{{old('name')}}" required>
                                    @error('name')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Ünvan</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="text" class="form-control form-control-solid @error('degree') border-danger @enderror" name="degree" value="{{old('degree')}}" required>
                                    @error('degree')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">E-posta Adresi</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="email" class="form-control form-control-solid @error('email') border-danger @enderror" name="email" value="{{old('email')}}" required>
                                    @error('email')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Telefon Numarası</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="number" class="form-control form-control-solid  @error('phone') border-danger @enderror" name="phone" value="{{old('phone')}}" required>
                                    @error('phone')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Erişim Türü</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid  @error('role_id') border-danger @enderror" data-control="select2" data-placeholder="Erişim Türü Seçiniz" name="role_id" required>
                                        @foreach ($roles as $role)
                                            <option @selected(old('role_id') == $role->id) value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                     </select>
                                      @error('role_id')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Pozisyon</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid  @error('position_id') border-danger @enderror" data-control="select2" data-placeholder="Pozisyon Seçiniz" name="position_id" required>
                                        @foreach ($positions as $position)
                                            <option @selected(old('position_id') == $position->id) value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                     @error('position_id')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Şube</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid @error('branch_id') border-danger @enderror" data-control="select2" data-placeholder="Şube Seçiniz" name="branch_id"  required>
                                       @foreach ($branchs as $branch)
                                            <option @selected(old('branch_id') == $branch->id) value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                    </select>
                                     @error('branch_id')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Departman</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid @error('department_id') border-danger @enderror" data-control="select2" data-placeholder="Departman Seçiniz" name="department_id" required>
                                        @foreach ($departments as $department)
                                            <option @selected(old('department_id') == $department->id) value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                     @error('department_id')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-1 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Şifre</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="password" class="form-control form-control-solid @error('password') border-danger @enderror" name="password"  value="{{old('password')}}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Şifre Tekrar</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="password" class="form-control form-control-solid" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-secondary">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Kişisel Bilgiler
                                <div class="fs-8 text-gray-600 mt-1">Kişisel bilgileri buradan ekleyebilirsiniz.</div>
                            </h3>
                        </div>
                        <hr class="bg-secondary">
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Medeni Hali</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid @error('marital_status') border-danger @enderror" data-control="select2" data-placeholder="Medeni Hali seçiniz" name="marital_status" required>
                                        <option @selected(old('marital_status') == 0) value="0">Bekar</option>
                                        <option @selected(old('marital_status') == 1) value="1">Evli</option>
                                    </select>
                                      @error('name')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Engel Durumu</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid @error('obstacle_rating') border-danger @enderror" data-control="select2" data-placeholder="Engel Durumu Seçiniz" name="obstacle_rating" required>
                                        <option @selected(old('obstacle_rating') == 0) value="0">Yok</option>
                                        <option @selected(old('obstacle_rating') == 1) value="1">Zihinsel</option>
                                        <option @selected(old('obstacle_rating') == 2) value="2">El veya Ayak</option>
                                        <option @selected(old('obstacle_rating') == 3) value="3">Göz veya Kulak</option>
                                    </select>
                                     @error('obstacle_rating')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Uyruk</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="text" class="form-control form-control-solid @error('nationality') border-danger @enderror" name="nationality" value="{{old('nationality')}}" required>
                                     @error('nationality')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Çocuk Sayısı</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="number" class="form-control form-control-solid @error('child_count') border-danger @enderror" name="child_count" value="{{old('child_count')}}" required>
                                     @error('child_count')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-1 rol-cols-md-1 row-cols-lg-1">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Eğitim Seviyesi</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid @error('educational_level') border-danger @enderror" data-control="select2" data-placeholder="Eğitim Seviyesi Seçiniz" name="educational_level" value="">
                                        <option @selected(old('educational_level') == 0)  value="0">Yok</option>
                                        <option @selected(old('educational_level') == 1)  value="1">İlkokul</option>
                                        <option @selected(old('educational_level') == 2)  value="2">Ortaokul</option>
                                        <option @selected(old('educational_level') == 3)  value="3">Lise</option>
                                        <option @selected(old('educational_level') == 4)  value="4">Üniversite</option>
                                        <option @selected(old('educational_level') == 5)  value="5">Yüksek Lisans</option>
                                    </select>
                                      @error('educational_level')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Adres</span>
                                <i class="ki-duotone ki-information fs-7">
                            </label>
                            <textarea name="adress" cols="30" rows="5" class="form-control form-control-solid @error('adress') border-danger @enderror">{{old('adress')}}</textarea>
                             @error('adress')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                        </div>
                        <hr class="bg-secondary">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Acil Durum Bilgisi Ekle
                                <div class="fs-8 text-gray-600 mt-1">Acil durum bilgisini buradan ekleyebilirsiniz.</div>
                            </h3>
                        </div>
                        <hr class="bg-secondary">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Ad Soyad</span>
                                <i class="ki-duotone ki-information fs-7">
                            </label>
                            <input type="text" class="form-control form-control-solid @error('urgent_name') border-danger @enderror" name="urgent_name" value="{{old('urgent_name')}}" required>
                             @error('urgent_name')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Yakınlık Derecesi</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <select class="form-control form-control-solid @error('proximity') border-danger @enderror" data-control="select2" data-placeholder="Yakınlık Derecesi Seçiniz" name="proximity" required>
                                        <option @selected(old('proximity') == 0)  value="0">Baba</option>
                                        <option @selected(old('proximity') == 1)  value="1">Anne</option>
                                        <option @selected(old('proximity') == 2)  value="2">Kardeş - Abi</option>
                                        <option @selected(old('proximity') == 3)  value="3">Akraba - Arkadaş</option>
                                    </select>
                                     @error('proximity')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Telefon Numarası</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="number" class="form-control form-control-solid @error('urgent_phone') border-danger @enderror" name="urgent_phone" value="{{old('urgent_phone')}}" required>
                                    @error('urgent_phone')

                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="bg-secondary">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Özlük Bilgisi Ekle
                                <div class="fs-8 text-gray-600 mt-1">Özlük bilgisini buradan ekleyebilirsiniz.</div>
                            </h3>
                        </div>
                        <hr class="bg-secondary">
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Sicil No</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                     <input type="number" class="form-control form-control-solid @error('registration_number') bgd-danger @enderror" name="registration_number" value="{{old('registration_number')}}" required>
                                     @error('registration_number')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">TC Kimlik No</span>
                                        <i class="ki-duotone ki-information fs-7">
                                    </label>
                                    <input type="number" class="form-control form-control-solid  @error('identification_number') bgd-danger @enderror" name="identification_number" value="{{old('identification_number')}}" required>
                                    @error('identification_number')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                         <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                             <div class="col">
                                 <div class="fv-row mb-7">
                                     <label class="fs-6 fw-semibold form-label mt-3">
                                         <span class="required">Nüfusa Bağlı İl</span>
                                         <i class="ki-duotone ki-information fs-7">
                                     </label>
                                     <select class="form-control form-control-solid @error('city_id') border-danger @enderror" id="city-select" data-control="select2" data-placeholder="İl Seçiniz" name="city_id" required>
                                         <option value="none" selected disabled hidden>-Seçiniz-</option>
                                          @foreach ($cities as $city)
                                          <option @selected(old('city_id')==$city->id ) value="{{$city->id}}" data-id="{{$city->id}}">{{$city->name}}</option>
                                          @endforeach
                                     </select>
                                     @error('city_id')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="fv-row mb-7">
                                     <label class="fs-6 fw-semibold form-label mt-3">
                                         <span class="required">Nüfusa Bağlı İlçe</span>
                                         <i class="ki-duotone ki-information fs-7">
                                     </label>
                                     <select class="form-control form-control-solid @error('district_id') border-danger @enderror" data-control="select2" id="district-select" data-placeholder="İlçe Seçiniz" name="district_id" required>
                                         <option value="none" selected disabled hidden>-Seçiniz-</option>
                                         @if(session()->has('districts'))
                                         @foreach (session()->get('districts') as $district)
                                         <option @selected(old('district_id')==$district->id) value="{{$district->id}}">{{$district->name}}</option>
                                         @endforeach
                                         @endisset
                                     </select>
                                      @error('district_id')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                 </div>
                             </div>
                         </div>
                         <div class="fv-row mb-7">
                             <label class="fs-6 fw-semibold form-label mt-3">
                                 <span class="required">Mahalle Köy</span>
                                 <i class="ki-duotone ki-information fs-7">
                             </label>
                             <input type="text" class="form-control form-control-solid @error('neighbourhood') border-danger @enderror" name="neighbourhood" value="{{old('neighbourhood')}}" required>
                              @error('neighbourhood')
                              <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                              @enderror
                         </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Baba Adı</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                       <input type="text" class="form-control form-control-solid  @error('father_name') border-danger @enderror" name="father_name" value="{{old('father_name')}}" required>
                                       @error('father_name')
                                       <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                       @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Anne Adı</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                       <input type="text" class="form-control form-control-solid @error('mother_name') border-danger @enderror" name="mother_name" value="{{old('mother_name')}}" required>
                                        @error('mother_name')
                                       <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                       @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Doğum Yeri İl</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <select class="form-control form-control-solid @error('birth_city_id') border-danger @enderror" id="birthdate-city-select" data-control="select2" data-placeholder="İl Seçiniz" name="birth_city_id" required>
                                          <option value="none" selected disabled hidden>-Seçiniz-</option>
                                          @foreach ($cities as $city)
                                          <option @selected(old('birth_city_id')==$city->id ) value="{{$city->id}}" data-id="{{$city->id}}">{{$city->name}}</option>
                                          @endforeach
                                      </select>
                                      @error('birth_city_id')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Doğum Yeri İlçe</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <select class="form-control form-control-solid @error('birth_district_id') border-danger @enderror" data-control="select2" id="birthdate-district-select" data-placeholder="İlçe Seçiniz" name="birth_district_id" required>
                                          <option value="none" selected disabled hidden>-Seçiniz-</option>
                                          @if(session()->has('birth_districts'))
                                          @foreach (session()->get('birth_districts') as $district)
                                          <option @selected(old('birth_district_id')==$district->id) value="{{$district->id}}">{{$district->name}}</option>
                                          @endforeach
                                          @endisset
                                      </select>
                                      @error('birth_district_id')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                           <div class="col">
                               <div class="fv-row mb-7">
                                   <label class="fs-6 fw-semibold form-label mt-3">
                                       <span class="required">Doğum Tarihi</span>
                                       <i class="ki-duotone ki-information fs-7">
                                   </label>
                                   <input type="date" class="form-control form-control-solid @error('birthdate') border-danger @enderror" name="birthdate" value="{{old('birthdate')}}" required>
                                   @error('birthdate')
                                   <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                   @enderror
                               </div>
                           </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Cilt No</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('volume_number') border-danger @enderror" name="volume_number" value="{{old('volume_number')}}" required>
                                       @error('volume_number')
                                       <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                       @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Sıra No</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('serial_number') border-danger @enderror" name="serial_number" value="{{old('serial_number')}}" required>
                                        @error('serial_number')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Aile Sıra No</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('family_serial_number') border-danger @enderror" name="family_serial_number" value="{{old('family_serial_number')}}" required>
                                        @error('family_serial_number')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Kart No</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <input type="number" class="form-control form-control-solid @error('card_no') border-danger @enderror" name="card_no" value="{{old('card_no')}}" required>
                                      @error('card_no')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Kan Grubu</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                     <select class="form-control form-control-solid @error('blood_group') border-danger @enderror" data-control="select2" data-placeholder="Kan Grubu Seçiniz" name="blood_group" required>
                                         <option value="">Kan Grubu Seçiniz</option>
                                         <option {{ old('blood_group') == 0 ? 'selected' : '' }} value="0">A Rh pozitif (A+)</option>
                                         <option {{ old('blood_group') == 1 ? 'selected' : '' }} value="1">A Rh negatif (A-)</option>
                                         <option {{ old('blood_group') == 2 ? 'selected' : '' }} value="2">B Rh pozitif (B+)</option>
                                         <option {{ old('blood_group') == 3 ? 'selected' : '' }} value="3">B Rh negatif (B-)</option>
                                         <option {{ old('blood_group') == 4 ? 'selected' : '' }} value="4">AB Rh pozitif (AB+)</option>
                                         <option {{ old('blood_group') == 5 ? 'selected' : '' }} value="5">AB Rh negatif (AB-)</option>
                                         <option {{ old('blood_group') == 6 ? 'selected' : '' }} value="6">0 Rh pozitif (0+)</option>
                                         <option {{ old('blood_group') == 7 ? 'selected' : '' }} value="7">0 Rh negatif (0-)</option>
                                     </select>
                                      @error('blood_group')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span class="required">Emekli Sicil No</span>
                                          <i class="ki-duotone ki-information fs-7">
                                      </label>
                                      <input type="number" class="form-control form-control-solid @error('retired_registration_number') border-danger @enderror" name="retired_registration_number" value="{{old('retired_registration_number')}}" required>
                                       @error('retired_registration_number')
                                       <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                       @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="fv-row mb-7">
                              <label class="fs-6 fw-semibold form-label mt-3">
                                  <span class="required">İmza Bilgileri</span>
                                  <i class="ki-duotone ki-information fs-7">
                              </label>
                              <input type="text" class="form-control form-control-solid" name="signature" value="" required>
                          </div>
                        <div class="separator mb-6"></div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('kullanicilar.index')}}" class="btn btn-light me-3">
                                Vazgeç
                            </a>
                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Kaydet
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @role('admin|superadmin|Firma Yetkilisi')
</div>
@endsection
@section('js')
<script>
     $('#city-select').change(function() {
            const self = $(this);
            $.ajax({
                type: "POST",
                url: "{{ route('district') }}",
                data: {
                    id: this.options[this.selectedIndex]?.getAttribute('data-id')
                },
                success: function(response) {
                    $('#district-select').html('');
                    $('#district-select').html(
                        '<option value="none" selected disabled hidden>-Seçiniz-</option>');
                    if (response.districts.length > 0) {
                        response.districts.forEach(element => {
                            const opt = document.createElement('option');
                            opt.setAttribute('value', element.id);
                            opt.textContent = element.name;
                            $('#district-select').append(opt);
                        });
                    } else {
                        $('#district-select').html(
                            '<option value="none" selected disabled hidden>-Seçiniz-</option>');
                    }
                }
            });
        });
         $('#birthdate-city-select').change(function() {
            const self = $(this);
            $.ajax({
                type: "POST",
                url: "{{ route('district') }}",
                data: {
                    id: this.options[this.selectedIndex]?.getAttribute('data-id')
                },
                success: function(response) {
                    $('#birthdate-district-select').html('');
                    $('#birthdate-district-select').html(
                        '<option value="none" selected disabled hidden>-Seçiniz-</option>');
                    if (response.districts.length > 0) {
                        response.districts.forEach(element => {
                            const opt = document.createElement('option');
                            opt.setAttribute('value', element.id);
                            opt.textContent = element.name;
                            $('#birthdate-district-select').append(opt);
                        });
                    } else {
                        $('#birthdate-district-select').html(
                            '<option value="none" selected disabled hidden>-Seçiniz-</option>');
                    }
                }
            });
        });
</script>
@endsection
