@extends('layouts.app')

@section('title', 'Messages')

@section('content')
    <section>
        <div class="container">
            <h1>Received Messages</h1>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>received at</th>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td><a href="{{ route('messages.show', $message) }}">{{ $message->name }}</a></td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
