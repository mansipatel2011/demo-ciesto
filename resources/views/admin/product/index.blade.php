@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h2>Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Create Product</a>
        </div>       
        
        <div class="form-row d-flex mb-3">
            <div class="form-group col-md-2">
                <label for="price_filter">Price Filter:</label>
                <select class="form-control" id="price_filter" name="price_filter">
                    <option value="">All</option>
                    <option value="min" {{ request('price_filter') == 'min' ? 'selected' : '' }}>Min</option>
                    <option value="max" {{ request('price_filter') == 'max' ? 'selected' : '' }}>Max</option>
                </select>
            </div>
            
            <div class="form-group col-md-2 mx-2">
                <label for="stock_available">Stock Available:</label>
                <select class="form-control" id="stock_available" name="stock_available">
                    <option value="">All</option>
                    <option value="1" {{ request('stock_available') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ request('stock_available') === '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>                
        </div>

        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Shop</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
<script>
  $(document).ready( function () {
    var table = $('#datatable').DataTable({ 
            processing: true,
            serverSide: true, 
                    
            ajax: {
                url: "{{ route('products.index') }}",
                data: function (d) {
                    d.stock_available = $('#stock_available').val();
                    d.price_filter = $('#price_filter').val();
                },                
            },
            
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'stock', name: 'stock'},
                {data: 'shop_name', name: 'shop_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            
    });

    $('#stock_available, #price_filter').on('change', function () {
        table.draw();
    });

    $('#datatable').on('click', '.delete', function() {
            var shopId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('products') }}/" + shopId,
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": shopId
                        },
                        success: function(response) {
                            if (response.status == '1') {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.msg,
                                    icon: 'success'
                                });

                                $('#datatable').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.msg,
                                    icon: 'error'
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
                }
            });
        });
  });
</script>
@endsection
