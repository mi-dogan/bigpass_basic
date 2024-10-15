
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/tr.js"></script>
<script src="{{asset('backend/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backend/js/scripts.bundle.js')}}"></script>
<script src="{{asset('backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')
@if(session()->has('success'))
<script>
    Swal.fire({
        title: 'Başarılı!',
        text: '{{session()->get('success')}}',
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Tamam',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-active-light"
        }
    });
</script>
@endif
</body>
</html>
