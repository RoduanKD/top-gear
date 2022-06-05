@extends('layouts.app')

@section('title', 'Category' . '-' . $category->name)

@section('content')
    <section class="section layout_padding">
        <section class="container">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">{{ $category->name }}</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $category->name }}</h5>
                    <h5 class="card-title text-white">{{ $category->capacity }}</h5>
                </div>
            </div>
        </section>
    </section>
@endsection
