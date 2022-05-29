@extends('layouts.app');

@section('title', 'Cars');

@section('content')
    <div class="container my-5">
        <div class="full">
            <h1>Here's Your Cars !</h1>
            <div class="col">
                <h3><a href="{{ route('admin.cars.create') }}" class="text-primary stretched-link">Add more!</a></h3>
            </div>
        </div>

        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4">
                    <div class="card cardhov my-2" style="width: 18rem;">
                        <img class="card-img-top"
                            src="{{ $car->featured_image }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                            <a href="{{ route('admin.cars.show', $car) }}" class="text-primary stretched-link"> show more
                                info
                            </a>
                            <div class="row my-2">
                                <div class="col">
                                    <a class="btn ma-2" href="{{ route('admin.cars.edit', $car) }}"
                                        style="background-color: #161C34; color:white;">
                                        Edit
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST">
                                        @csrf
                                        @method('DELETE') <button style="background-color: #F36B2A; color:white;"
                                            class="btn mb-2" type="submit" data-toggle="modal"
                                            data-target="#exampleModal">Delete</button> </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('css')
    <style>
        .card:hover {
            border-radius: 0.75rem;
            border-color: #161C34;
            transition-delay: 0.1s
        }

        h1 {
            color: #161C34;
        }

    </style>
@endpush
