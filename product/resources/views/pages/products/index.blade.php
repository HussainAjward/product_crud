@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Products</h1>
            </div>
            <div class="col-md-auto card text-center">
                <div class="card-body">
                    <h2 class="card-title card-title-name">Add New Product</h2>
                    <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name"
                                        placeholder="Enter Product Name" required>
                                </div>
                                <div class="mt-5 form-group">
                                    <input class="form-control dropify" type="file" name="images"
                                        accept="image/jpg, image/jpeg, image/png" required>
                                </div>
                                <div class="mt-5 form-group">
                                    <input class="form-control" type="text" name="price"
                                        placeholder="Enter Product Price" required>
                                </div>
                            </div>
                            <div class="mt-4 text-center col-lg-8">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="col-md-auto card text-center card-pd">
                    <h2 class="card-title card-title-name mt-2">Product List</h2>
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price (LKR)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $task->name }}</td>
                                    <td><img src="{{ config('images.access_path') }}/{{ $task->images->name }}"
                                            alt="" class="table-img"></td>
                                    <td>{{ number_format($task->price) }}</td>
                                    <td>
                                        @if ($task->status == 0)
                                            <span class="badge bg-warning">Out of Stock</span>
                                        @else
                                            <span class="badge bg-success">Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($task->status == 0)
                                            <a href="{{ route('products.status', $task->id) }}" class="btn btn-success"><i
                                                    class="fas fa-check-circle"></i> Active</a>
                                        @else
                                            <a href="{{ route('products.status', $task->id) }}" class="btn btn-warning"><i
                                                    class="fas fa-check-circle"></i> Inactive</a>
                                        @endif

                                        <a href="javascript:void(0)" class="btn btn-info ms-2"><i class="fas fa-pen"
                                                onclick="productEditModal({{ $task->id }})"></i></a>
                                        <a href="{{ route('products.delete', $task->id) }}" class="btn btn-danger ms-2"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="productEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productEditLabel">Edit Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="productEditContent">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            margin-bottom: 5vh;
            font-size: 3rem;
            color: #198754;
        }

        .table-img {
            height: 60px;
            width: 60px;
        }

        .dropify-message p {
            color: #198754;
            font-size: 1.5rem;
        }

        .dropify-render img {
            margin: auto;
        }

        .card-title-name {
            margin-bottom: 3vh;
            color: #198754;
        }

        .card-pd {
            padding: 1rem;
        }
    </style>
@endpush

@push('js')
    <script>
        $('.dropify').dropify();
    </script>
@endpush

@push('js')
    <script>
        function productEditModal(task_id) {
            var data = {
                task_id: task_id,
            };
            $.ajax({
                url: "{{ route('products.edit') }}",
                headers: {
                    'X-CSRF_TOKEN': $('meta[name="csrf-token"]').after('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response) {
                    $('#productEdit').modal('show');
                    $('#productEditContent').html(response);
                }
            });
        }
    </script>
@endpush
