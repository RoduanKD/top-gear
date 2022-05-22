@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <section class="section layout_padding">
        <div class="container">
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{ $category->name }} ({{ $category->cars->count() }})</h3>
                                <p class="card-text">Capacity: {{ $category->capacity }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col">
                        There are no categories now, <a href="{{ route('admin.categories.create') }}">please create one</a>!
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
