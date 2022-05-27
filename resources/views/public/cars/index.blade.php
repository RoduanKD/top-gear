@extends('layouts.app')

@section('content')
    <div class="section layout_padding">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <form action="">
                        <input type="hidden" name="q" value="{{ request()->q }}">
                        <select name="category">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == request()->category ? 'selected':'' }}>{{ $category->name }} ({{ $category->cars->count() }})</option>
                            @endforeach
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <a href="{{ route('cars.show', $car) }}">
                            <h4>{{ $car->brand }} {{ $car->model }}</h4>
                            {{-- <h6>{{ $car->category->name }}</h6> --}}
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $cars->withQueryString() }}
            </div>
        </div>
    </div>
@endsection
