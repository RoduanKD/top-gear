@extends('layouts.app')

@section('content')
    @foreach ($cars as $car)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST"> @csrf @method('DELETE') <button type="submit">Delete</button> </form>
                {{-- <a href="{{ route('cars.destroy', $car) }}" class="card-link" @method('DELETE')>Delete</a> --}}
                {{-- <a href="{{ route('cars.edit', $car) }}" class="card-link" @method('DELETE')>Delete</a> --}}
                <form action="{{ route('cars.edit', $car) }}" method="PUT"> @csrf <button type="submit">Edit</button> </form>
            </div>
        </div>


        {{-- <a href="{{ route('cars.destroy', $car) }}" class="card-link">Delete</a>
    <a href="#" class="card-link">Another link</a> --}}

        </div>
    @endforeach
{{-- <div class="row">
    @foreach($cars as $car)
    <div class="col-md-4">
        <a href="{{ route('cars.edit', $car) }}">
            <h4>{{ $car->brand }} {{ $car->model }}</h4>
            <h5><form action="{{ route('cars.destroy', $car) }}" method="POST"> @csrf @method('DELETE') <button type="submit">Delete</button> </form></h5>
        </a>
    </div>
    @endforeach --}}
{{-- </div> --}}
@endsection
