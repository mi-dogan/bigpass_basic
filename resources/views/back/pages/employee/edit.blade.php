@extends('back.layouts.master')
@section('title','Çalışan Düzenle')
@section('content')
<div class="d-flex flex-column flex-column-fluid">
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
                    <li class="breadcrumb-item text-muted">Çalışanlar</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{route('calisanlar.index')}}" class="btn btn-sm btn-primary">Geri Dön</a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card card-bordered h-lg-100" id="kt_contacts_main">
                <div class="card-header">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Çalışan Düzenle
                            <div class="fs-8 text-gray-600 mt-1">Sisteme bu bölümden Çalışan Düzenleyebilirsiniz.</div>
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-5">
                    <form method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data" action="{{route('calisanlar.update',$employee->id)}}">
                        @csrf
                        @method('put')
                        {{-- <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset($employee->profile_img)}})">
                            <div class="image-input-wrapper w-100px h-100px object-fit-cover" style="background-image: url({{asset($employee->profile_img)}})"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Avatar'ı Değiştir">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                        </div> --}}
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Ad Soyad</span>
                                    
                                    </label>
                                    <input type="text" class="form-control form-control-solid @error('name') border-danger @enderror" name="name" value="{{old('name') ?? $employee->name}}" required>
                                    @error('name')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Ünvan</span>
                                    
                                    </label>
                                    <input type="text" class="form-control form-control-solid @error('degree') border-danger @enderror" name="degree" value="{{old('degree') ?? $employee->degree}}" required>
                                    @error('degree')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                           {{-- @role('superadmin') --}}
                            <div class="col">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Departman</span>
                                    
                                    </label>
                                    <select class="form-control form-control-solid @error('department_id') border-danger @enderror" data-control="select2" data-placeholder="Departman Seçiniz" data-allow-clear="true" name="department_id" required>
                                        @foreach ($departments as $department)
                                        <option @selected($employee->card->department_id == $department->id) value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- @endrole --}}
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Pozisyon</span>
                                    
                                    </label>
                                    <select class="form-control form-control-solid  @error('position_id') border-danger @enderror" data-control="select2" data-placeholder="Pozisyon Seçiniz" data-allow-clear="true" name="position_id" required>
                                        @foreach ($positions as $position)
                                        <option @selected($employee->card->position_id == $position->id) value="{{$position->id}}">{{$position->name}}</option>
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
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">E-posta Adresi</span>
                                    
                                    </label>
                                    <input type="email" class="form-control form-control-solid @error('email') border-danger @enderror" name="email" value="{{old('email') ?? $employee->email}}" required>
                                    @error('email')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Şifre</span>
                                    </i>
                                    </label>
                                    <input type="password" class="form-control form-control-solid  @error('password') border-danger @enderror" name="password" value="{{old('password')}}">
                                    @error('password')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                         <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Telefon Numarası</span>
                                    </i>
                                    </label>
                                    <input type="number" class="form-control form-control-solid  @error('phone') border-danger @enderror" name="phone" value="{{old('phone') ?? $employee->phone}}" required>
                                    @error('phone')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Vardiya</span>
                            
                            </label>
                            <select class="form-control form-control-solid  @error('shift_id') border-danger @enderror" data-control="select2" data-placeholder="Vardiya Seçiniz" data-allow-clear="true" name="shift_id">
                                <option value="none" selected disabled hidden>-Seçiniz-</option>
                                @foreach ($shifts as $shift)
                                <option @selected($shift->id == $employee->shift_id) value="{{$shift->id}}">{{$shift->name}}</option>
                                @endforeach
                            </select>
                            @error('shift_id')
                            <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                            @enderror
                        </div>
                    </div>   
                    <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Kart No</span>
                            
                            </label>
                            <input type="text" class="form-control form-control-solid @error('card_no') border-danger @enderror" name="card_no" value="{{old('card_no') ?? $employee->card->card_no}}" required>
                            @error('card_no')
                            <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                        <hr class="bg-secondary">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Kişisel Bilgiler
                                <div class="fs-8 text-gray-600 mt-1">Kişisel bilgileri buradan Düzenleyebilirsiniz.</div>
                            </h3>
                        </div>
                        <hr class="bg-secondary">
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Medeni Hali</span>
                                    
                                    </label>
                                    <select class="form-control form-control-solid @error('marital_status') border-danger @enderror" data-control="select2" data-placeholder="Medeni Hali seçiniz" name="marital_status">
                                        <option @selected($employee->information->marital_status == 0) value="0">Bekar</option>
                                        <option @selected($employee->information->marital_status == 1) value="1">Evli</option>
                                    </select>
                                      @error('name')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Engel Durumu</span>
                                    
                                    </label>
                                    <select class="form-control form-control-solid @error('obstacle_rating') border-danger @enderror" data-control="select2" data-placeholder="Engel Durumu Seçiniz" name="obstacle_rating">
                                        <option @selected($employee->information->obstacle_rating == 0) value="0">Yok</option>
                                        <option @selected($employee->information->obstacle_rating == 1) value="1">Zihinsel</option>
                                        <option @selected($employee->information->obstacle_rating == 2) value="2">El veya Ayak</option>
                                        <option @selected($employee->information->obstacle_rating == 3) value="3">Göz veya Kulak</option>

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
                                        <span>Uyruk</span>
                                    
                                    </label>
                                    <input type="text" class="form-control form-control-solid @error('nationality') border-danger @enderror" name="nationality" value="{{$employee->information->nationality  ?? old('nationality')}}">
                                     @error('nationality')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Çocuk Sayısı</span>
                                    
                                    </label>
                                    <input type="number" class="form-control form-control-solid @error('child_count') border-danger @enderror" name="child_count" value="{{old('child_count') ?? $employee->information->child_count}}">
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
                                        <span>Eğitim Seviyesi</span>
                                    
                                    </label>
                                    <select class="form-control form-control-solid @error('educational_level') border-danger @enderror" data-control="select2" data-placeholder="Eğitim Seviyesi Seçiniz" name="educational_level">
                                        <option @selected($employee->information->educational_level == 0)  value="0">Yok</option>
                                        <option @selected($employee->information->educational_level == 1)  value="1">İlkokul</option>
                                        <option @selected($employee->information->educational_level == 2)  value="2">Ortaokul</option>
                                        <option @selected($employee->information->educational_level == 3)  value="3">Lise</option>
                                        <option @selected($employee->information->educational_level == 4)  value="4">Üniversite</option>
                                        <option @selected($employee->information->educational_level == 5)  value="5">Yüksek Lisans</option>
                                    </select>
                                      @error('educational_level')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Adres</span>
                            
                            </label>
                            <textarea name="adress" cols="30" rows="5" class="form-control form-control-solid @error('adress') border-danger @enderror">{{old('adress') ?? $employee->information->adress}}</textarea>
                             @error('adress')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                        </div>
                        <hr class="bg-secondary">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Acil Durum Bilgisi Düzenle
                                <div class="fs-8 text-gray-600 mt-1">Acil durum bilgisini buradan Düzenleyebilirsiniz.</div>
                            </h3>
                        </div>
                        <hr class="bg-secondary">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>Ad Soyad</span>
                            
                            </label>
                            <input type="text" class="form-control form-control-solid @error('urgent_name') border-danger @enderror" name="urgent_name" value="{{old('urgent_name') ?? $employee->urgent->name}}">
                             @error('urgent_name')
                             <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                             @enderror
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Yakınlık Derecesi</span>
                                    
                                    </label>
                                    <select class="form-control form-control-solid @error('proximity') border-danger @enderror" data-control="select2" data-placeholder="Yakınlık Derecesi Seçiniz" name="proximity">
                                        <option @selected($employee->urgent->proximity == 0)  value="0">Baba</option>
                                        <option @selected($employee->urgent->proximity == 1)  value="1">Anne</option>
                                        <option @selected($employee->urgent->proximity == 2)  value="2">Kardeş - Abi</option>
                                        <option @selected($employee->urgent->proximity == 3)  value="3">Akraba - Arkadaş</option>
                                    </select>
                                     @error('proximity')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Telefon Numarası</span>
                                    
                                    </label>
                                    <input type="number" class="form-control form-control-solid @error('urgent_phone') border-danger @enderror" name="urgent_phone" value="{{old('urgent_phone') ?? $employee->urgent->phone}}">
                                    @error('proximity')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="bg-secondary">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">Özlük Bilgisi Düzenle
                                <div class="fs-8 text-gray-600 mt-1">Özlük bilgisini buradan Düzenleyebilirsiniz.</div>
                            </h3>
                        </div>
                        <hr class="bg-secondary">
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Sicil No</span>
                                    </label>
                                     <input type="number" class="form-control form-control-solid @error('registration_number') border-danger @enderror" name="registration_number" value="{{old('registration_number') ?? $employee->card->registration_number}}">
                                     @error('registration_number')
                                     <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>TC Kimlik No</span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid  @error('identification_number') border-danger @enderror" name="identification_number" value="{{old('identification_number') ?? $employee->card->identification_number}}">
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
                                         <span>Nüfusa Bağlı İl</span>
                                     
                                     </label>
                                     <select class="form-control form-control-solid @error('city_id') border-danger @enderror" id="city-select" data-control="select2" data-placeholder="İl Seçiniz" name="city_id">
                                         <option value="none" selected disabled hidden>-Seçiniz-</option>
                                          @foreach ($cities as $city)
                                          <option @selected($employee->card->city_id ==$city->id ) value="{{$city->id}}" data-id="{{$city->id}}">{{$city->name}}</option>
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
                                         <span>Nüfusa Bağlı İlçe</span>
                                     
                                     </label>
                                     <select class="form-control form-control-solid @error('district_id') border-danger @enderror" data-control="select2" id="district-select" data-placeholder="İlçe Seçiniz" name="district_id">
                                         <option value="none" selected disabled hidden>-Seçiniz-</option>
                                         @foreach ($employee->card->districts as $district)
                                         <option @selected($employee->card->district_id ==$district->id) value="{{$district->id}}">{{$district->name}}</option>
                                         @endforeach
                                     </select>
                                      @error('district_id')
                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                    @enderror
                                 </div>
                             </div>
                         </div>
                         <div class="fv-row mb-7">
                             <label class="fs-6 fw-semibold form-label mt-3">
                                 <span>Mahalle Köy</span>
                             
                             </label>
                             <input type="text" class="form-control form-control-solid @error('neighbourhood') border-danger @enderror" name="neighbourhood" value="{{old('neighbourhood') ?? $employee->card->neighbourhood}}">
                              @error('neighbourhood')
                              <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                              @enderror
                         </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span>Baba Adı</span>
                                      
                                      </label>
                                       <input type="text" class="form-control form-control-solid  @error('father_name') border-danger @enderror" name="father_name" value="{{old('father_name') ?? $employee->card->father_name}}">
                                       @error('father_name')
                                       <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                       @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span>Anne Adı</span>
                                      
                                      </label>
                                       <input type="text" class="form-control form-control-solid @error('mother_name') border-danger @enderror" name="mother_name" value="{{old('mother_name') ?? $employee->card->mother_name}}">
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
                                          <span>Doğum Yeri İl</span>
                                      
                                      </label>
                                      <select class="form-control form-control-solid @error('birth_city_id') border-danger @enderror" id="birthdate-city-select" data-control="select2" data-placeholder="İl Seçiniz" name="birth_city_id">
                                          <option value="none" selected disabled hidden>-Seçiniz-</option>
                                          @foreach ($cities as $city)
                                          <option @selected($employee->card->birth_city_id  ==$city->id ) value="{{$city->id}}" data-id="{{$city->id}}">{{$city->name}}</option>
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
                                          <span>Doğum Yeri İlçe</span>
                                      
                                      </label>
                                      <select class="form-control form-control-solid @error('birth_district_id') border-danger @enderror" data-control="select2" id="birthdate-district-select" data-placeholder="İlçe Seçiniz" name="birth_district_id">
                                          <option value="none" selected disabled hidden>-Seçiniz-</option>
                                          @foreach ($employee->card->birthdistricts as $district)
                                          <option @selected($employee->card->birth_district_id ==$district->id) value="{{$district->id}}">{{$district->name}}</option>
                                          @endforeach
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
                                       <span>Doğum Tarihi</span>
                                   
                                   </label>
                                   <input type="date" class="form-control form-control-solid @error('birthdate') border-danger @enderror" name="birthdate" value="{{old('birthdate') ?? $employee->card?->birthdate?->format('Y-m-d')}}">
                                   @error('birthdate')
                                   <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                   @enderror
                               </div>
                           </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span>Cilt No</span>
                                      
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('volume_number') border-danger @enderror" name="volume_number" value="{{old('volume_number') ?? $employee->card->volume_number}}">
                                       @error('volume_number')
                                       <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                       @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span>Sıra No</span>
                                      
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('serial_number') border-danger @enderror" name="serial_number" value="{{old('serial_number') ?? $employee->card->serial_number}}">
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
                                          <span>Aile Sıra No</span>
                                      
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('family_serial_number') border-danger @enderror" name="family_serial_number" value="{{old('family_serial_number') ?? $employee->card->family_serial_number}}">
                                        @error('family_serial_number')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                  </div>
                              </div>
                              <div class="col">

                              </div>
                          </div>
                          <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span>Kan Grubu</span>
                                      
                                      </label>
                                     <select class="form-control form-control-solid @error('blood_group') border-danger @enderror" data-control="select2" data-placeholder="Kan Grubu Seçiniz" name="blood_group">
                                         <option value="">Kan Grubu Seçiniz</option>
                                         <option {{ $employee->card->blood_group == 0 ? 'selected' : '' }} value="0">A Rh pozitif (A+)</option>
                                         <option {{ $employee->card->blood_group == 1 ? 'selected' : '' }} value="1">A Rh negatif (A-)</option>
                                         <option {{ $employee->card->blood_group == 2 ? 'selected' : '' }} value="2">B Rh pozitif (B+)</option>
                                         <option {{ $employee->card->blood_group == 3 ? 'selected' : '' }} value="3">B Rh negatif (B-)</option>
                                         <option {{ $employee->card->blood_group == 4 ? 'selected' : '' }} value="4">AB Rh pozitif (AB+)</option>
                                         <option {{ $employee->card->blood_group == 5 ? 'selected' : '' }} value="5">AB Rh negatif (AB-)</option>
                                         <option {{ $employee->card->blood_group == 6 ? 'selected' : '' }} value="6">0 Rh pozitif (0+)</option>
                                         <option {{ $employee->card->blood_group == 7 ? 'selected' : '' }} value="7">0 Rh negatif (0-)</option>
                                     </select>
                                      @error('card_no')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="fv-row mb-7">
                                      <label class="fs-6 fw-semibold form-label mt-3">
                                          <span>Emekli Sicil No</span>
                                      
                                      </label>
                                      <input type="text" class="form-control form-control-solid @error('retired_registration_number') border-danger @enderror" name="retired_registration_number" value="{{old('retired_registration_number') ?? $employee->card->retired_registration_number}}">
                                       @error('retired_registration_number')
                                      <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          {{-- <div class="fv-row mb-7">
                              <label class="fs-6 fw-semibold form-label mt-3">
                                  <span class="required">İmza Bilgileri</span>
                              
                              </label>
                              <input type="text" class="form-control form-control-solid" name="signature" value="{{old('signature') ?? $employee->card->signature}}" required>
                          </div> --}}
                        <div class="separator mb-6"></div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('calisanlar.index')}}" class="btn btn-light me-3">
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
