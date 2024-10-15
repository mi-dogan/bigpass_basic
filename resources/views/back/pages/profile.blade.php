@extends('back.layouts.master')
@section('title','Profilim')
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Hesabım</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-5 mb-xl-5">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{auth()->user()->profile_img}}" alt="{{auth()->user()->name}}" class="object-fit-cover w-80px h-80px" />
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{auth()->user()->name}}</a>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
                                                        <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
                                                        <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
                                                    </svg>
                                                </span>{{auth()->user()->name}}</a>
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                               Türkiye</a>
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                                        <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                {{auth()->user()->email}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        {{-- <div class="d-flex flex-wrap">
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px w-100 w-sm-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="700" data-kt-countup-prefix="₺">0</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Kazanç</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px w-100 w-sm-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                                            <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">İşlemler</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px w-100 w-sm-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Bitirme Oranı</div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-5">
                    <div class="card-header border-0 py-4 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="card-title m-0 py-0">
                            <h3 class="fw-bold m-0">Kişisel Bilgiler</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="kt_account_profile_details_form" class="form" method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                            <div class="image-input-wrapper w-100px h-100px object-fit-cover" style="background-image: url('{{auth()->user()->profile_img}}')"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Avatar'ı Değiştir">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Ad Soyad</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="name" class="form-control form-control-lg form-control-solid @error('name') border-danger @enderror" placeholder="Ad Soyad" value="{{old('name') ?? auth()->user()->name}}" required>
                                                @error('name')
                                                <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">E-posta Adresi</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="email" name="email" class="form-control form-control-lg form-control-solid disabled" placeholder="E-posta Adresi" value="{{auth()->user()->email}}" disabled />
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Telefon Numarası</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="phone" class="form-control form-control-lg form-control-solid @error('phone') border-danger @enderror" placeholder="Telefon Numarası" value="{{auth()->user()->phone ?? old('phone')}}" required />
                                        @error('phone')
                                        <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if(session()->has('profile_success'))
                                <div class="alert alert-success d-flex align-items-center p-5 ">
                                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                            <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <div class="d-flex flex-column">
                                        <h4 class="mb-1 text-success">İşlem Başarılı.</h4>
                                        <span>{{session()->get('profile_success')}}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Sıfırla</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Değişiklikleri Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer py-4" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0 py-0">
                            <h3 class="fw-bold m-0">Oturum açma yöntemi</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <div class="card-body border-top p-9">
                            <div class="d-flex flex-wrap align-items-center">
                                <div id="kt_signin_email" class="{{ array_intersect(['email','confirmemailpassword'], $errors->keys()) ? 'd-none':'' }}">
                                    <div class="fs-6 fw-bold mb-1">E-posta Adresi</div>
                                    <div class="fw-semibold text-gray-600">{{auth()->user()->email}}</div>
                                </div>
                                <div id="kt_signin_email_edit" class="flex-row-fluid {{ array_intersect(['email','confirmemailpassword'], $errors->keys()) ? '':'d-none' }}">
                                    <form id="kt_signin_change_emails" class="form" method="post" action="{{route('profile.email')}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Yeni E-posta Adresini Girin</label>
                                                    <input type="email" class="form-control form-control-lg form-control-solid @error('email') border-danger @enderror" id="emailaddress" placeholder="E-posta Adresi" name="email" value="{{old('email') ?? auth()->user()->email}}" required />
                                                    @error('email')
                                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Parolayı Onayla</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid @error('confirmemailpassword') border-danger @enderror" name="confirmemailpassword" id="confirmemailpassword" required value="{{old('confirmemailpassword')}}" />
                                                    <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                                    @error('confirmemailpassword')
                                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2 px-6">E-postayı Güncelle</button>
                                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Vazgeç</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="kt_signin_email_button" class="ms-auto {{ array_intersect(['email','confirmemailpassword'], $errors->keys()) ? 'd-none':'' }}">
                                    <button class="btn btn-light btn-active-light-primary">E-postayı Değiştir</button>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <div id="kt_signin_password" class="{{ array_intersect(['currentpassword','password','password_confirmation'], $errors->keys()) ? 'd-none':'' }}">
                                    <div class="fs-6 fw-bold mb-1">Parola</div>
                                    <div class="fw-semibold text-gray-600">************</div>
                                </div>
                                <div id="kt_signin_password_edit" class="flex-row-fluid {{ array_intersect(['currentpassword','password','password_confirmation'], $errors->keys()) ? '':'d-none' }}">
                                    <form id="kt_signin_change_passwords" class="form" method="post" action="{{route('profile.password')}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Güncel Parola</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid  @error('currentpassword') border-danger @enderror" name="currentpassword" id="currentpassword" value="{{old('currentpassword')}}" required />
                                                    @error('currentpassword')
                                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Yeni Parola</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid @error('password') border-danger @enderror" name="password" id="newpassword" value="{{old('password')}}" required />
                                                    @error('password')
                                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Yeni Parola Tekrar</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid  @error('password') border-danger @enderror" name="password_confirmation" id="confirmpassword" value="{{old('password_confirmation')}}" required />
                                                    @error('password')
                                                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mb-5">Şifre en az 8 karakter olmalı ve semboller içermelidir</div>
                                        <div class="d-flex">
                                            <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Parolayı Güncelle</button>
                                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Vazgeç</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="kt_signin_password_button" class="ms-auto {{ array_intersect(['currentpassword','password','password_confirmation'], $errors->keys()) ? 'd-none':'' }}">
                                    <button class="btn btn-light btn-active-light-primary">Parolayı Değiştir</button>
                                </div>
                            </div>
                            @if(session()->has('email_success'))
                            <div class="alert alert-success d-flex align-items-center p-5 ">
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-success">İşlem Başarılı.</h4>
                                    <span>{{session()->get('email_success')}}</span>
                                </div>
                            </div>
                            @endif
                            @if(session()->has('password_success'))
                            <div class="alert alert-success d-flex align-items-center p-5 ">
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-success">İşlem Başarılı.</h4>
                                    <span>{{session()->get('password_success')}}</span>
                                </div>
                            </div>
                            @endif
                            {{-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                    <div class="mb-3 mb-md-0 fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Hesabınızın Güvenliğini Sağlayın</h4>
                                        <div class="fs-6 text-gray-700 pe-7">İki faktörlü kimlik doğrulama, hesabınıza ekstra bir güvenlik katmanı ekler. Giriş yapmak için ayrıca 6 haneli bir kod sağlamanız gerekir.</div>
                                    </div>
                                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">{{auth()->user()->two_factor ? 'Devre dışı bırak' : 'Etkinleştir'}}</a>

                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{--<div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Connected Accounts</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_connected_accounts" class="collapse show">
                        <div class="card-body border-top p-9">
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor" />
                                        <path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="d-flex flex-stack flex-grow-1">
                                    <div class="fw-semibold">
                                        <div class="fs-6 text-gray-700">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code.
                                            <a href="#" class="fw-bold">Learn More</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">
                                        <img src="assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="" />
                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
                                            <div class="fs-6 fw-semibold text-gray-400">Plan properly your workflow</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check form-check-solid form-check-custom form-switch">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" checked="checked" />
                                            <label class="form-check-label" for="googleswitch"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">
                                        <img src="assets/media/svg/brand-logos/github.svg" class="w-30px me-6" alt="" />
                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Github</a>
                                            <div class="fs-6 fw-semibold text-gray-400">Keep eye on on your Repositories</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check form-check-solid form-check-custom form-switch">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="githubswitch" checked="checked" />
                                            <label class="form-check-label" for="githubswitch"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">
                                        <img src="assets/media/svg/brand-logos/slack-icon.svg" class="w-30px me-6" alt="" />
                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Slack</a>
                                            <div class="fs-6 fw-semibold text-gray-400">Integrate Projects Discussions</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check form-check-solid form-check-custom form-switch">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" id="slackswitch" />
                                            <label class="form-check-label" for="slackswitch"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Email Preferences</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_email_preferences" class="collapse show">
                        <form class="form">
                            <div class="card-body border-top px-9 py-9">
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Successful Payments</span>
                                        <span class="text-muted fs-6">Receive a notification for every successful payment.</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Payouts</span>
                                        <span class="text-muted fs-6">Receive a notification for every initiated payout.</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Fee Collection</span>
                                        <span class="text-muted fs-6">Receive a notification each time you collect a fee from sales</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Customer Payment Dispute</span>
                                        <span class="text-muted fs-6">Receive a notification if a payment is disputed by a customer and for dispute purposes.</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Refund Alerts</span>
                                        <span class="text-muted fs-6">Receive a notification if a payment is stated as risk by the Finance Department.</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Invoice Payments</span>
                                        <span class="text-muted fs-6">Receive a notification if a customer sends an incorrect amount to pay their invoice.</span>
                                    </span>
                                </label>
                                <div class="separator separator-dashed my-6"></div>
                                <label class="form-check form-check-custom form-check-solid align-items-start">
                                    <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                    <span class="form-check-label d-flex flex-column align-items-start">
                                        <span class="fw-bold fs-5 mb-0">Webhook API Endpoints</span>
                                        <span class="text-muted fs-6">Receive notifications for consistently failing webhook API endpoints.</span>
                                    </span>
                                </label>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                <button class="btn btn-primary px-6">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Notifications</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_notifications" class="collapse show">
                        <form class="form">
                            <div class="card-body border-top px-9 pt-3 pb-4">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                                        <tbody class="fs-6 fw-semibold">
                                            <tr>
                                                <td class="min-w-250px fs-4 fw-bold">Notifications</td>
                                                <td class="w-125px">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]" />
                                                        <label class="form-check-label ps-2" for="kt_settings_notification_email">Email</label>
                                                    </div>
                                                </td>
                                                <td class="w-125px">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]" />
                                                        <label class="form-check-label ps-2" for="kt_settings_notification_phone">Phone</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Billing Updates</td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="checked" data-kt-settings-notification="email" />
                                                        <label class="form-check-label ps-2" for="billing1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="billing2" checked="checked" data-kt-settings-notification="phone" />
                                                        <label class="form-check-label ps-2" for="billing2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>New Team Members</td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="team1" checked="checked" data-kt-settings-notification="email" />
                                                        <label class="form-check-label ps-2" for="team1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone" />
                                                        <label class="form-check-label ps-2" for="team2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Completed Projects</td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email" />
                                                        <label class="form-check-label ps-2" for="project1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="project2" checked="checked" data-kt-settings-notification="phone" />
                                                        <label class="form-check-label ps-2" for="project2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">Newsletters</td>
                                                <td class="border-bottom-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="newsletter1" data-kt-settings-notification="email" />
                                                        <label class="form-check-label ps-2" for="newsletter1"></label>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone" />
                                                        <label class="form-check-label ps-2" for="newsletter2"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                <button class="btn btn-primary px-6">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Deactivate Account</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_deactivate" class="collapse show">
                        <form id="kt_account_deactivate_form" class="form">
                            <div class="card-body border-top p-9">
                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
                                            <div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset yousignr password.
                                                <br />
                                                <a class="fw-bold" href="#">Learn more</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-check-solid fv-row">
                                    <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
                                    <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="kt_modal_two_factor_authentication" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header flex-stack">
                <h2>Bir Kimlik Doğrulama Yöntemi Seçin</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1">
                                </rect>
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y pt-10 pb-15 px-lg-17">
                <div data-kt-element="options">
                    <p class="text-muted fs-5 fw-semibold mb-10">
                        Kullanıcı adınıza ve şifrenize ek olarak, hesabınıza giriş yapmak için bir kod (uygulama veya SMS ile gönderilen) girmeniz gerekir.
                    </p>
                    <div class="pb-10">
                        {{-- <input type="radio" class="btn-check" name="auth_option" value="apps" checked="checked"  id="kt_modal_two_factor_authentication_option_1"/>
        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-5" for="kt_modal_two_factor_authentication_option_1">
           <i class="ki-duotone ki-setting-2 fs-4x me-4"><span class="path1"></span><span class="path2"></span></i>
            <span class="d-block fw-semibold text-start">                            
                <span class="text-dark fw-bold d-block fs-3">Authenticator Apps</span>
                <span class="text-muted fw-semibold fs-6">
                    Get codes from an app like Google Authenticator,  Microsoft Authenticator, Authy or 1Password.
                </span>
            </span>
        </label>--}}
                        @if(!auth()->user()->phone)
                        <span class="text-muted fw-semibold fs-6">Hesabınıza kayıtlı telefon numarası bulunmuyor.</span>
                        @else
                        <input type="radio" class="btn-check" name="auth_option" checked value="sms" id="kt_modal_two_factor_authentication_option_2" />
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_modal_two_factor_authentication_option_2">
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor" />
                                    <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
                                    <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
                                </svg>
                            </span>
                            <span class="d-block fw-semibold text-start">
                                <span class="text-dark fw-bold d-block fs-3">SMS</span>
                                <span class="text-muted fw-semibold fs-6">Yedek giriş yönteminizi kullanmanız gerekiyorsa SMS ile bir kod göndereceğiz.</span>
                            </span>
                        </label>
                        @endif
                    </div>
                    @if(auth()->user()->two_factor)
                    <button class="btn btn-primary w-100" id="cancel-two">Devre dışı bırak</button>
                    @elseif(!auth()->user()->phone)
                    <button class="btn btn-primary w-100" data-bs-dismiss="modal">Kapat</button>
                    @else
                    <button class="btn btn-primary w-100" data-kt-element="options-select">Devam et</button>
                    @endif
                </div>

                <div class="d-none" data-kt-element="sms">
                    <h3 class="text-dark fw-bold fs-3 mb-5">
                        SMS: Cep telefonu numaranızı doğrulama
                    </h3>
                    <div class="text-muted fw-semibold mb-10">
                        Cep telefonu numaranızı ülke koduyla birlikte girin, talep üzerine size bir doğrulama kodu göndereceğiz.
                    </div>
                    <form data-kt-element="sms-form" class="form" action="#">
                        <div class="mb-10 fv-row">
                            <input type="text" class="form-control form-control-lg form-control-solid phone" placeholder="Telefon Numarası" value="{{auth()->user()->phone}}" name="mobile" required disabled />
                        </div>
                        <div class="d-flex flex-center">
                            <button type="reset" data-kt-element="sms-cancel" class="btn btn-light me-3">
                                İptal
                            </button>

                            <button type="submit" data-kt-element="sms-submit" id="sms-send" class="btn btn-primary">
                                <span class="indicator-label">
                                    Gönder
                                </span>
                                <span class="indicator-progress">
                                    Lütfen bekleyiniz... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
<script src="{{asset('backend/js/custom/account/settings/signin-methods.js')}}"></script>
<script src="{{asset('backend/js/custom/pages/user-profile/general.js')}}"></script>
<script src="{{asset('backend/js/custom/utilities/modals/two-factor-authentication.js')}}"></script>
@endsection

