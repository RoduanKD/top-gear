@extends('layouts.app')

@section('title', 'users')

@section('content')
    <div class="container my-5">
        <div class="full">
            <h1>Here's Your users !</h1>
            <div class="col">
                <h3><a href="{{ route('admin.users.create') }}" class="text-primary stretched-link">Add more!</a></h3>
            </div>
        </div>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card cardhov my-2">
                        <img class="card-img-top"
                            src="{{ $user->featured_image  }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <a href="{{ route('admin.users.show', $user) }}" class="text-primary stretched-link"> show more
                                info
                            </a>
                            <div class="row my-2">
                                <div class="col">
                                    <a class="btn ma-2" href="{{ route('admin.users.edit', $user) }}"
                                        style="background-color: #161C34; color:white;">
                                        Edit
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE') <button style="background-color: #F36B2A; color:white;"
                                            class="btn mb-2" type="submit" data-toggle="modal"
                                            data-target="#exampleModal">Delete</button> </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $users->links() }}
        </div>
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
