@extends('front.layouts.qr.master')
@section('title','Anasayfa')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid mt-5">
                <div id="kt_app_content_container" class="app-container container-fluid" >
                    <div class="card card card-flush mt-4">
                        <div class="card-header align-items-center d-none align-items-center">
                            <div class="card-title">

                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5 d-md-grid">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                                <div class="text-center mb-3 d-flex flex-column justify-content-center align-items-center">
                                    <img alt="Logo" src="{{asset('backend/media/logos/mihmandar-vector.png')}}" class="h-45px app-sidebar-logo-default">
                                    <img alt="Logo" src="{{asset('backend/media/logos/mihmandar-vector.png')}}" class="h-35px app-sidebar-logo-minimize">
                                    <span class="text-black" style="font-size: 1.3em;">{{env("APP_NAME", "MİHMANDAR")}}</span>
                                </div>
                                @if(isset($device->id))
                                    <div class="card" style="width: 25rem;">
                                        {{--                                    <h3 class="text-center text-uppercase pt-4"><?php echo isset($device->name) ? $device->name : ""; ?></h3>--}}
                                        <div class="card-body py-0 qr-area" style="display: flex; justify-content: center; align-items: center;">

                                        </div>
                                        <div class="counter-area" style="color: #000; display: flex; justify-content: center; align-items: center; padding: 10px;">
                                            <div class="countdown text-success" style="font-size: 1.3em;"></div>
                                            <div class="pl-1" style="font-size: 1.3em;">&nbsp;saniye sonra değişecek.</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-danger">Cihaz bulunamadı!</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endsection
        @section('js')
            <script>
                $(document).ready(function () {
                    const interval = 60;
                    let countdown = interval; // Başlangıçta 120 saniye
                    let countdownInterval;
                    getQr()

                    function getQr() {
                        var Ajaxurl = '{{ url('/api/generate-random-qr-code') }}';
                        $.ajax({
                            type: "post",
                            url: Ajaxurl,
                            xhrFields:{
                                responseType: 'blob'
                            },
                            data: {
                                device_id: {{ $device?->device_id }},
                            },
                            success: function (response) {
                                const blob = new Blob([response], { type: 'image/png' });
                                var file = window.URL.createObjectURL(blob);
                                var imgElement = document.createElement('img');
                                imgElement.src = file; // Base64 QR kod verisi
                                $('.qr-area').html(imgElement); // QR kodunu .qr-area içine ekleyin
                                document.querySelector(".countdown").innerHTML = countdown;
                                startCountdown()
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                console.log(XMLHttpRequest.responseJSON.message)
                                $('.alert-result').addClass('alert-danger').html(XMLHttpRequest.responseJSON.message);
                            }
                        });
                    }

                    function startCountdown() {
                        // Sayaçı 120'den geriye sayan bir interval başlat
                        countdownInterval = setInterval(function() {
                            countdown--;
                            document.querySelector(".countdown").innerHTML = countdown;

                            if (countdown == 1) {
                                // Sayaç sıfıra ulaştığında interval'i temizle ve butonu aktif hale getir
                                clearInterval(countdownInterval);
                                countdown = interval; // Sayaçı tekrar 120'ye ayarla
                                getQr()
                            }
                        }, 1000); // Her 1 saniyede bir güncelle
                    }
                });
            </script>
@endsection
