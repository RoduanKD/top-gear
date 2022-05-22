@extends('layouts.app')

@section('content')
<div class="row">
    @foreach($cars as $car)
    <div class="col-md-4">
        <a href="{{ route('admin.cars.edit', $car) }}">
            <h4>{{ $car->brand }} {{ $car->model }}</h4>
            <h6>{{ $car->category->name }}</h6>
            <h5><form action="{{ route('admin.cars.destroy', $car) }}" method="POST"> @csrf @method('DELETE') <button type="submit">Delete</button> </form></h5>
        </a>
    </div>
    @endforeach
</div>
@endsection
