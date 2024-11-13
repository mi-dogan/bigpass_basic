</div>
</div>
<div class="d-none flex-center flex-wrap px-5 d-md-flex">
    <div class="text-gray-500 d-flex fw-semibold fs-base">
        <span class="px-5">©️{{now()->format('Y')}} {{config('app.name')}} Tüm Hakları Saklıdır.</span>
    </div>
</div>
</div>
<div class="d-none d-md-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{asset('backend/media/patterns/login-page-img.jpg')}})">
</div>
<script src="{{asset('backend/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backend/js/scripts.bundle.js')}}"></script>
@yield('js')
</body>
</html>

