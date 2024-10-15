@extends('auth_employee.layouts.master')
@section('content')
<form class="form w-100  w-full" method="post" action="{{route('qr.login')}}">
    @csrf
    <div class="text-center mb-11">
        <h1 class="text-gray-500 fw-bolder mb-3">Giriş Yapın</h1>
        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-5">Hoşgeldiniz</span>
        </div>
        <div class="text-gray-500 fw-semibold fs-6">Hesabınıza giriş yapın, tüm işlerinizi yönetin.</div>
    </div>

    <input type="hidden" name="login_type">

    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="ex3-tab-2"
                data-bs-toggle="tab"
                href="#ex3-tabs-2"
                role="tab"
                aria-controls="ex3-tabs-2"
                aria-selected="false"
                data-type="phone"
            >Telefon numarası ile</a>
        </li>
        <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="ex3-tab-1"
                data-bs-toggle="tab"
                href="#ex3-tabs-1"
                role="tab"
                aria-controls="ex3-tabs-1"
                aria-selected="true"
                data-type="email"
            >Email ile</a>
        </li>
    </ul>

    <div class="tab-content" id="ex2-content">
        <div class="tab-pane fade show active" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
            <div class="form-floating mb-5 @if(session()->has("sms_code_status")) d-none @endif">
                <input type="text" name="phone" class="form-control bg-transparent @error('phone') border-danger @enderror" id="floatingInput" placeholder="Telefon Numarası" autocomplete="off" value="{{old('phone')}}" data-gtm-form-interact-field-id="0">
                <label class="text-{{$errors->has('phone') ? 'danger' : 'gray-500'}}" for="floatingInput">Telefon Numarası</label>
                @error('phone')
                <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                @enderror
            </div>

            @if(session()->has("sms_code_status"))
                <div class="form-floating mb-5 position-relative" data-kt-password-meter="true">
                    <input class="form-control bg-transparent @error('sms_code') border-danger @enderror" type="number" placeholder="Doğrulama Kodu (05XXXXXXXXX)" name="sms_code" autocomplete="off" value="{{old('sms_code')}}"/>
                    <label class="text-{{$errors->has('sms_code') ? 'danger' : 'gray-500'}}" for="floatingInput">Doğrulama Kodu</label>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 {{$errors->has('sms_code') ? 'pb-5' : ''}}" data-kt-password-meter-control="visibility"></span>
                    @error('sms_code')
                    <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                    @enderror
                </div>
            @endif
        </div>
        <div
            class="tab-pane fade"
            id="ex3-tabs-1"
            role="tabpanel"
            aria-labelledby="ex3-tab-1"
        >
            <div class="form-floating mb-5">
                <input type="email" name="email" class="form-control bg-transparent @error('email') border-danger @enderror" id="floatingInput" placeholder="E-Posta Adresi" autocomplete="off" value="{{old('email')}}" data-gtm-form-interact-field-id="0">
                <label class="text-{{$errors->has('email') ? 'danger' : 'gray-500'}}" for="floatingInput">E-posta adresi</label>
                @error('email')
                <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-5 position-relative" data-kt-password-meter="true">
                <input class="form-control bg-transparent @error('password') border-danger @enderror" type="password" placeholder="Parola" name="password" autocomplete="off" value="{{old('password')}}"/>
                <label class="text-{{$errors->has('password') ? 'danger' : 'gray-500'}}" for="floatingInput">Parolanız</label>
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 {{$errors->has('password') ? 'pb-5' : ''}}" data-kt-password-meter-control="visibility">
            <i class="bi bi-eye-slash fs-2"></i>
            <i class="bi bi-eye fs-2 d-none"></i>
        </span>
                @error('password')
                <div class="invalid-feedback d-block text-danger f-11">{{$message}}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="remember" value="1">
            <span class="form-check-label fw-semibold text-gray-500 fs-base ms-1">Beni Hatırla</span>
        </label>
        <a href="{{route('forgot')}}" class="link-primary">Şifremi unuttum?</a>
    </div>
    <div class="d-grid mb-5">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            Giriş yap
        </button>
    </div>
    {{-- <div class="d-grid mb-5">
        <a href="{{route('register')}}" class="btn btn-outline btn-lg btn-outline-dashed btn-outline-primary btn-active-light-primary">Hesabınız yok mu? Kayıt olun</a>
    </div> --}}
</form>

@endsection

@section("js")
    <script>
        $(document).ready(function () {
            const loginType = $('#ex1 .nav-link.active').data('type')
            $('input[name="login_type"]').val(loginType)

            $('#ex1 .nav-link').click(function () {
                const loginType = $('#ex1 .nav-link.active').data('type')
                $('input[name="login_type"]').val(loginType)
            })
        });
    </script>
@endsection

