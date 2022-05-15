@extends('layouts.app')

@section('title', 'Messages' . ' - ' . $message->name)

@section('content')
    <section>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $message->name }}</h5>
                  <p class="card-text">
                      <h4>{{ $message->email }}</h4>
                      <h4>{{ $message->phone }}</h4>
                      <p>{{ $message->content }}</p>
                    </p>
                </div>
              </div>
        </div>
    </section>
@endsection
