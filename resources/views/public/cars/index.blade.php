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
                                <option value="{{ $category->id }}" {{ $category->id == request()->category ? 'selected':'' }}>{{ $category->name }} ({{ $category->cars->count() }})</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-success">Filter</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <a href="{{ route('cars.show', $car) }}">
                            <h4 style="color: dodgerblue; font-size: 14pt; font-weight: bol;">{{ $car->brand }} {{ $car->model }}</h4>
                                <table class="table">
                                    <thead>
                                        <th colspan="2" class="text-center">Category</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Name : </b> </td>
                                            <td>{{ $car->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Capacity : </b> </td>
                                            <td>{{ $car->category->capacity }}</td>
                                        </tr>

                                    </tbody>
                                </table>
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
