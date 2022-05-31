@extends('layouts.app')

@section('content')
    <div class="section layout_padding">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <form action="">
                        <input type="hidden" name="q" value="{{ request()->q }}">
                        <select name="category" class="custom-select col-sm" style="width: 25%">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == request()->category ? 'selected' : '' }}>{{ $category->name }}
                                    ({{ $category->cars->count() }})
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-success">Filter</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <div class="card cardhov my-2" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $car->featured_image }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                                <a href="{{ route('cars.show', $car) }}" class="btn ma-2"
                                    style="background-color: #161C34; color:white; margin-top:10px;"> show more
                                    info</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                {{ $cars->withQueryString() }}
            </div>
        </div>
    </div>
@endsection
