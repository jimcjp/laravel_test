{{-- <script src="{{ asset('js/jquery.slim.min.js') }}"></script> --}}
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script>

    
    function notify(type, title) {
        Swal.fire({
        position: "middle",
        icon: type,
        title: title,
        showConfirmButton: false,
        timer: 1500
        });
    }


    //ajax全域設置
    $.ajaxSetup({
        headers:{
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
</script>


@yield('script')