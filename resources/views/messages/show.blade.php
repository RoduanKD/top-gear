@extends('layouts.app')

@section('title', 'Messages' . ' - ' . $message->name)

@section('content')
    <section>
        <div class="container">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">{{'Message '.$message->id}}</div>
                <div class="card-body">
                  <h5 class="card-title text-white">{{ $message->name }}</h5>
                  <p class="card-text">
                      <h4 class="text-white">{{ $message->email }}</h4>
                      <h4 class="text-white">{{ $message->phone }}</h4>
                      <p class="text-white">{{ $message->content }}</p>
                    </p>
                </div>
              </div>
        </div>
    </section>
@endsection
