@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h2>Shop List</h2>
            <a href="{{ route('shops.create') }}" class="btn btn-success mb-3 ">Create Shop</a>
            
        </div>
            
        <div class="d-flex justify-content-end mt-2 mb-3">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="mr-2">
                @csrf
                <div class="custom-file" style="display: none;">
                    <input type="file" class="custom-file-input" id="file" name="file" accept=".csv">
                </div>
                <div>
                    <button type="button" class="btn btn-primary import">Import CSV</button>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary submit" style="display: none;">Submit</button>
                </div>
            </form>
            <div class="mx-2">
                <a href="{{ route('export') }}" class="btn btn-primary">Export CSV</a>
            </div>
        </div>

        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
        
    </div>
    <script>
    $(document).ready(function() {


        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('shops.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'address', name: 'address'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('.import').click(function() {
            $('#file').click();
        });

        $('#file').change(function() {
            $('.import').hide();
            $('.submit').show();
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
                        url: "{{ url('shops') }}/" + shopId,
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
