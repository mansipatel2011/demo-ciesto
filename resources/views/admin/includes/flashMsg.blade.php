@if(Session::has('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{!! Session::get('success') !!}",
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{!! Session::get('error') !!}",
            icon: 'error',
            showConfirmButton: false,
            timer: 3000 
        });
    </script>
@endif

@if ($errors->has('login'))
    <script>
        Swal.fire({
            title: 'Login Error!',
            text: "{{ $errors->first('login') }}",
            icon: 'error',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
