@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Available Products</h1>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 product-card">
            @forelse ($tasks as $task)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ config('images.access_path') }}/{{ $task->images->name }}" alt="product image"
                            class="product-image card-img-top mx-auto">
                        <div class="card-body  text-center">
                            <h5 class="card-title">{{ $task->name }}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">LKR {{ number_format($task->price) }}</li>
                            </ul>
                            <div class="mt-2">
                                <a href="#" class="btn btn-primary">Select Options</a>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-lg-12 text-center">
                    <h2 class="text-danger">No Product Found</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            margin-bottom: 10vh;
            font-size: 3rem;
            color: #0d6efd;            ;
        }

        .product-image {
            max-height: 20rem;
            max-width: 20rem;
        }

        .product-card {
            margin-bottom: 5vh;
        }
    </style>
@endpush
