@extends('layouts.app')

@section('title', 'Cars' . '-' . $car->model)

@section('content')
    <section class="section layout_padding">
        <section class="container">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">{{'Car '.$car->id}}</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $car->model }}</h5>
                    <p class="card-text">
                        <h4 class="text-white"> {{ $car->brand }}        </h4>
                        <h4 class="text-white"> {{ $car->colors }}       </h4>
                        <p class="text-white">  {{ $car->gear_type }}    </p>
                        <p class="text-white">  {{ $car->year }}         </p>
                        <p class="text-white">  {{ $car->country }}      </p>
                        <p class="text-white">  {{ $car->is_new }}       </p>
                        <p class="text-white">  {{ $car->description }}  </p>
                    </p>
                </div>
            </div>
        </section>
    </section>
@endsection
