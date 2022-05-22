@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="full">
            <h1>Here's Your Cars !</h1>
             <div class="col">
        <h3><a href="{{ route('cars.create') }}" class="text-primary stretched-link">Add more!</a></h3>
             </div>
        </div>

        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4">

                    <div class="card cardhov my-2" style="width: 18rem;">
                        <img class="card-img-top"
                            src="https://d.newsweek.com/en/full/1949339/tesla-model-s.jpg?w=1600&h=900&q=88&f=e5d09ec2030e76aba072a36c90568476"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                            <p class="card-text">{{ $car->description }}</p>

                                <a href="{{ route('cars.show', $car) }}"  class="text-primary stretched-link"> show more info</a>

                                <div class="row my-2">
                                <div class="col">
                                    <form action="{{ route('cars.edit', $car) }}" method="PUT"> @csrf <button
                                            class="btn ma-2" type="submit"
                                            style="background-color: #161C34; color:white;">Edit</button> </form>
                                </div>
                                <div class="col">
                                    <form action="{{ route('cars.destroy', $car) }}" method="POST">
                                        @csrf
                                        @method('DELETE') <button style="background-color: #F36B2A; color:white;"
                                            class="btn mb-2" type="submit" data-toggle="modal"
                                            data-target="#exampleModal">Delete</button> </form>
                                    {{-- <button type="button" class="btn" data-toggle="modal"
                                            data-target="#exampleModal"
                                            style="background-color: #F36B2A; color:white;" >
                                             DELETE
                                        </button>
                                          <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
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
                                                        <form action="{{ route('cars.destroy', $car) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE') <button
                                                                style="background-color: #F36B2A; color:white;"
                                                                class="btn mb-2" type="submit" data-toggle="modal"
                                                                data-target="#exampleModal">Delete</button> </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
