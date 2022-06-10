@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="container my-5">
        <div class="full">
            <h1>Here's Your Categories !</h1>
            <div class="col">
                @if($categories->count()!=0)<h3><a href="{{ route('admin.categories.create') }}" class="text-primary stretched-link">Add more!</a></h3>@endif
            </div>
        </div>

        <div class="row">
            @forelse ($categories as $category)
                <div class="col-md-4">

                    <div class="card cardhov my-2">

                        {{ $category->getFirstMedia() }}

                        <div class="card-body">
                            <h3 class="card-title">{{ $category->name }} ({{ $category->cars->count() }})</h3>
                            <p class="card-text">Capacity: {{ $category->capacity }}</p>
                            <a href="{{ route('categories.index',$category) }}" class="text-primary stretched-link"> show Cars in Category</a>
                            <div class="row my-2">
                                <div class="col">
                                    <form action="{{ route('admin.categories.edit', $category) }}" method="PUT"> @csrf
                                        <button class="btn ma-2" type="submit"
                                            style="background-color: #161C34; color:white;">Edit</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn" data-toggle="modal"
                                        data-target="#delete-modal" style="background-color: #F36B2A; color:white;">
                                        DELETE
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete-modal" tabindex="-1"
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
                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="background-color: #F36B2A; color:white;"
                                                            class="btn mb-2" type="submit" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col">
                    There are no categories now, <a href="{{ route('admin.categories.create') }}">please create one</a>!
                </div>
            @endforelse
        </div>
        {{ $categories->links() }}
    </div>
@endsection

@push('css')
    <style>
        .card:hover {
            border-radius: 0.75rem;
            border-color: #161C34;
            transition-delay: 0.1s
        }

        h1 {
            color: #161C34;
        }

    </style>
@endpush
