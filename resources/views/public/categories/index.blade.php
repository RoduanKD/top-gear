@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-md-4">
                        <div class="card text-white bg-info ">
                            <div class="card-body">
                                <p class="card-title">{{ $category->name }} ({{ $category->cars->count() }})
                                <br> Capacity: {{ $category->capacity }}
                                </p>
                                <h4 class="text-white" style="font-weight: bold">Cars :</h4>
                                @forelse($category->cars as $car)

                                <p class="card-text text-white"><a href="{{route('cars.show',$car->id)}}"> {{ $car->brand.'-'.$car->model }}</a></p>
                                @empty
                                <div style="color: yellow;font-weight: bold ">
                                    There are no cars in this category now!
                                    {{-- There are no cars in this category now, <a href="{{ route('cars.create') }}">please create one</a>! --}}
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col">
                        There are no categories now!
                        {{-- There are no categories now, <a href="{{ route('admin.categories.create') }}">please create one</a>! --}}
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
