@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card card-body">
            @if(isset($shop))
                <h2 class="mt-2 mb-3">Edit Shop</h2>
                <form action="{{ route('shops.update', $shop->id) }}" method="post" id="shopForm" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <h2 class="mt-2 mb-3">Create Shop</h2>
                <form action="{{ route('shops.store') }}" method="post" id="shopForm" enctype="multipart/form-data">
            @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Shop Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', isset($shop) ? $shop->name : '') }}">
                                <span class="name_error error"></span>                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', isset($shop) ? $shop->address : '') }}">
                                <span class="address_error error"></span>                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', isset($shop) ? $shop->email : '') }}">
                                <span class="email_error error"></span>                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                @if (isset($shop) && $shop->image)
                                    <img src="{{ asset($shop->image) }}" alt="Current Image" class="img-thumbnail mt-2" width="150px" height="150px">
                                    <p class="text-muted">Leave this field empty if you don't want to change the image.</p>
                                @endif
                                <span class="image_error error"></span>                              
                            </div>
                        </div>
                    </div>
                    <button type="button" id="submitShopForm" class="btn btn-primary">
                        @if(isset($shop))
                            Update Shop
                        @else
                            Create Shop
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {          

            $('#submitShopForm').on('click', function() {
                $.ajax({
                    url: $('#shopForm').attr('action'),
                    type: $('#shopForm').attr('method'),
                    data: new FormData($('#shopForm')[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var data = response;
                        if (data.status == true) {
                            Swal.fire({
                                title: 'Success!',
                                text: data.msg,
                                icon: 'success'
                            });
                            window.location.href = "{{ route('shops.index') }}";
                        } else {
                            $('.error').empty();
                            $.each(data.error, function(key,val) {
                                $('.'+key+'_error').html(val);
                            });                               
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
@endsection
