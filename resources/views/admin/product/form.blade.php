@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card card-body">
            @if(isset($product))
                <h2 class="mt-2 mb-3">Edit Product</h2>
                <form id="productForm" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <h2 class="mt-2 mb-3">Create Product</h2>
                <form id="productForm" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}">
                                <span class="name_error error"></span>                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}">  
                                <span class="price_error error"></span>                                                         
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ old('stock', isset($product) ? $product->stock : '') }}"> 
                                <span class="stock_error error"></span>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="shop_id">Shop</label>
                                <select name="shop_id" class="form-control shop">
                                    @foreach ($shops as $shop)
                                        <option value="{{ $shop->id }}" {{ isset($product) && $product->shop_id == $shop->id ? 'selected' : '' }}>
                                            {{ $shop->name }}
                                        </option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="video">Video</label>
                                <input type="file" name="video" class="form-control">
                                @if (isset($product) && $product->video)
                                    <video width="320" height="240" class="mt-3" controls>
                                        <source src="{{ asset($product->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <p class="text-muted">Leave this field empty if you don't want to change the video.</p>
                                @endif                                
                            </div>
                        </div>
                    </div>
                    <button type="button" id="submitProductForm" class="btn btn-primary">
                        @if(isset($product))
                            Update Product
                        @else
                            Create Product
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.shop').select2({
                width: '100%'
            });

            $('#submitProductForm').on('click', function() {
                $.ajax({
                    url: $('#productForm').attr('action'),
                    type: $('#productForm').attr('method'),
                    data: new FormData($('#productForm')[0]),
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
                            window.location.href = "{{ route('products.index') }}";
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
