@extends('front.layouts.qr.master')
@section('title','Anasayfa')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid mt-5">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="card card card-flush mt-4">
                        <div class="card-header align-items-center d-flex align-items-center">
                            <div class="card-title">

                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5 d-md-grid">
                                <a href="{{ url("/qr/cikis") }}" type="button" class="btn btn-sm btn-light-primary">
                                    Oturumu Kapat
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(isset($device->id))
                                <div class="alert alert-result"></div>
                            @else
                                <div class="alert alert-danger">Cihaz bulunamadı!</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endsection
        @section('js')
            <script>
                $(document).ready(function () {
                    saveActivity()

                    function saveActivity() {
                        var Ajaxurl = '{{ url('/api/activity') }}';
                        $.ajax({
                            type: "post",
                            url: Ajaxurl,
                            data: {
                                device_id: {{ $device?->device_id }},
                                employee_id: {{ $employee->id }},
                                request_type: "qr"
                            },
                            success: function (response) {
                                console.log(response)
                                if(response.status){
                                    $('.alert-result').addClass('alert-success').html(response.message);
                                }else{
                                    $('.alert-result').addClass('alert-danger').html(response.message);
                                }
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                console.log(XMLHttpRequest.responseJSON.message)
                                $('.alert-result').addClass('alert-danger').html(XMLHttpRequest.responseJSON.message);
                            }
                        });
                    }
                });
            </script>
@endsection
