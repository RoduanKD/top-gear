@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="full">
            <h1>Here's Your Categories !</h1>
             <div class="col">
        <h3><a href="{{ route('categories.create') }}" class="text-primary stretched-link">Add more!</a></h3>
             </div>
        </div>

        <div class="row">
            {{-- tttttttttttttttt --}}
            @forelse ($categories as $category)
                <div class="col-md-4">

                    <div class="card cardhov my-2" style="width: 18rem;">
                        <img class="card-img-top"
                            src="https://i0.wp.com/52.0.170.206/wp-content/uploads/2021/09/Types-of-Car.jpg?fit=1280%2C720"
                            alt="Card image cap">
                        <div class="card-body">
                           <h3 class="card-title">{{ $category->name }}</h3>
                                <p class="card-text">Capacity: {{ $category->capacity }}</p>
                                <a href="..."  class="text-primary stretched-link"> show Cars in Category</a>
                                <div class="row my-2">
                                <div class="col">
                                    <form action="{{ route('categories.edit', $category) }}" method="PUT"> @csrf <button
                                            class="btn ma-2" type="submit"
                                            style="background-color: #161C34; color:white;">Edit</button> </form>
                                </div>
                                <div class="col">
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
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

            @empty
                    <div class="col">
                        There are no categories now, <a href="{{ route('categories.create') }}">please create one</a>!
                    </div>
                @endforelse
        </div>
    </div>
@endsection

<style scoped>
    .card:hover {
        border-radius: 0.75rem;
        border-color: #161C34;
        transition-delay: 0.1s
    }

    h1 {
        color: #161C34;
    }

</style>
