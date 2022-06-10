@extends('layouts.app')

@section('title' . ' - ' . $user->name)

@section('content')
    <section>
        <div class="container my-5">
            <div class="card my-2 shadow bg-white rounded">
                <div class="card-body">
                    <h1 class="card-title"> {{ $user->name }} </h1>
                </div>
            </div>
            <div class="card mb-3">
                <img src="{{ $user->featured_image }}" class="card-img-top" alt="..." height="400">
                <div class="card-body">
                    <h1 class="card-title text-primary"> Basic Info </h1>
                    <p class="card-text">
                    <h4>Name:</h4> Mr. {{ $user->name }} <br>
                    <h4>Email:</h4> {{ $user->email }} <br>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
<style scoped>
    h4 {
        display: inline;
    }

</style>
