@extends('layouts.app')

@section('title', 'Cars')

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
                    <div class="card cardhov my-2">

                        {{ $car->getFirstMedia() }}

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
                                    <button style="background-color: #F36B2A; color:white;"
                                            class="btn mb-2" data-toggle="modal"
                                            data-target="#delete-modal">Delete</button>
                                            <div class="modal fade" id="delete-modal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">DELETE THIS CAR
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ARE YOU SURE YOU WANT TO DELETE THIS CAR!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.cars.destroy', $car) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="background-color: #F36B2A; color:white;"
                                                            class="btn mb-2" type="submit" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $cars->links() }}
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
