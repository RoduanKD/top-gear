@extends('layouts.app')

@section('title', 'Messages' . ' - ' . $message->name)

@section('content')
    <section>
        <div class="container my-5">
            <div class="card text-center shadow rounded">
                <div class="card-body">
                  <h1 class="card-title">{{ $message->name }}</h1>
                  <p class="card-text">
                      <h4>Email: {{ $message->email }}</h4>
                      <h4>Phone: {{ $message->phone }}</h4> <hr>
                    <h4>Message content:</h4>  <p>{{ $message->content }}</p>
                    </p>
                </div>
              </div>
        </div>
    </section>
@endsection
