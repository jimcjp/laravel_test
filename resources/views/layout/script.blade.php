{{-- <script src="{{ asset('js/jquery.slim.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.1/sweetalert2.min.js"></script>
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